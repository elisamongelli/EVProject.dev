const AVAILABLE_WEEK_DAYS = ['Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'];
const localStorageName = 'calendar-events';

var calendarObj;

var hourSelected;

class CALENDAR {
	constructor(options) {
        this.options = options;
        this.elements = {
            days: this.getFirstElementInsideIdByClassName('calendar-days'),
            week: this.getFirstElementInsideIdByClassName('calendar-week'),
            month: this.getFirstElementInsideIdByClassName('calendar-month'),
            year: this.getFirstElementInsideIdByClassName('calendar-current-year'),
            eventList: this.getFirstElementInsideIdByClassName('current-day-events-list'),
            eventField: this.getFirstElementInsideIdByClassName('add-event-day-field'),
            eventAddBtn: this.getFirstElementInsideIdByClassName('add-event-day-field-btn'),
            currentDay: this.getFirstElementInsideIdByClassName('calendar-left-side-day'),
            currentWeekDay: this.getFirstElementInsideIdByClassName('calendar-left-side-day-of-week'),
            prevYear: this.getFirstElementInsideIdByClassName('calendar-change-year-slider-prev'),
            nextYear: this.getFirstElementInsideIdByClassName('calendar-change-year-slider-next'),
				
        };

        this.eventList = JSON.parse(localStorage.getItem(localStorageName)) || {};
		this.AJAXpopulateCalendar();
        this.date = +new Date();
        this.options.maxDays = 37;
        this.init();
    }

// App methods
    init() {
        if (!this.options.id) return false;
        this.eventsTrigger();
        this.drawAll();
    }

    // draw Methods
    drawAll() {
        this.drawWeekDays();
        this.drawMonths();
        this.drawDays();
        this.drawYearAndCurrentDay();
        this.drawEvents();

    }

    drawEvents() {
				// aggiungere anche l'ora
        let calendar = this.getCalendar();
		
        
		
		if(this.eventList[calendar.active.formatted] == undefined){
			var hours = ["08:00", "08:30", "09:00", "09:30","10:00","10:30","11:00","11:30","12:00","12:30","16:00","16:30","17:00","17:30","18:00","18:30"];
			
			this.eventList[calendar.active.formatted] = [];
			
			for (var l=0;l<hours.length;l++){
							
					this.eventList[calendar.active.formatted].push('<button onclick="calendarObj.selectHour(\''+hours[l]+'\');">'+hours[l]+'</button>');

			}
		}
		let eventList =  this.eventList[calendar.active.formatted];
		
        let eventTemplate = "";
        eventList.forEach(item => {
            eventTemplate += `<div class="buttonHour">${item}</div>`;
        });

        this.elements.eventList.innerHTML = eventTemplate;
    }

    drawYearAndCurrentDay() {
        let calendar = this.getCalendar();
        this.elements.year.innerHTML = calendar.active.year;
        this.elements.currentDay.innerHTML = calendar.active.day;
        this.elements.currentWeekDay.innerHTML = AVAILABLE_WEEK_DAYS[calendar.active.week];
    }

    drawDays() {
        let calendar = this.getCalendar();

        let latestDaysInPrevMonth = this.range(calendar.active.startWeek).map((day, idx) => {
            return {
                dayNumber: this.countOfDaysInMonth(calendar.pMonth) - idx,
                month: new Date(calendar.pMonth).getMonth(),
                year: new Date(calendar.pMonth).getFullYear(),
                currentMonth: false
            }
        }).reverse();


        let daysInActiveMonth = this.range(calendar.active.days).map((day, idx) => {
            let dayNumber = idx + 1;
            let today = new Date();
            return {
                dayNumber,
                today: today.getDate() === dayNumber && today.getFullYear() === calendar.active.year && today.getMonth() === calendar.active.month,
                month: calendar.active.month,
                year: calendar.active.year,
                selected: calendar.active.day === dayNumber,
                currentMonth: true
            }
        });


        let countOfDays = this.options.maxDays - (latestDaysInPrevMonth.length + daysInActiveMonth.length);
        let daysInNextMonth = this.range(countOfDays).map((day, idx) => {
            return {
                dayNumber: idx + 1,
                month: new Date(calendar.nMonth).getMonth(),
                year: new Date(calendar.nMonth).getFullYear(),
                currentMonth: false
            }
        });

        let days = [...latestDaysInPrevMonth, ...daysInActiveMonth, ...daysInNextMonth];

        days = days.map(day => {
            let newDayParams = day;
            let formatted = this.getFormattedDate(new Date(`${Number(day.month) + 1}/${day.dayNumber}/${day.year}`));
            newDayParams.hasEvent = this.eventList[formatted];
            return newDayParams;
        });

        let daysTemplate = "";
        days.forEach(day => {																																			//event-day						
            daysTemplate += `<li class="${day.currentMonth ? '' : 'another-month'}${day.today ? ' active-day ' : ''}${day.selected ? 'selected-day' : ''}${day.hasEvent ? '' : ''}" data-day="${day.dayNumber}" data-month="${day.month}" data-year="${day.year}"></li>`
        });

        this.elements.days.innerHTML = daysTemplate;
    }

