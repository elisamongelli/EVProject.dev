
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="topnav">
  <a href="/Home/logout">Esci</a>
  <a href="/Account/infoAccount/<?= esc(session()->get('ruolo')) ?>" style="float: right">Il mio profilo</a>
  <a class="active" href="/Dashboard/vdDashboard/<?= esc(session()->get('ruolo')) ?>">Menù</a>
   <a href="/Opuscolo">Opuscolo</a>
  
</div>

