<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head>
	<title>Prenotazione Tampone</title>
	<style>
		#map {
			height: 500px;
			width: 100%;
		}
	</style>
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
	?>
	
      <div class="container-fluid align-items-center" style="padding-top: 70px">
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                
				<center>
					
					<div id="map"></div>
					
					<script type="text/javascript">
						if (navigator.geolocation) {
							navigator.geolocation.getCurrentPosition(function (p) {
								var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
								var mapOptions = {
									center: LatLng,
									zoom: 13,
									mapTypeId: google.maps.MapTypeId.ROADMAP
								};

								var map = new google.maps.Map(document.getElementById("map"), mapOptions);

								addMarker({
									coords:LatLng,
									iconImage:'/img/map-marker-17-64x64.png',
									content:'<div style="display:table;height:40px;width:120px;font-size:15px"><div style="display:table-cell;vertical-align:middle;color:black">Posizione Attuale<br /></div></div>'
								});

								addMarker({
									coords:{lat:41.110872613430324, lng:16.871876888745046},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Studio Tre srl<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;1.4 km<br />Costo tampone antigenico:&ensp;€25<br />' + 
												'Costo tampone molecolare:&ensp;€60</div></div></div>'
									});
								addMarker({
									coords:{lat:41.1012877587008, lng:16.87665659107555},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Lab. Point<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;1.5 km<br />Costo tampone antigenico:&ensp;€25<br />' + 
												'Costo tampone molecolare:&ensp;€60</div></div></div>'
									});
								addMarker({
									coords:{lat:41.11573451682478, lng:16.868607830977883},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Laboratorio Analisi<br />De Metrio<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;2.1 km<br />Costo tampone antigenico:&ensp;€25<br />' + 
												'Costo tampone molecolare:&ensp;€65</div></div></div>'
									});
								addMarker({
									coords:{lat:41.107563339300114, lng:16.863083266208903},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Laboratorio Analisi Scotti<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;1.9 km<br />Costo tampone antigenico:&ensp;€30<br />' + 
												'Costo tampone molecolare:&ensp;€60</div></div></div>'
									});
								addMarker({
									coords:{lat:41.099738642268356, lng:16.88293429524746},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Laboratorio Analisi Cusmai<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;1.5 km<br />Costo tampone antigenico:&ensp;€33<br />' + 
												'Costo tampone molecolare:&ensp;€62</div></div></div>'
									});
								addMarker({
									coords:{lat:41.121120289558064, lng:16.86665880342412},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Centro Analisi Leondeff<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;2.8 km<br />Costo tampone antigenico:&ensp;€25<br />' + 
												'Costo tampone molecolare:&ensp;€60</div></div></div>'
									});
								addMarker({
									coords:{lat:41.11425143762908, lng:16.89312937252095},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Laboratorio Analisi Due Emme<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;1.8 km<br />Costo tampone antigenico:&ensp;€30<br />' + 
												'Costo tampone molecolare:&ensp;€62</div></div></div>'
									});
								addMarker({
									coords:{lat:41.099158548851086, lng:16.851034112526403},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Biolabor srl<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;3.9 km<br />Costo tampone antigenico:&ensp;€25<br />' + 
												'Costo tampone molecolare:&ensp;€60</div></div></div>'
									});
								addMarker({
									coords:{lat:41.11274054184587, lng:16.878949799783886},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Analisi Cliniche Trullo<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;1.2 km<br />Costo tampone antigenico:&ensp;€25<br />' + 
												'Costo tampone molecolare:&ensp;€62</div></div></div>'
									});
								addMarker({
									coords:{lat:41.12176087305888, lng:16.876589455777964},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Analisi Cliniche Verdi<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;2.1 km<br />Costo tampone antigenico:&ensp;€27<br />' + 
												'Costo tampone molecolare:&ensp;€60</div></div></div>'
									});
								addMarker({
									coords:{lat:41.11171925756446, lng:16.852382474872},
									content:'<div style = "display:table;height:40px;width:200px"><div style="display:table-cell;vertical-align:middle;color:black;font-size:20px">' +
												'Analisi Cliniche Bianchi<br /><br /><div style="color:grey;font-size:12px">Distanza:&ensp;3.5 km<br />Costo tampone antigenico:&ensp;€25<br />' + 
												'Costo tampone molecolare:&ensp;€60</div></div></div>'
									});

								function addMarker(props) {
									var marker = new google.maps.Marker({
										position:props.coords,
										map:map,
									});

									if (props.iconImage) {
										marker.setIcon(props.iconImage);
									}

									if (props.content) {
										var infoWindow = new google.maps.InfoWindow({
											content:props.content
										});

										marker.addListener('click', function(){
											infoWindow.open(map, marker);
										});
									}
									
								}
							});
						} else {
							alert('Geo Location feature is not supported in this browser.');
						}
					</script>
					
					<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAGD-JlQ-N1_FSLdrJJu1g6i1oLpSQJNA&callback=initMap"></script>
					

					<p><br />Visualizza sulla mappa il nome, la distanza e il costo di ogni laboratorio<br />Scegli il laboratorio dall'elenco qui sotto</br></br></p>

						<?PHP
							foreach ($laboratori as $laboratorio) {
								echo "
									<div class='card card-profile shadow'>
										<div class='row justify-content-center'>
										<div class='col-lg-3 order-lg-2'>
										</div>
										</div>
										<div class='card-body pt-0 pt-md-4'>
										<div class='text-center'>
											<center>
												<a href='/Prenotazione/salvaLab/".$laboratorio['Nome']."'><p>".$laboratorio['Nome']."</p></a>
											</center>
										</div>
										</div>
									</div>
								";
							}
						?>

					
				</center>
			  </div>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>
      <!--</div>
    </div>
  </div>-->
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        
      </div>
    </div>
  </footer>
</body>