    drawMonths() {
        let availableMonths = ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"];
        let monthTemplate = "";
        let calendar = this.getCalendar();
        availableMonths.forEach((month, idx) => {
            monthTemplate += `<li class="${idx === calendar.active.month ? 'active' : ''}" data-month="${idx}">${month}</li>`
        });

        this.elements.month.innerHTML = monthTemplate;
    }

    drawWeekDays() {
        let weekTemplate = "";
        AVAILABLE_WEEK_DAYS.forEach(week => {
            weekTemplate += `<li>${week.slice(0, 3)}</li>`
        });

        this.elements.week.innerHTML = weekTemplate;
    }

    // Service methods
    eventsTrigger() {
        this.elements.prevYear.addEventListener('click', e => {
            let calendar = this.getCalendar();
            this.updateTime(calendar.pYear);
            this.drawAll()
        });

        this.elements.nextYear.addEventListener('click', e => {
            let calendar = this.getCalendar();
            this.updateTime(calendar.nYear);
            this.drawAll()
        });

        this.elements.month.addEventListener('click', e => {
            let calendar = this.getCalendar();
            let month = e.srcElement.getAttribute('data-month');
            if (!month || calendar.active.month == month) return false;

            let newMonth = new Date(calendar.active.tm).setMonth(month);
            this.updateTime(newMonth);
            this.drawAll()
        });


        this.elements.days.addEventListener('click', e => {
            let element = e.srcElement;
            let day = element.getAttribute('data-day');
            let month = element.getAttribute('data-month');
            let year = element.getAttribute('data-year');
            if (!day) return false;
            let strDate = `${Number(month) + 1}/${day}/${year}`;
            this.updateTime(strDate);
            this.drawAll()
        });


        this.elements.eventAddBtn.addEventListener('click', e => {
            let fieldValue = this.elements.eventField.value;
			var hour_start= hourSelected;	
            if (!fieldValue){
				alert("Non è possibile effettuare la prenotazione");
				return false;
			} 
			
			if(!hour_start) {
				alert("Specificare l'ora della prenotazione");
				return false;
			}

            let dateFormatted = this.getFormattedDate(new Date(this.date));
			
            //localStorage.setItem(localStorageName, JSON.stringify(this.eventList));
			
			
			// TODO scivere su DB non sul local storage
           //alert("Nome: "+ fieldValue +"registrato il giorno: "+dateFormatted+"  alle "+hour_start);
		 var date = encodeURIComponent(dateFormatted+"#"+hour_start);
		 this.AJAXpopulateDb(date,fieldValue);
			//this.elements.eventField.value = '';
			//document.getElementById('hour-start').value='';
			//this.drawAll();
			this.AJAXpopulateCalendar();
			
        });

    }

	AJAXpopulateDb(giorno,codiceFiscale){
	
	  if (codiceFiscale == "") {
		return;
	  }
	  const xhttp = new XMLHttpRequest();
		
	  xhttp.onload = function() {
		  var parser = new DOMParser().parseFromString(this.responseText, "text/html");
		  
		  var str = parser.getElementById('prenotazione-effect').innerHTML;
		  
		  if(str=="false"){
			  alert("Prenotazione non disponibile");
		  }
		  else if(str=="true"){
			  alert("Prenotazione effettuata");
		  }
	  }
	  
	  xhttp.open("GET", "PopulateDb?cod="+codiceFiscale+"&day="+giorno);
	  xhttp.send();
	
	}
	
	
	
