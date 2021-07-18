
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/stle-custom.css" rel="stylesheet">

<nav class="topnav" id="navbar-main"> 
	<div class="container-fluid">
	
	  <div class="media align-items-center-home">
        <?php
            if (!$accesso) {
                echo "<a href='/Home'><i class='fa fa-angle-left' aria-hidden='true' style='font-size:35px ; color:white'></i></a>";
            }
            else {
                $ruolo = session()->get('ruolo');
                echo "<a href='/Dashboard/vdDashboard/".$ruolo."'><i class='fa fa-angle-left' style='font-size:35px ; color:white'></i></a>";
            }
        ?>
	      <div class="media-body ml-2 d-none d-lg-block">
			<span class="mb-0 text-sm font-weight-bold"></br></span>
          </div>
      </div>
    </div>
</nav>

