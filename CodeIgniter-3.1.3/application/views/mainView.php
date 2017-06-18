<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shipping Noise</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<!--  #mapid {margin-left:45px; height: 600px; z-index: 1; width=100%; overflow:hidden !important} -->
    <style>
        #mapid {height: calc(100vh - 82px);  z-index: 1; padding-left: 280px; overflow:hidden !important}
    </style>


    <style>
    
        #id01 {
            padding: 50px;
        }
        #id02 {
            background-color: #eee;
            height: calc(100vh - 200px);
            overflow-x: hidden;
            overflow-y: scroll;
        }
		
    </style>

</head>

<body class="w3-indigo">

	<!-- Top BAR -->
	<div class="w3-bar w3-blue w3-card-4">
		<div class="w3-container">
			<div class="w3-row">
                <div class="w3-third w3-container w3-cell w3-cell-middle">
                    <div class="w3-left" style="font-family: Impact; font-size: 42px; text-shadow:4px 2px 0 #044;">Shipping Noise</div>
                </div>
                <div class="w3-third w3-container w3-cell w3-cell-middle">
                    <div class="w3-center" style="font-size:24px; padding-top:10px; text-shadow:2px 1px 0 #444;">Underwater Acoustic Map (&beta;)</div>
                </div>
                <div class="w3-third w3-container w3-cell w3-cell-middle">
                    <div style="padding-top:15px; text-shadow:2px 1px 0 #444">
				<!-- FAQ MODAL -->
						<button onclick="loadFaqs()" class="w3-right w3-btn w3-red w3-round-large" >FAQ</button></div>
						<div id="id01" class="w3-modal">
							<div  class="w3-modal-content w3-animate-top w3-card-4">
								<header class="w3-container w3-blue"> 
									<span onclick="document.getElementById('id01').style.display='none'" 
										class="w3-btn w3-red w3-round w3-display-topright" style="font-size:16px; text-shadow:2px 1px 0 #444;">&times;</span>
									 <h3 class="w3-center" style="text-shadow:2px 1px 0 #444;">Frequently Asked Questions</h3>
								</header>
								<body>
								<div id="id02" class="w3-container w3-text-black ">
									<div class="w3-container">
										<!--COMBOBOX--><!--Substituir NextPage.php-->
											<p>
											<select name="ComboName" id="comb1" onChange="loadFaqs()">
												<option value="ingles" >English</option>
												<option value="portugues">Português</option>
											</select>
										<!--END COMBOBOX-->

                                        <!-- this content is replaced by faqsJS -->
										<div class="w3-container" id="id03">
											<h3>What is ShippingNoise.com?</h3>
											<p>This site shows modelled...</p>
											<p>
											<h3>Why did you create this site?</h3>
											<p>Our objective is to show...</p>
											<p>
										</div>
									
									</div>
									<br>
									<!-- FORM -->
								
									<!-- Alterar a /action_page.php -->
									<form action="/action_page.php">
										<div class="w3-container w3-light-grey w3-text-blue w3-margin w3-border w3-border-cyan">
										<h3 class="w3-center">Contact Us</h3>
										 
										<div class="w3-row w3-section">
										  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
											<div class="w3-rest">
											  <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
											</div>
										</div>

										<div class="w3-row w3-section">
										  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
											<div class="w3-rest">
											  <input class="w3-input w3-border" name="message" type="text" placeholder="Message">
											</div>
										</div>

										<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>
										</div>
										<br>
									</form>
									<!--END FORM -->
								<p>
								</div>
								</body>
								<footer class="w3-container w3-light-grey">
								
								</footer>
							</div>
						</div>
				<!-- END MODAL -->
				</div>
            </div>
	<!--
			<h6><button class="w3-right w3-btn w3-red w3-round-large" style="text-shadow:2px 1px 0 #444">FAQ</button></h6>
			<h6 class="w3-left" style="font-family: Impact; font-size: 36px; text-shadow:4px 2px 0 #044">Shipping Noise</h6>
			<h6 class="w3-center" style="font-size: 24px; text-shadow:2px 1px 0 #444">Underwater Acoustic Map (β)</h6>
		-->
		</div>
	</div>
          
          
			<!-- SIDEBAR -->
		
				<div class="w3-container w3-sidebar w3-indigo w3-bar-block w3-small" style="height: calc(100vh - 100px); width:280px">
				  <!-- Menu -->
				  <div class="w3-card-4">
				  <h4 class="w3-bar-item w3-card-4 w3-leftbar w3-border-white" style="text-shadow:3px 1px 0 #044;">Layers</h4>
				  <button class="w3-bar-item w3-button" onclick="onClick_noise()">Noise Map</button>
				  <button class="w3-bar-item w3-button" onclick="onClick_p05()">Stats p05</button>
				  <button class="w3-bar-item w3-button" onclick="onClick_p95()">Stats p95</button>
				  <button class="w3-bar-item w3-button" onclick="onClick_sel7()">Stats SEL7</button>
				 </div>

				<!-- Player -->
				<h4 class="w3-bar-item w3-card-4 w3-leftbar w3-border-khaki" style="text-shadow:3px 1px 0 #044;">Player</h4>

				<div class="w3-container w3-bar w3-card-4">
                    <!--Enter a date after 1980-01-01:--><br>
                    <input type="date" name="inicio" min="2000-01-02">&nbsp;Start<br><br>
                    <!--Enter a date after 2000-01-01:<br-->
                    <input type="date" name="fim" min="2017-03-02">&nbsp;End<br><br>


					<button class="w3-btn w3-teal w3-round-large " onclick="startPlayer()"><i class="fa fa-play" style="font-size:14px;"></i></button>
					<button class="w3-btn w3-orange w3-text-white w3-round-large" onclick="StopPlayer()" ><i class="fa fa-pause" style="font-size:14px;"></i></button>
					<button class="w3-btn w3-red w3-round-large"><i class="fa fa-stop" style="font-size:14px;"></i></button>
					<br><br>
                    <input type="range" id="slider1" value="10" min="0" max="100" oninput="jumpFrame()" title=value>
				</div>

				<!-- Context info -->
				<h4 class="w3-bar-item w3-card-4 w3-leftbar w3-border-light-grey" style="text-shadow:3px 1px 0 #044;">Context Info</h4>
					<!--				<div class="w3-bar-item">
					<p>Re-béu-béu pardais ao ninho</p>
				</div> -->
				</div>
			
			<!-- MAP -->
            <div style="padding-left: 280px">
                <div id="mapid"></div>
            <!-- LeafLet map is loaded in mainController from views/javascripts/leafLetJS -->
            </div>


    <footer>
        <div class="w3-bottom  w3-card-4">
            <div class="w3-bar  w3-blue w3-center w3-small" style="width:100%">
                &copy;2011-2015&nbsp;<a href="http://www.marsensing.com" title="MarSensing Lda">MarSensing
                    Lda</a>, sponsored by <a href="http://www.cintal.ualg.pt"
                                             title="CINTAL">CINTAL</a> - University of the Algarve (<a
                        href="http://www.ualg.pt/">UALG</a>)
            </div>
        </div>
    </footer>
</body>
</html>