	AJAXpopulateCalendar(){

	  const xhttp = new XMLHttpRequest();
	  	
	  xhttp.onload = function() {
		 
		var parser = new DOMParser().parseFromString(this.responseText, "text/html");
		
		var hours = [];
		var allDates= [];
		
		for(var i=0;i<parser.getElementsByClassName('date').length;i++){
			
			var str = parser.getElementsByClassName('date')[i].innerHTML;
			
			var array = str.split(" ");
			
			
			var date = array[0];
			var time = array[1];
			
			var arraydate = date.split('-');
			
			var arraytime = time.split(':');
			
			for(var k=0;k<3;k++){
				if(arraydate[k].startsWith("0")){
					arraydate[k]=arraydate[k].slice(1);
				}
			}
				
			
			var dateFormatted = arraydate[2] + "/" + arraydate[1] + "/" + arraydate[0];
			
			var timeFormatted = arraytime[0] + ":" + arraytime[1];
			
			
			calendarObj.eventList[dateFormatted] = [];
			
			//alert(str);
			if(!allDates.includes(dateFormatted)){
				allDates.push(dateFormatted);
			}
			
			
			if(hours[dateFormatted] == undefined){
				hours[dateFormatted]=["08:00", "08:30", "09:00", "09:30","10:00","10:30","11:00","11:30","12:00","12:30","16:00","16:30","17:00","17:30","18:00","18:30"];
			}
			
			hours[dateFormatted].splice(hours[dateFormatted].indexOf(timeFormatted), 1); 
			
			
			
			
		}
		
		allDates.forEach((element, index) => { 
				var specificDate=allDates[index];
			
				
				for (var l=0;l<hours[specificDate].length;l++){
					//alert(hours[dateFormatted]);		
						
							calendarObj.eventList[specificDate].push('<button onclick="calendarObj.selectHour(\''+hours[specificDate][l]+'\');">'+hours[specificDate][l]+'</button>');
            
							localStorage.setItem(localStorageName, JSON.stringify(calendarObj.eventList));

				}
				
			});
			
			calendarObj.drawAll()
			localStorage.clear();
		
		
			
	  }
	  xhttp.open("GET", "PopulateCalendar");
	  xhttp.send();
	
	}
	
	selectHour(hour){
			hourSelected=hour;
			document.getElementById("prenotazione-submit").click();
	}
	

    updateTime(time) {
        this.date = +new Date(time);
    }

    getCalendar() {
        let time = new Date(this.date);

        return {
            active: {
                days: this.countOfDaysInMonth(time),
                startWeek: this.getStartedDayOfWeekByTime(time),
                day: time.getDate(),
                week: time.getDay(),
                month: time.getMonth(),
                year: time.getFullYear(),
                formatted: this.getFormattedDate(time),
                tm: +time
            },
            pMonth: new Date(time.getFullYear(), time.getMonth() - 1, 1),
            nMonth: new Date(time.getFullYear(), time.getMonth() + 1, 1),
            pYear: new Date(new Date(time).getFullYear() - 1, 0, 1),
            nYear: new Date(new Date(time).getFullYear() + 1, 0, 1)
        }
    }

    countOfDaysInMonth(time) {
        let date = this.getMonthAndYear(time);
        return new Date(date.year, date.month + 1, 0).getDate();
    }

    getStartedDayOfWeekByTime(time) {
        let date = this.getMonthAndYear(time);
        return new Date(date.year, date.month, 1).getDay();
    }

    getMonthAndYear(time) {
        let date = new Date(time);
        return {
            year: date.getFullYear(),
            month: date.getMonth()
        }
    }

    getFormattedDate(date) {
        return `${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
    }

    range(number) {
        return new Array(number).fill().map((e, i) => i);
    }

    getFirstElementInsideIdByClassName(className) {
        return document.getElementById(this.options.id).getElementsByClassName(className)[0];
    }
}


(function () {
    var calendar = new CALENDAR({
        id: "calendar"
    })
	calendarObj=calendar;
})();

