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
        #mapid {height: calc(100vh - 86px);  z-index: 1; padding-left: 280px; overflow:hidden !important}
        #map01_comparator{height: 75vh; z-index: 1;}
        #map02_comparator{height: 75vh; z-index:1; }
    </style>


    <style>

        #comparator_modal {
            margin: 0;
            padding: 0px;
            padding-left:10px;
            padding-top:10px;


        }
        #id01 {
            padding: 50px;
        }
        #id02 {
            background-color: #eee;
            height: calc(100vh - 200px);
            overflow-x: hidden;
            overflow-y: scroll;
        }
        #comparator_modal_body {
            min-height: 100%;
            border-radius: 0;
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
									
										<div class="w3-container w3-light-grey w3-text-blue w3-margin w3-border w3-border-cyan">
										<h3 class="w3-center">Contact Us</h3>
										 
										<div class="w3-row w3-section">
										  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
											<div class="w3-rest">
											  <input id="mail" class="w3-input w3-border" name="email" type="text" placeholder="Email">
											</div>
										</div>

										<div class="w3-row w3-section">
										  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
											<div class="w3-rest">
											  <input id="pergunta" class="w3-input w3-border" name="message" type="text" placeholder="Message">
											</div>
										</div>

										<button onclick="insertFaqs()" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>
										</div>
										<br>
								
									<!--END FORM -->
								<p>
								</div>
								</body>
								<footer class="w3-container w3-light-grey">
								
								</footer>
							</div>
						</div>
				<!-- END MODAL -->


                <!-- Comparator MODAL -->
                <div id="comparator_modal" class="  w3-modal ">
                    <div  class="w3-modal-content  w3-animate-left w3-card-4 w3-center w3-blue" style = "width:90vw; height:90vh;">
                        <header class="w3-container w3-blue">
                            <span onclick="document.getElementById('comparator_modal').style.display='none'"
                                  class="w3-btn w3-red w3-round w3-display-topright" style="font-size:16px; text-shadow:2px 1px 0 #444;">&times;</span>
                            <h3 class="w3-center" style="text-shadow:2px 1px 0 #444;">Comparator</h3>
                        </header>
                        <body>
                            <div id="comparator_modal_body">
                                <div class=w3-row">
                                   <div id="map01_comparator" class=" w3-half w3-text-black"></div>
                                    <div id="map02_comparator" class="w3-half w3-text-black"></div>
                                </div>
                                    <div class="w3-row">
                                        <div class="w3-half">
                                            <input id="date3" class = "w3-center"onchange= "updateJson1();" type="date" name="time_map_1" min="2000-01-02"><br>
                                        </div>
                                        <div class="w3-half">
                                            <input id="date4" class = "w3-center" onchange= "updateJson2();" type="date" name="time_map_2" min="2017-03-02"><br>
                                        </div>
                                    </div>

                            </div>
                        </body>
                        <footer class="w3-container w3-light-grey">

                        </footer>
                    </div>
                </div>
                <!-- END Comparator MODAL -->
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
		
				<div class="w3-container w3-sidebar w3-indigo w3-bar-block w3-small" style="position: absolute !important; height: calc(100vh - 100px); width:280px">
				  <!-- Menu -->
				  <div class="w3-card-4">
				  <h4 class="w3-bar-item w3-card-4 w3-leftbar w3-border-white" style="text-shadow:3px 1px 0 #044;">Layers</h4>
				  <button class="w3-bar-item w3-button" onclick="onClick_noise();">Noise Map</button>
				  <button class="w3-bar-item w3-button" onclick="onClick_p05();">Stats p05</button>
				  <button class="w3-bar-item w3-button" onclick="onClick_p95();">Stats p95</button>
				  <button class="w3-bar-item w3-button" onclick="onClick_sel7();">Stats SEL7</button>
				 </div>

				<!-- Player -->

                    <div id = "button_player" style="display:block">
                        <button  onclick="accordion('player', true)" class="w3-bar-item w3-button w3-leftbar w3-card-4  w3-border-khaki" style="margin-top:0.67em; font-size:18px; display: block"">Player </button>
                        <div id ="player" class=" w3-container w3-hide w3-bar w3-card-4" style="margin-top:0.67em; margin-bottom:0.67em">
                            <!--Enter a date after 1980-01-01:--><br>
                            <input id="date1" onchange="updateDate1()" type="date" name="inicio" min="2000-01-02">&nbsp;Start<br><br>
                            <!--Enter a date after 2000-01-01:<br-->
                            <input id="date2" onchange="updateDate2()"type="date" name="fim" min="2017-03-02">&nbsp;End<br><br>


                            <button class="w3-btn w3-teal w3-round-large " onclick="StartPlayer(); show('slider1');"><i class="fa fa-play" style="font-size:14px;"></i></button>
                            <button class="w3-btn w3-orange w3-text-white w3-round-large" onclick="PausePlayer()" ><i class="fa fa-pause" style="font-size:14px;"></i></button>
                            <button class="w3-btn w3-red w3-round-large"><i class="fa fa-stop" style="font-size:14px;" onclick="StopPLayer(); hide('slider1');"></i></button>
                            <br><br>
                            <input type="range" id="slider1" value="10" min="0" max="100" oninput="JumpFrame()" title=value style = "display:none">
                        </div>
                    </div>
                    <!-- Comparator -->
                    <div id="button_comparator" style = "display: none;">
                        <button  onclick="accordion('comparator', false);" class="w3-bar-item w3-button w3-leftbar w3-card-4  w3-border-khaki" style="margin-top:0.67em; font-size:18px;">Comparator </button>

                        <div id ="comparator" class=" w3-container w3-hide w3-bar w3-card-4" style="margin-top:0.67em; margin-bottom:0.67em">
                            <br>
                            <select name="types">
                                <option value="p05">p05</option>
                                <option value="p95">p95</option>
                                <option value="SEL7">SEL7</option>
                            </select><br><br>

                            <!--Enter a date after 2000-01-01:<br-->

                            <button onclick="comparator_modal_loader(); startComparator()" class="w3-bar-item w3-button w3-teal w3-round-large">Compare</button>
                            <br>
                        </div>
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
