<?php
	
	function getParam($page)
	{
		//echo $page;
		if(isset($_REQUEST[$page]))
		{
			$page = $_REQUEST[$page];
		} else 
			{	
				$page = '';
			}
			return $page;
	}

	$task = getParam('task'); 
	
	switch($task)
	{
		case 'index':
		solver();
		break;

		case 'solver':
		solver();
		break;

		case 'second_reaction':
		second_reaction();
		break;

		case 'third_reaction':
		third_reaction();
		break;

        case 'fourth_reaction':
        fourth_reaction();
        break;

		case 'graph':
		graph();
		break;

        case 'graph2':
        graph2();
        break;

        case 'graph_reaction1':
        graph_reaction1();
        break;

        case 'graph4':
        graph4();
        break;

		case 'dataset':
		dataset();
		break;

        case 'dataset2':
        dataset2();
        break;

        case 'dataset3':
        dataset3();
        break;

         case 'dataset4':
        dataset4();
        break;

		default:
		solver();
		break;
	}
    function solver(){		
		?>
		<input type="hidden" id="current" value="solver">
		 <!--Displaying Solver and Table-->
         <a href="index.php?task=dataset" style="color: black;">
         <div class="visual" style="margin-left: 20px;">
            <i class="fas fa-table" style="margin-right: 5px;"></i><span>View Table</span>
        </div>
        </a>
         <a href="index.php?task=graph_reaction1" style="color: black;">
         <div class="visual">
           <i class="fas fa-chart-line" style="margin-right: 5px;"></i><span>View Graph</span>
        </div>
        </a>

        <div class="solver" id="solver" style="margin-top: 30px;">
            <p class="solver_title" id="solver_title">  Specific Rate Constant and Frequency Factor Solver</p><br>
            <div class="reaction_btn">
                <p id="label">Reaction : </p>
                <a href="index.php?task=solver">
	                <button id="first_reaction"  title="solve" >
	                2 HI <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> I<sub>2</sub>+H<sub>2</sub>
	                </button>
            	</a>
            	<a href="index.php?task=second_reaction">
	                <button id="second_reaction"  title="solve" >
	                2   NO <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> N<sub>2</sub>+O<sub>2</sub>
	                </button>
           		 </a>
           		<a href="index.php?task=third_reaction">
                <button id="third_reaction"  title="solve" >
                CO+O<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> 𝐂𝐎<sub>2</sub>+O
                </button>
            </a>


            <a href="index.php?task=fourth_reaction">
                <button id="fourth_reaction"  title="solve" >
               Br+H<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> HBr+H
                </button>
            </a>
            </div><!-- End of reaction_btn -->

            <div class='temp_wrap animated scaleIn' id='temp_wrap' >
               
            <label style="font-weight: 700;" id="label1">Temperature:</label>
            <input type="text" id="temperature" placeholder="enter temperature" value="594.55" onkeyup="compute();"> 
            <input type="hidden" name="B16" id="B16">
            <input type="hidden" name="delta_value" id="delta_value">
            
            
        </div>
        <div id="first_reaction_table" >
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray;" class="animated fadeInRightBig">
                <tr>
                    <th colspan="4" style="background: rgb(30, 136, 229);color:white;">Collision Theory</th>
                </tr>
                <tr>
                    <td id='given_title'> &sigma; (cm)</td>
                    <td>3.5 x 10<sup>-8</sup> cm</td>
                    <td>N</td>
                    <td>6.0223E+23</td>
                </tr>
                 <tr >
                    <td id='given_title'>E (cal)</td>
                    <td>44000 cal/mol</td>
                     <td>M</td>
                    <td>127.911</td>
                </tr>
                <tr>
                    <td id='given_title'>k (erg/K mol)</td>
                    <td>1.38 x 10<sup> -16</sup> </td>
                    <td>h</td>
                    <td>6.63E-27</td>
                </tr>
                <tr >
                    
                </tr>
                 <tr >
                    <td id='given_title' style="font-weight: 700;color:black;">T(K)</td>
                    <td id="temp"></td>
                    <td id='given_title' style="font-weight: 700;color:black;">&Delta;S#</td>
                    <td id="delta" style="font-weight: 700;color:black;"></td>
                </tr>
            </table>
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray" class="animated fadeInUpBig">
                <tr style="background: rgb(173, 153, 86);">
                    <th></th>
                    <th id='given_title' style="color:white;font-weight: 400;">CGS Unit(cm<sup>3</sup>/gmol s)</th>
                    <th id='given_title' style="color:white;font-weight: 400;">SI Unit(m<sup>3</sup>/kgmol s)</th>
                </tr>
                <tr>
                    <td id='given_title' style="color: rgb(28, 129, 217);font-weight: 700;">k</td>
                    <td id="k_value"></td>
                    <td id="k_si_value"></td>
                </tr> 
                 <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;">A (collision)</td>
                    <td id="a_value" ></td>
                    <td id="a_si_value"></td>
                </tr>

                <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;">A (Arrhenius)</td>
                    <td id="react_a1" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                    <td id="react_si_1" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>

                <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;">A (Transition State Theory)</td>
                    <td id="react_a2" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                    <td id="react_si_2" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>
            </table>
        </div>
		<script type="text/javascript">
		function compute(){
		    var B6=3.5*Math.pow(10,-8);
		    var B7=44000;
		    var B8=document.getElementById('temperature').value; //value of temperature enter by user
		    var B9=1.38*Math.pow(10,-16);
		    var D6=6.0223*Math.pow(10,23);
		    var D7=127.911;
		    //formula for A
		    var answer=(Math.pow(B6,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B8*B9*D6*((1/D7)+(1/D7)))));
		    //Changing A to exponential form
		    var final_a=answer.toExponential(3);
		    //Displaying A to the Table
		    var a_value=document.getElementById('a_value').innerHTML=final_a;
		    //formula for A
		    var answer_k=(Math.pow(B6,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B8*B9*D6*((1/D7)+(1/D7))))*Math.exp(-B7/(1.987*B8)));
		     //Changing k to exponential form
		     var final_k=answer_k.toExponential(2);
		     //Displaying k to the Table
		    var k_value=document.getElementById('k_value').innerHTML=final_k;
		    //Displaying temperature to the Table
		    var temp=document.getElementById('temp').innerHTML=B8;
		    //formula for SI of A
		    var si_pow=Math.pow(100,3);
		    var a_si_value=answer * (1000/si_pow);
		    //Changing SI of A to exponential form
		    var si_first=a_si_value.toExponential(3);
		    //Displaying SI of A to the Table
		    var a_si_value_text=document.getElementById('a_si_value').innerHTML=si_first;
		     //formula for SI of k
		    var k_si_value=answer_k * (1000/si_pow);
		    //Changing SI of k to exponential form
		    var si_second=k_si_value.toExponential(2);
		     //Displaying SI of k to the Table
		    var k_si_value_text=document.getElementById('k_si_value').innerHTML=si_second;

            var B14=answer_k;
            var D10=6.63E-27;
            var B10=1.38E-16;
            var D72=6.0223E+23;
            var B92=document.getElementById('temperature').value;
            var B82=4.40E+04;
            var delta=1.987*(Math.log((B14*D10)/(B10*D72*B92*Math.exp(2)))+(B82/(1.987*B92)));
            document.getElementById('delta').innerHTML=delta;
             document.getElementById('react_a1').innerHTML=final_a;
             document.getElementById('react_si_1').innerHTML=a_si_value_text;
             document.getElementById('react_a2').innerHTML=final_a;
             document.getElementById('react_a2').innerHTML=final_a;
             document.getElementById('react_si_2').innerHTML=a_si_value_text;
              document.getElementById('delta_value').value=delta;
              document.getElementById('B16').value=final_a;
   		}  
		</script>
		<?php
		}function second_reaction(){
		?>
          <a href="index.php?task=dataset2" style="color: black;">
         <div class="visual" style="margin-left: 20px;">
            <i class="fas fa-table" style="margin-right: 5px;"></i><span>View Table</span>
        </div>
        </a>
         <a href="index.php?task=graph2" style="color: black;">
         <div class="visual">
           <i class="fas fa-chart-line" style="margin-right: 5px;"></i><span>View Graph</span>
        </div>
        </a>
 		<div class="solver" id="solver">
            <p class="solver_title" id="solver_title">  Specific Rate Constant and Frequency Factor Solver</p><br>
            <div class="reaction_btn">
                <p id="label">Reaction : </p>
                <a href="index.php?task=solver">
	                <button id="first_reaction"  title="solve" >
	                2 HI <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> I<sub>2</sub>+H<sub>2</sub>
	                </button>
            	</a>
            	<a href="index.php?task=second_reaction">
	                <button id="second_reaction"  title="solve" >
	                2   NO <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> N<sub>2</sub>+O<sub>2</sub>
	                </button>
           		 </a>
           		  <a href="index.php?task=third_reaction">
                <button id="third_reaction"  title="solve" >
                CO+O<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> 𝐂𝐎<sub>2</sub>+O
                </button>
            	</a>
                 <a href="index.php?task=fourth_reaction">
                <button id="fourth_reaction"  title="solve" >
               Br+H<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> HBr+H
                </button>
            </a>
            </div><!-- End of reaction_btn -->
		<!--Second Reaction-->
		<input type="hidden" id="current" value="second_reaction">
		 <div class='temp_wrap2 animated scaleIn' id="temp_wrap2" >
            
                <label style="font-weight: 700;" id="label2">Temperature:</label>
                <input type="text" id="temperature2" placeholder="enter temperature" value="500"  onkeyup="compute();"  name='temperature'> 
                <input type="hidden" id="a_value_input" name="a_value_input">
                <input type="hidden" id="as_value" name="as_value_input">
                
            </div>
		<div id="second_reaction_table"  >
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray;" class="animated fadeInRightBig">
                <tr>
                    <th colspan="4" style="background: rgb(30, 136, 229);color:white;">Collision Theory</th>
                </tr>
                <tr>
                    <td id='given_title'>&sigma;</td>
                    <td>2.5E-08 </td>
                    <td>N</td>
                    <td>6.0223E+23</td>
                </tr>
                 <tr >
                    <td id='given_title'>E </td>
                    <td>7.00E+04</td>
                    <td>M</td>
                    <td>30.01</td>
                </tr>
                <tr >
                    <td id='given_title'>k</td>
                    <td>1.38E-16</td>
                    <td>h</td>
                    <td>6.63E-27</td>

                </tr>
                 <tr >
                    <td id='given_title' style="font-weight: 700;color:black;">T(K)</td>
                    <td id="temp2" ></td>
                       <td id='given_title' style="font-weight:700;color:black; ">ΔS#</td>
                    <td id='as' style="font-weight:700;color:black; "></td>
                </tr>
            </table>
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray" class="animated fadeInUpBig">
                <tr style="background: rgb(173, 153, 86);">
                    <th></th>
                    <th  id='given_title' style="color:white;font-weight: 400;"> CGS Unit(cm<sup>3</sup>/gmol s) </th>
                    <th  id='given_title'  style="color:white;font-weight: 400;">SI Unit(m<sup>3</sup>/kgmol s)</th>
                </tr>
               
                 <tr>
                    <td id='given_title' style="color: rgb(28, 129, 217);font-weight: 700;">k</td>
                    <td id="k_value2"></td>
                    <td id="k_si_value2"></td>
                </tr> 

                 <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;" >A (collision)</td>
                    <td id="a_value2"></td>
                    <td id="a_si_value2"></td>
                </tr>

                  <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;" >A (arrhenius)</td>
                    <td id="a_value21" style="color: rgb(202, 12, 48);font-weight: 700;"></td>
                    <td id="a_si_value22" style="color: rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>

                  <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;" >A (Transition State Theory)</td>
                    <td id="a_value23" style="color:rgb(202, 12, 48);font-weight: 700;"></td>
                    <td id="a_si_value24" style="color:rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>
            </table>
        </div>
        <script type="text/javascript">
        function compute(){
	        var B7=205*Math.pow(10,-12)*100;
	        var B8=293*Math.pow(10,3)*0.2389029576;
	        var B9=document.getElementById('temperature2').value; //value of temperature enter by user
	        var B10=1.38*Math.pow(10,-16);
	        var D7=6.0223*Math.pow(10,23);
	        var D8=30.01;
            var D10=6.63E-27;

	        var answer2=(Math.pow(B7,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B9*B10*D7*((1/D8)+(1/D8))))*Math.exp(-B8/(1.987*B9)));
	        var final_k2=answer2.toExponential(2);
	        var k_value2=document.getElementById('k_value2').innerHTML=final_k2;
	        var temp2=document.getElementById('temp2').innerHTML=B9;
	        var k_si_value2=answer2*(1000/Math.pow(100,3));
	        var k_second=k_si_value2.toExponential(2);
	        var k_si_value2_text=document.getElementById('k_si_value2').innerHTML=k_second;
	        var answer3=(Math.pow(B7,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B9*B10*D7*((1/D8)+(1/D8)))));
	        var final_answer3=answer3.toExponential(2);
	        document.getElementById('a_value2').innerHTML=final_answer3;
             document.getElementById('a_value21').innerHTML=final_answer3;
              document.getElementById('a_value23').innerHTML=final_answer3;
            document.getElementById('a_value_input').value=final_answer3;
	        var answer3_si=answer3*(1000/Math.pow(100,3));
	        var final_answer3_si=answer3_si.toExponential(2);
            var B14=answer2;
	        document.getElementById('a_si_value2').innerHTML=final_answer3_si;
            var As=1.987*(Math.log((B14*D10)/(B10*D7*B9*Math.exp(2)))+(B8/(1.987*B9)));
             document.getElementById('as').innerHTML=As;
              document.getElementById('as_value').value=As;
             document.getElementById('a_si_value22').innerHTML=final_answer3_si;
              document.getElementById('a_si_value24').innerHTML=final_answer3_si;

    	}
        </script>
		<?php
		}function third_reaction(){
		?>
		<input type="hidden" id="current" value="third_reaction">
        <a href="index.php?task=dataset3" style="color: black;">
         <div class="visual" style="margin-left: 20px;">
            <i class="fas fa-table" style="margin-right: 5px;"></i><span>View Table</span>
        </div>
        </a>
         <a href="index.php?task=graph" style="color: black;">
         <div class="visual">
           <i class="fas fa-chart-line" style="margin-right: 5px;"></i><span>View Graph</span>
        </div>
        </a>

		<div class="solver" id="solver">
            <p class="solver_title" id="solver_title">  Specific Rate Constant and Frequency Factor Solver</p><br>
            <div class="reaction_btn">
                <p id="label">Reaction : </p>
                <a href="index.php?task=solver">
	                <button id="first_reaction"  title="solve" >
	                2 HI <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> I<sub>2</sub>+H<sub>2</sub>
	                </button>
            	</a>
            	<a href="index.php?task=second_reaction">
	                <button id="second_reaction"  title="solve" >
	                2   NO <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> N<sub>2</sub>+O<sub>2</sub>
	                </button>
           		 </a>
           		 <a href="index.php?task=third_reaction">
                <button id="third_reaction"  title="solve" >
                CO+O<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> 𝐂𝐎<sub>2</sub>+O
                </button>
            	</a>
                 <a href="index.php?task=fourth_reaction">
                <button id="fourth_reaction"  title="solve" >
               Br+H<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> HBr+H
                </button>
            </a>
            </div><!-- End of reaction_btn -->
            <div class='temp_wrap3 animated scaleIn' id="temp_wrap3"  >
               
                    <label style="font-weight: 700;" id="label3">Temperature:</label>
                    <input type="text" id="temperature3" placeholder="enter temperature" value="2650" onkeyup="compute();"> 
                    <input type="hidden" id="a_value_input2" name="a_value_input2">
                    <input type="hidden" id="as_value3" name="as_value_input2">
                    
            </div>
			<div id="third_reaction_table"  class="animated scaleIn">
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray;border:none;" class="animated fadeInRightBig" >
                <tr style="background: rgb(30, 136, 229);">
                    <th colspan="4" style="border-top: none;color:white;">Collision Theory</th>
                </tr>
                <tr>
                    <td id='given_title'>&sigma; (CO)</td>
                    <td>3.00E-08 </td>
                     <td>N</td>
                     <td>6.0223E+23</td>
                </tr>

                 <tr>
                    <td id='given_title'>&sigma; (O2)</td>
                    <td>3.50E-08 </td>
                     <td>M(CO)</td>
                     <td>28.0004</td>
                </tr>
                 <tr >
                    <td id='given_title'>E(Calories)</td>
                    <td>4.83E+04</td>
                    <td>M(O2)</td>
                     <td>31.99988</td>
                </tr>
                <tr >
                    <td id='given_title'>k</td>
                    <td>1.38E-16</td>
                    <td id='given_title' style="font-weight:400; ">h</td>
                    <td  style="font-weight:400; ">6.63E-27</td>
                </tr>
                 <tr >
                    <td id='given_title' style="font-weight: 700;color:black;">T(K)</td>
                    <td id="temp3" >$$  $$</td>
                    <td id='given_title' style="font-weight:700;color:black; ">ΔS#</td>
                    <td id='as_value3_2' style="font-weight:700;color:black; "></td>
                </tr>
            </table>
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray;border:none;" class="animated fadeInUpBig" >
                <tr style="background: rgb(173, 153, 86);">
                    <th></th>
                    <th  id='given_title' style="color:white;"> CGS Unit(cm<sup>3</sup>/gmol s</th>
                    <th  id='given_title' style="color:white;"> SI Unit(m<sup>3</sup>kgmols)</th>
                </tr>
                 <tr>
                    <td id='given_title' style="color: rgb(28, 129, 217);font-weight: 700;">k</td>
                   <td id="k_value3"></td>
                    <td id="k_si_value3"></td>
                </tr> 
                 <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;" >A (collision)</td>
                    <td id="a_value3"></td>
                     <td id="a_si_value3"></td>
                </tr>
                <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;" >A (Arrhenius)</td>
                    <td id="a_value25" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                     <td id="a_si_value26" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>
                <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;" >A (Transiton State Theory)</td>
                    <td id="a_value27" style="color: rgb(202, 12, 48);font-weight: 700;"></td>
                     <td id="a_si_value28" style="color: rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>
            </table>
        	</div>
         </div> <!--End of Third Reaction-->
         <script type="text/javascript">
       function compute(){
	        var B7=300*Math.pow(10,-12)*100;
	        var B8=350*Math.pow(10,-12)*100;
	        var B10=document.getElementById('temperature3').value; //value of temperature enter by user
	        var B9=50935.32774;
	        var B11=1.38*Math.pow(10,-16);  
	        var D7=6.0223*Math.pow(10,23);
	        var D8=28.0004
	        var D9=31.99988;
	        var B7_B8=(B7+B8)/2;
	        var answer3=(Math.pow(B7_B8,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B10*B11*D7*((1/D8)+(1/D9))))*Math.exp(-B9/(1.987*B10)))
	        var final_k3=answer3.toExponential(2);
	        var k_value3=document.getElementById('k_value3').innerHTML=final_k3;
	        var temp3=document.getElementById('temp3').innerHTML=B10;
	        var k_si_value3=answer3*(1000/Math.pow(100,3));
	        var k_third=k_si_value3.toExponential(2);
	        var k_si_value3_text=document.getElementById('k_si_value3').innerHTML=k_third;
	        var answer3_a=(Math.pow(B7_B8,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B10*B11*D7*((1/D8)+(1/D9)))));
	        var final_answer3_a=answer3_a.toExponential(2);
	         document.getElementById('a_value3').innerHTML=final_answer3_a;
	         var answer3_si=answer3_a*(1000/Math.pow(100,3));
	        var final_answer3_si=answer3_si.toExponential(2);
	        document.getElementById('a_si_value3').innerHTML=final_answer3_si;
             document.getElementById('a_value_input2').value=final_answer3_a
              var B15=answer3;
              var D11=6.63E-27;
             var As=1.987*(Math.log((B15*D11)/(B11*D7*B10*Math.exp(2)))+(B9/(1.987*B10)));
             document.getElementById('as_value3').value=As;
              document.getElementById('as_value3_2').innerHTML=As;
               document.getElementById('a_value25').innerHTML=final_answer3_a;
                document.getElementById('a_value27').innerHTML=final_answer3_a;
                 document.getElementById('a_si_value26').innerHTML=final_answer3_si;
                document.getElementById('a_si_value28').innerHTML=final_answer3_si;
            /*
            var As=1.987*(LN(($B$15*$D$11)/($B$11*$D$7*$B$10*EXP(2)))+($B$9/(1.987*$B$10)));
             document.getElementById('as').innerHTML=As;
              document.getElementById('as_value3').value=As;
             document.getElementById('a_si_value22').innerHTML=answer3_si;
              document.getElementById('a_si_value24').innerHTML=answer3_si;*/
    }
         </script>
	<?php
	}function graph(){
	?>
     <a href='index.php?task=third_reaction' style="color: black;">
        <div class="visual" >
         <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
        </div>
        </a>
        <p style="text-align: center;">CO+O<sub>2</sub> &rarr; CO<sub>2</sub>+O</p>
      <div id="chartContainer" style="width: 60%; height: 60%;margin: 0 auto;"></div>
    <script src="jquery-3.3.1.min.js"></script>
    
	<script>
      $(document).ready(function () {


        var dps1 = [], dps2 = [], dps3 = [];
        var chart = new CanvasJS.Chart("chartContainer", {            
        title: {

        },
            animationEnabled: true,
            toolTip: {    
            enabled: false
            },
        data: [
            {
                showInLegend: true,
                type: "line",
                lineColor:"#18FFFF",
                markerType: "square",
                markerColor: "#18FFFF",
                markerSize: 7,
                title: "axisY Title",
                legendText:"Arrhenius Law",  
                dataPoints: dps1
            },{
                type: "line",
                lineColor:"#B71C1C",
                markerType: "circle",
                markerColor: "#B71C1C",
                markerSize:7,
                legendText:"Collision Theory", 
                showInLegend: true, 
                dataPoints: dps2
            },{
                type: "line",
                lineColor:"#5C6BC0",
                markerType: "triangle",
                markerColor: "#5C6BC0",
                markerSize:7,
                legendText:"Transition State Theory",  
                showInLegend: true,
                dataPoints: dps3
            }
        ],
        axisY:{
            title: "ln k",
        },
        axisX:{
            title: "1/T",
        },
        });       
        $.when(
            $.getJSON("data.php", function(result){         
                for(var i = 0; i < result.length; i++) {
                dps1.push({ x: result[i].x, y: result[i].y1 });
                dps2.push({ x: result[i].x, y: result[i].y2 });    
                dps3.push({ x: result[i].x, y: result[i].y3 });         
            }
        })
        ).then(function() {
            chart.render();
            
        }); 
        });
        
	</script>
        
	<?php	
	}function dataset(){

		$db=mysqli_connect('localhost','root','','bodino_demo');
		if (!$db) {
			echo "unable to connect to database";
		}
		$query=mysqli_query($db,'SELECT * FROM reaction1');
	?> 
        <div style='width: 100%;background: ;height:60px;'>
            <a href='index.php?task=solver' style="color: black;">
            <div class="visual" style="margin-left: 20px;">
             <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
            </div>
            </a>
        </div>
		<table id="dataset">
            <p style="text-align: center;font-size: 20px;">2 HI &rarr; I<sub>2</sub>+H<sub>2</sub></p>
			<tr id='dataset_title' style="background: #BA68C8;">
                <th colspan="4" >Arrhenius Law</th>
            </tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
               
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row = mysqli_fetch_array($query)){
                    
        	?>
        		<tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo $row['temp1']; ?></td>
                   <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row["k_value1"]) ; ?></td>
                   <td style="background: #FFCCBC;color:black;"><?php echo $row['temp_com1']; ?></td>
                    
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row["lnk_value1"]; ?></td>
                </tr>
         
            <?php
        		}
        		}
        	?>
        	   </table>

        	   <?php 
        	   $db=mysqli_connect('localhost','root','','bodino_demo');
        	   	$query=mysqli_query($db,'SELECT * FROM reaction1');
        	   ?>

        	   <table id="dataset" >
			<tr id='dataset_title' style="background: #26C6DA;"><th colspan="4">Collision Theory</th></tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
        	?>
        		<tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp2"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k_value2"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com2"]; ?></td>
                    <td style="background:#B3E5FC;color:black;"><?php echo  $row2["lnk_value2"]; ?></td>
                </tr>
         
            <?php
        		}
        		}
        	?>
        	   </table>

        	   <?php 
        	   $db=mysqli_connect('localhost','root','','bodino_demo');
        	   	$query=mysqli_query($db,'SELECT * FROM reaction1');
        	   ?>

        	   <table id="dataset" >
			<tr id='dataset_title' style="background: #66BB6A;border: none;"><th colspan="4">Transition State Theory</th></tr>
                <tr style="background: ">
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
        	?>
        		<tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k_value3"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row2["lnk_value3"]; ?></td>
                </tr>
         
            <?php
        		}
        		}
        	?>
        	   </table>

	<?php
	}function graph2(){
    ?>
     <a href='index.php?task=second_reaction' style="color: black;">
        <div class="visual" >
         <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
        </div>
        </a>
  
        <p style="text-align: center;">2 NO &rarr; N<sub>2</sub>+O<sub>2</sub></p>
      <div id="chartContainer" style="width: 60%; height: 60%;margin: 0 auto;"></div>
    <script src="jquery-3.3.1.min.js"></script>
    
    <script>
      $(document).ready(function () {


        var dps1 = [], dps2 = [], dps3 = [];
        var chart = new CanvasJS.Chart("chartContainer", {            
        title: {

        },
            animationEnabled: true,
            toolTip: {    
            enabled: false
            },
        data: [
            {
                showInLegend: true,
                type: "line",
                lineColor:"#18FFFF",
                markerType: "square",
                markerColor: "#18FFFF",
                markerSize: 7,
                title: "axisY Title",
                legendText:"Arrhenius Law",  
                dataPoints: dps1
            },{
                type: "line",
                lineColor:"#B71C1C",
                markerType: "circle",
                markerColor: "#B71C1C",
                markerSize:7,
                legendText:"Collision Theory", 
                showInLegend: true, 
                dataPoints: dps2
            },{
                type: "line",
                lineColor:"#5C6BC0",
                markerType: "triangle",
                markerColor: "#5C6BC0",
                markerSize:7,
                legendText:"Transition State Theory",  
                showInLegend: true,
                dataPoints: dps3
            }
        ],
        axisY:{
            title: "ln k",
        },
        axisX:{
            title: "1/T",
        },
        });       
        $.when(
            $.getJSON("data2.php", function(result){         
                for(var i = 0; i < result.length; i++) {
                dps1.push({ x: result[i].x, y: result[i].y1 });
                dps2.push({ x: result[i].x, y: result[i].y2 });    
                dps3.push({ x: result[i].x, y: result[i].y3 });         
            }
        })
        ).then(function() {
            chart.render();
            
        }); 
        });

   

        
    </script>
    <?php  
    }function graph_reaction1(){
    ?>   
          <a href='index.php?task=solver' style="color: black;">
        <div class="visual" >
         <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
        </div>
        </a>
        <p style="text-align: center;font-size: 20px;">2 HI &rarr; I<sub>2</sub>+H<sub>2</sub></p>
      <div id="chartContainer" style="width: 60%; height: 60%;margin: 0 auto;"></div>
    <script src="jquery-3.3.1.min.js"></script>
    
    <script>
      $(document).ready(function () {


        var dps1 = [], dps2 = [], dps3 = [];
        var chart = new CanvasJS.Chart("chartContainer", {            
        title: {

        },
            animationEnabled: true,
            toolTip: {    
            enabled: false
            },
        data: [
            {
                showInLegend: true,
                type: "line",
                lineColor:"#18FFFF",
                markerType: "square",
                markerColor: "#18FFFF",
                markerSize: 7,
                title: "axisY Title",
                legendText:"Arrhenius Law",  
                dataPoints: dps1
            },{
                type: "line",
                lineColor:"#B71C1C",
                markerType: "circle",
                markerColor: "#B71C1C",
                markerSize:7,
                legendText:"Collision Theory", 
                showInLegend: true, 
                dataPoints: dps2
            },{
                type: "line",
                lineColor:"#5C6BC0",
                markerType: "triangle",
                markerColor: "#5C6BC0",
                markerSize:7,
                legendText:"Transition State Theory",  
                showInLegend: true,
                dataPoints: dps3
            }
        ],
        axisY:{
            title: "ln k",
        },
        axisX:{
            title: "1/T",
        },
        });       
        $.when(
            $.getJSON("data3.php", function(result){         
                for(var i = 0; i < result.length; i++) {
                dps1.push({ x: result[i].x, y: result[i].y1 });
                dps2.push({ x: result[i].x, y: result[i].y2 });    
                dps3.push({ x: result[i].x, y: result[i].y3 });         
            }
        })
        ).then(function() {
            chart.render();
            
        }); 
        });

   

        
    </script>

     



    <?php
    }function dataset2(){

        $db=mysqli_connect('localhost','root','','bodino_demo');
        if (!$db) {
            echo "unable to connect to database";
        }
        $query=mysqli_query($db,'SELECT * FROM reaction2');
    ?> 
        <div style='width: 100%;background: ;height:60px;'>
            <a href='index.php?task=second_reaction' style="color: black;">
            <div class="visual" style="margin-left: 20px;">
             <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
            </div>
            </a>
        </div>
        <table id="dataset">
            <p style="text-align: center;">2 NO &rarr; N<sub>2</sub>+O<sub>2</sub></p>
            <tr id='dataset_title' style="background: #BA68C8;">
                <th colspan="4" >Arrhenius Law</th>
            </tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
               
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row = mysqli_fetch_array($query)){
                    
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo $row['temp']; ?></td>
                   <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row["k_value"]) ; ?></td>
                   <td style="background: #FFCCBC;color:black;"><?php echo $row['temp_com']; ?></td>
                    
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row["lnk_value"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

               <?php 
               $db=mysqli_connect('localhost','root','','bodino_demo');
                $query=mysqli_query($db,'SELECT * FROM reaction2');
               ?>

               <table id="dataset" >
            <tr id='dataset_title' style="background: #26C6DA;"><th colspan="4">Collision Theory</th></tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp2"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k_value2"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com2"]; ?></td>
                    <td style="background:#B3E5FC;color:black;"><?php echo  $row2["lnk_value2"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

               <?php 
               $db=mysqli_connect('localhost','root','','bodino_demo');
                $query=mysqli_query($db,'SELECT * FROM reaction2');
               ?>

               <table id="dataset" >
            <tr id='dataset_title' style="background: #66BB6A;border: none;"><th colspan="4">Transition State Theory</th></tr>
                <tr style="background: ">
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k_value3"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row2["lnk_value3"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>
               <?php
           }function dataset3(){

        $db=mysqli_connect('localhost','root','','bodino_demo');
        if (!$db) {
            echo "unable to connect to database";
        }
        $query=mysqli_query($db,'SELECT * FROM reaction4');
    ?> 
        <div style='width: 100%;background: ;height:60px;'>
            <a href='index.php?task=third_reaction' style="color: black;">
            <div class="visual" style="margin-left: 20px;">
             <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
            </div>
            </a>
        </div>
        <table id="dataset">
                    <p style="text-align: center;">CO+O<sub>2</sub> &rarr; CO<sub>2</sub>+O</p>
         
            <tr id='dataset_title' style="background: #BA68C8;">
                <th colspan="4" >Arrhenius Law</th>
            </tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
               
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row = mysqli_fetch_array($query)){
                    
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo $row['temp1']; ?></td>
                   <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row["k1"]) ; ?></td>
                   <td style="background: #FFCCBC;color:black;"><?php echo $row['temp_com1']; ?></td>
                    
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row["lnk_value1"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

               <?php 
               $db=mysqli_connect('localhost','root','','bodino_demo');
                $query=mysqli_query($db,'SELECT * FROM reaction3');
               ?>

               <table id="dataset" >
            <tr id='dataset_title' style="background: #26C6DA;"><th colspan="4">Collision Theory</th></tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp2"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k2"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com2"]; ?></td>
                    <td style="background:#B3E5FC;color:black;"><?php echo  $row2["lnk_value2"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

               <?php 
               $db=mysqli_connect('localhost','root','','bodino_demo');
                $query=mysqli_query($db,'SELECT * FROM reaction3');
               ?>

               <table id="dataset" >
            <tr id='dataset_title' style="background: #66BB6A;border: none;"><th colspan="4">Transition State Theory</th></tr>
                <tr style="background: ">
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k3"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row2["lnk_value3"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

    <?php
    }function fourth_reaction(){     
        ?>
        <input type="hidden" id="current" value="fourth_reaction">
         <!--Displaying Solver and Table-->
         <a href="index.php?task=dataset4" style="color: black;">
         <div class="visual" style="margin-left: 20px;">
            <i class="fas fa-table" style="margin-right: 5px;"></i><span>View Table</span>
        </div>
        </a>
         <a href="index.php?task=graph4" style="color: black;">
         <div class="visual">
           <i class="fas fa-chart-line" style="margin-right: 5px;"></i><span>View Graph</span>
        </div>
        </a>

        <div class="solver" id="solver" style="margin-top: 30px;">
            <p class="solver_title" id="solver_title">  Specific Rate Constant and Frequency Factor Solver</p><br>
            <div class="reaction_btn">
                <p id="label">Reaction : </p>
                <a href="index.php?task=solver">
                    <button id="first_reaction"  title="solve" >
                    2 HI <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> I<sub>2</sub>+H<sub>2</sub>
                    </button>
                </a>
                <a href="index.php?task=second_reaction">
                    <button id="second_reaction"  title="solve" >
                    2   NO <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> N<sub>2</sub>+O<sub>2</sub>
                    </button>
                 </a>
                <a href="index.php?task=third_reaction">
                <button id="third_reaction"  title="solve" >
                CO+O<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> 𝐂𝐎<sub>2</sub>+O
                </button>
            </a>


            <a href="index.php?task=fourth_reaction">
                <button id="fourth_reaction"  title="solve" >
               Br+H<sub>2</sub> <i class="fas fa-long-arrow-alt-right" style="font-size: 14px;display: inline;"></i> HBr+H
                </button>
            </a>
            </div><!-- End of reaction_btn -->

            <div class='temp_wrap animated scaleIn' id='temp_wrap' >
              
            <label style="font-weight: 700;" id="label1">Temperature:</label>
            <input type="text" id="temperature" placeholder="enter temperature" value="400" onkeyup="compute();"> 
            <input type="hidden" name="B16" id="B16">
            <input type="hidden" name="delta_value" id="delta_value">
            
        </div>
        <div id="first_reaction_table" >
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray;" class="animated fadeInRightBig">
                <tr>
                    <th colspan="4" style="background: rgb(30, 136, 229);color:white;">Collision Theory</th>
                </tr>
                <tr>

                    <td id='given_title'> &sigma; (cm)</td>
                    <td>8.74E-09</td>
                    <td>N</td>
                    <td>6.0223E+23</td>
                </tr>
                 <tr >
                    <td id='given_title'>E (cal)</td>
                    <td>1.82E+04</td>
                     <td>M</td>
                    <td>2.01588</td>
                </tr>
                <tr>
                    <td id='given_title'>k (erg/K mol)</td>
                    <td>1.38E-16 </td>
                    <td>M</td>
                    <td>79.904</td>
                </tr>
                <tr >
                    <td>h</td>
                     <td colspan="3">6.63E-27</td>
                </tr>
                 <tr >
                    <td id='given_title' style="font-weight: 700;color:black;">T(K)</td>
                    <td id="temp"></td>
                    <td id='given_title' style="font-weight: 700;color:black;">&Delta;S#</td>
                    <td id="delta" style="font-weight: 700;color:black;"></td>
                </tr>
            </table>
            <table style="float: left;width: 96%;margin-bottom: 20px;box-shadow: 5px 5px 25px gray" class="animated fadeInUpBig">
                <tr style="background: rgb(173, 153, 86);">
                    <th></th>
                    <th id='given_title' style="color:white;font-weight: 400;">CGS Unit(cm<sup>3</sup>/gmol s)</th>
                    <th id='given_title' style="color:white;font-weight: 400;">SI Unit(m<sup>3</sup>/kgmol s)</th>
                </tr>
                <tr>
                    <td id='given_title' style="color: rgb(28, 129, 217);font-weight: 700;">k</td>
                    <td id="k_value"></td>
                    <td id="k_si_value"></td>
                </tr> 
                 <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;">A (collision)</td>
                    <td id="a_value" ></td>
                    <td id="a_si_value"></td>
                </tr>

                <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;">A (Arrhenius)</td>
                    <td id="react_a1" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                    <td id="react_si_1" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>

                <tr>
                    <td id='given_title' style=" color: rgb(202, 12, 48);font-weight: 700;">A (Transition State Theory)</td>
                    <td id="react_a2" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                    <td id="react_si_2" style=" color: rgb(202, 12, 48);font-weight: 700;"></td>
                </tr>
            </table>
        </div>
        <script type="text/javascript">
        function compute(){
            
            //formula for A
            
            var B8_4=8.74E-09;
            var B10_4=document.getElementById('temperature').value; //value of temperature enter by user
            var B11=1.38E-16;
            var D8=6.0223E+23;
            var D10=79.904;
            var D9=2.01588;
            var B9=1.82E+04;
              var answer_k=(Math.pow(B8_4,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B10_4*B11*D8*((1/D10)+(1/D9))))*Math.exp(-B9/(1.987*B10_4)))
               var final_k=answer_k.toExponential(2);
               document.getElementById('k_value').innerHTML=final_k;
               var answer_a=(Math.pow(B8_4,2)*6.0223*Math.pow(10,23)*(Math.sqrt(8*3.141592654*B10_4*B11*D8*((1/D10)+(1/D9)))));
                var final_a=answer_a.toExponential(3);
                document.getElementById('a_value').innerHTML=final_a;
                document.getElementById('react_a1').innerHTML=final_a;
                 document.getElementById('react_a2').innerHTML=final_a;
                 var k_si=final_k*(1000/Math.pow(100,3));
                 var final_k_si=k_si.toExponential(2);
                  document.getElementById('k_si_value').innerHTML=final_k_si;
                  var a_si=final_a*(1000/Math.pow(100,3));
                  var final_a_si=a_si.toExponential(2);
                   document.getElementById('a_si_value').innerHTML=final_a_si;
                    document.getElementById('react_si_1').innerHTML=final_a_si;
                     document.getElementById('react_si_2').innerHTML=final_a_si;
                     var B16=answer_k;
                     //var D12=6.63E-27;
                     var D12=6.63*Math.pow(10,-34)*1000*Math.pow(100,2);
                     var sa=1.987*(Math.log((B16*D12)/(B11*D8*B10_4*Math.exp(2)))+(B9/(1.987*B10_4)));
                    //1.987*(LN(($B$16*$D$12)/($B$11*$D$8*$B$10*EXP(2)))+($B$9/(1.987*$B$10)))
                     document.getElementById('delta').innerHTML=sa;
        }  
        </script>

        <?php
        }function dataset4(){

        $db=mysqli_connect('localhost','root','','bodino_demo');
        if (!$db) {
            echo "unable to connect to database";
        }
        $query=mysqli_query($db,'SELECT * FROM reaction4');
    ?> 
        <div style='width: 100%;background: ;height:60px;'>
            <a href='index.php?task=fourth_reaction' style="color: black;">
            <div class="visual" style="margin-left: 20px;">
             <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
            </div>
            </a>
        </div>
        <table id="dataset">

                    <p style="text-align: center;">Br+H<sub>2</sub> &rarr; HBr+H</p>
         
            <tr id='dataset_title' style="background: #BA68C8;">
                <th colspan="4" >Arrhenius Law</th>
            </tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
               
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row = mysqli_fetch_array($query)){
                    
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo $row['temp1']; ?></td>
                   <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row["k_value1"]) ; ?></td>
                   <td style="background: #FFCCBC;color:black;"><?php echo $row['temp_com1']; ?></td>
                    
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row["lnk_value1"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

               <?php 
               $db=mysqli_connect('localhost','root','','bodino_demo');
                $query=mysqli_query($db,'SELECT * FROM reaction4');
               ?>

               <table id="dataset" >
            <tr id='dataset_title' style="background: #26C6DA;"><th colspan="4">Collision Theory</th></tr>
                <tr>
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp2"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k_value2"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com2"]; ?></td>
                    <td style="background:#B3E5FC;color:black;"><?php echo  $row2["lnk_value2"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

               <?php 
               $db=mysqli_connect('localhost','root','','bodino_demo');
                $query=mysqli_query($db,'SELECT * FROM reaction4');
               ?>

               <table id="dataset" >
            <tr id='dataset_title' style="background: #66BB6A;border: none;"><th colspan="4">Transition State Theory</th></tr>
                <tr style="background: ">
                    <th style="background:#FF8A65;">T</th>
                    <th style="background: #4FC3F7;">k</th>
                    <th style="background: #81C784;">1/T</th>
                    <th style="background: #2196F3;">ln k</th>
                </tr>
                <?php
            if(mysqli_num_rows($query) > 0){ // if one or more rows are returned do following
                while($row2 = mysqli_fetch_array($query)){
            ?>
                <tr >

                    <td style="background: #FFCCBC;color:black;"><?php echo  $row2["temp3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo sprintf('%.2E',$row2["k_value3"]) ; ?></td>
                    <td style="background:#FFCCBC;color:black;"><?php echo  $row2["temp_com3"]; ?></td>
                    <td style="background: #B3E5FC;color:black;"><?php echo  $row2["lnk_value3"]; ?></td>
                </tr>
         
            <?php
                }
                }
            ?>
               </table>

    <?php
    }function graph4(){
    ?>   
          <a href='index.php?task=fourth_reaction' style="color: black;">
        <div class="visual" >
         <i class="fas fa-angle-double-left" style="margin-right: 5px;"></i><span>Back to Solver</span>
        </div>
        </a>
        <p style="text-align: center;">Br+H<sub>2</sub> &rarr; HBr+H</p>
      <div id="chartContainer" style="width: 60%; height: 60%;margin: 0 auto;"></div>
    <script src="jquery-3.3.1.min.js"></script>
    
    <script>
      $(document).ready(function () {


        var dps1 = [], dps2 = [], dps3 = [];
        var chart = new CanvasJS.Chart("chartContainer", {            
        title: {

        },
            animationEnabled: true,
            toolTip: {    
            enabled: false
            },
        data: [
            {
                showInLegend: true,
                type: "line",
                lineColor:"#18FFFF",
                markerType: "square",
                markerColor: "#18FFFF",
                markerSize: 7,
                title: "axisY Title",
                legendText:"Arrhenius Law",  
                dataPoints: dps1
            },{
                type: "line",
                lineColor:"#B71C1C",
                markerType: "circle",
                markerColor: "#B71C1C",
                markerSize:7,
                legendText:"Collision Theory", 
                showInLegend: true, 
                dataPoints: dps2
            },{
                type: "line",
                lineColor:"#5C6BC0",
                markerType: "triangle",
                markerColor: "#5C6BC0",
                markerSize:7,
                legendText:"Transition State Theory",  
                showInLegend: true,
                dataPoints: dps3
            }
        ],
        axisY:{
            title: "ln k",
        },
        axisX:{
            title: "1/T",
        },
        });       
        $.when(
            $.getJSON("data4.php", function(result){         
                for(var i = 0; i < result.length; i++) {
                dps1.push({ x: result[i].x, y: result[i].y1 });
                dps2.push({ x: result[i].x, y: result[i].y2 });    
                dps3.push({ x: result[i].x, y: result[i].y3 });         
            }
        })
        ).then(function() {
            chart.render();
            
        }); 
        });

   

        
    </script>

     



    <?php
    }