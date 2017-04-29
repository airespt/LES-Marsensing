<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<title>Shipping Noise</title>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>			
		
<body>
	
	<!-- Top BAR -->
	<div class="w3-bar w3-blue w3-card-4">
		<div class="w3-container">
			<div class="w3-row">
			<div class="w3-third w3-container w3-cell w3-cell-middle">
			<div class="w3-left" style="font-family: Impact; font-size: 42px; text-shadow:4px 2px 0 #044">Shipping Noise</div>
			</div>
		<div class="w3-third w3-container w3-cell w3-cell-middle">
			<div class="w3-center" style="font-size:24px; padding-top:10px; text-shadow:2px 1px 0 #444">Underwater Acoustic Map (&beta;)</div>
		</div>
		<div class="w3-third w3-container w3-cell w3-cell-middle">
			<div style="padding-top:15px; text-shadow:2px 1px 0 #444"><button class="w3-right w3-btn w3-red w3-round-large" >FAQ</button></div>
		</div>
	</div>
	<!--
			<h6><button class="w3-right w3-btn w3-red w3-round-large" style="text-shadow:2px 1px 0 #444">FAQ</button></h6>
			<h6 class="w3-left" style="font-family: Impact; font-size: 36px; text-shadow:4px 2px 0 #044">Shipping Noise</h6>
			<h6 class="w3-center" style="font-size: 24px; text-shadow:2px 1px 0 #444">Underwater Acoustic Map (β)</h6>
		-->
		</div>

	</div>

			<!-- Sidebar -->
			<div class="w3-sidebar w3-indigo w3-bar-block w3-small" style="width:240px; padding-bottom:100px">
				  <!-- Menu -->
				  <div class="w3-card-4">
				  <h4 class="w3-bar-item w3-card-4 w3-leftbar w3-border-white" style="text-shadow:3px 1px 0 #044">Layers</h4>
				  <a href="#" class="w3-bar-item w3-button">Noise Map</a>
				  <a href="#" class="w3-bar-item w3-button ">Stats p05</a>
				  <a href="#" class="w3-bar-item w3-button ">Stats p95</a>
				  <a href="#" class="w3-bar-item w3-button ">Stats SEL7</a>
				  </div>
				
				<!-- Player -->	
				<h4 class="w3-bar-item w3-card-4 w3-leftbar w3-border-khaki" style="text-shadow:3px 1px 0 #044">Player</h4>
			
				<div class="w3-container w3-bar w3-card-4">
					<form action="/action_page.php">
							<!--Enter a date after 1980-01-01:--><br>
							<input type="date" name="inicio" min="2000-01-02">&nbsp;Start<br><br>
							<!--Enter a date after 2000-01-01:<br-->
							<input type="date" name="fim" min="2017-03-02">&nbsp;End<br><br>
							<!-- input type="submit"--> 
					</form>
					
					<button class="w3-btn w3-teal w3-round-large "><i class="fa fa-play" style="font-size:14px;"></i></button>
					<button class="w3-btn w3-orange w3-text-white w3-round-large"><i class="fa fa-pause" style="font-size:14px;"></i></button>
					<button class="w3-btn w3-red w3-round-large"><i class="fa fa-stop" style="font-size:14px;"></i></button>
					<br><br>
				</div>
				
				<!-- Context info -->
				<h4 class="w3-bar-item w3-card-4 w3-leftbar w3-border-light-grey" style="text-shadow:3px 1px 0 #044">Context Info</h4>
				<div class="w3-bar-item">
					<p>Re-béu-béu pardais ao ninho</p>
				</div>
			</div>

			<!-- Page Content -->
			<div style="margin-left:240px">

				<div class="w3-container">
				<h2>Pôr o mapa aqui</h2>
				<p>largura 240px".</p>
				
				</div>

				<footer>
						<div class="w3-bottom w3-card-4">
							<div class="w3-bar w3-blue w3-center w3-small" style="width:87%">
						&copy;2011-2015&nbsp;<a href="http://www.marsensing.com" title="MarSensing Lda">MarSensing
						Lda</a>, sponsored by <a href="http://www.cintal.ualg.pt"
						title="CINTAL">CINTAL</a> - University of the Algarve (<a
						href="http://www.ualg.pt/">UALG</a>)
						</div>
						</div>
				</footer>
			
			</div>
      
	
	  
	  
</body>
</html>
