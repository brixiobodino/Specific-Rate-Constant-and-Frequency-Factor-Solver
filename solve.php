<?php
	

$con = mysqli_connect("127.0.0.1","root","","nelvie");
if (mysqli_connect_errno($con)){
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else{
	
        
      if (isset($_POST['submit2'])) {
        $result = mysqli_query($con, "SELECT * FROM reaction2");
	  			while($row = mysqli_fetch_array($result)){   
	  				$B9=293*pow(10,3)*0.2389029576;
					$D8=30.01; //ok
					$B7=2.5E-08; // ok
					$B16=1.38E-16;
					$B8=7.00E+04;//ok
					$B10=1.38E-16; //ok
					$D7=6.0223E+23;//ok
					$D10=6.63E-27;
	  				$D9=$_POST['as_value_input'];  
	  				$B15=$_POST['a_value_input'];    
	  				echo $B15;
      				$B27= $row['temp'];
			       	$F27= $row['temp2'];
			       	$J27= $row['temp3'];
			 		$answer=$B15*(EXP(-$B9/(1.987*$B27)));
			 		$log=log($answer);
			 		$answer2=$B15*EXP(-$B8/(1.987*$F27));
			 		$log2=log($answer2);
			 		$answer3=((($B10*$D7*$J27)/($D10))*EXP(2)*EXP($D9/1.987)*EXP(-$B8/(1.987*$J27)));
			 		$log3=log($answer3);
 		?>
        <table>
        	<tr>
        		<td style="color: green;"><?php echo $row['temp'];?></td>
        		<td style="color: blue;"><?php echo($answer);?></td>
        		<td style="color: red;"><?php echo log($answer) ?></td>
        </tr>
        </table>   
      	
        <?php	
        $sql="UPDATE reaction2 SET k_value='$answer', lnk_value='$log',k_value2='$answer2', lnk_value2='$log2',k_value3='$answer3', lnk_value3='$log3'  WHERE temp=$B27 ";
        	mysqli_query($con,$sql);
        	//header('location:index.php?task=second_reaction');
        }

    }

         if (isset($_POST['submit3'])) {
         	//$B17=$_POST['a_value_input2'];
         	//$B9=50935.32774;
         	//$b31
         	//$answer=$B17*(EXP(-$B9/(1.987*$B31)));
         	 $result = mysqli_query($con, "SELECT * FROM reaction3");
	  			while($row = mysqli_fetch_array($result)){   
	  				$B17=$_POST['a_value_input2'];
	  				echo $B17;
	  				$B16=$_POST['a_value_input2'];
         			$B9=50935.32774;
			 		$B31=$row['temp1'];
			 		$F31=$row['temp2'];
			 		$J31=$row['temp3'];
			 		$B11=1.38E-16;
			 		$D7=6.0223E+23;
			 		$D11=6.63E-27;
			 		$D10=$_POST['as_value_input2']; 
			 		$answer_react3=$B17*(EXP(-$B9/(1.987*$B31)));
			 		$log_react3=log($answer_react3);
			 		$answer2_react3	=$B16*EXP(-$B9/(1.987*$F31));
			 		$log2_react3=log($answer2_react3);
			 		$answer3_react3=((($B11*$D7*$J31)/($D11))*EXP(2)*EXP($D10/1.987)*EXP(-$B9/(1.987*$J31)));
			 		$log3_react3=log($answer3_react3);

			 		//=$B$17*(EXP(-$B$9/(1.987*B31)))
 		?>	
        <table>
        	<tr>
        		<td style="color: green;"><?php echo $row['temp1'];?></td>
        		<td style="color: blue;"><?php echo($answer_react3);?></td>
        		<td style="color: red;"><?php echo log($answer_react3) ?></td>
        </tr>
        </table>   
      	
        <?php
        	$sql="UPDATE reaction3 SET k1='$answer_react3',lnk_value1='$log_react3',k2='$answer2_react3',lnk_value2='$log2_react3',k3='$answer3_react3',lnk_value3='$log3_react3' WHERE temp1=$B31 ";
        	mysqli_query($con,$sql);
        	//header('location:index.php?task=third_reaction');
        }
         
        }



        if (isset($_POST['submit1'])) {
         	//$B17=$_POST['a_value_input2'];
         	//$B9=50935.32774;
         	//$b31
         	//$answer=$B17*(EXP(-$B9/(1.987*$B31)));
         	 $result = mysqli_query($con, "SELECT * FROM reaction1");
	  			while($row = mysqli_fetch_array($result)){   
	  				
	  				$B16=$_POST['B16'];
                    $B15=$B16;
         			$B8=4.40E+04;
                    $B30=$row['temp1'];
                    $J30=$row['temp1'];
                    $B10=1.38E-16;
                    $D7=6.0223E+23;
                    $D10=6.63E-27;
                    $D9=$_POST['delta_value'];
			 		//$log3_react3=log($answer3_react3);
                    $answer1_react1=$B16*(EXP(-$B8/(1.987*$B30)));
			 		//=$B$16*(EXP(-$B$8/(1.987*B30)))
                    $log1_react1=log($answer1_react1);
                    $answer3_react1=((($B10*$D7*$J30)/($D10))*EXP(2)*EXP($D9/1.987)*EXP(-$B8/(1.987*$J30)));
                    $log3_react1=log($answer3_react1);
 		?>	
        <table>
        	<tr>
        		<td style="color: green;"><?php echo $row['temp1'];?></td>
        		<td style="color: blue;"><?php echo($answer1_react1);?></td>
        		<td style="color: red;"><?php echo log($answer1_react1) ?></td>
        </tr>
        </table>   
      	
        <?php
        	$sql="UPDATE reaction1 SET k_value1='$answer1_react1',lnk_value1='$log1_react1',k_value2='$answer1_react1',lnk_value2='$log1_react1',k_value3='$answer3_react1',lnk_value3='$log3_react1' WHERE temp1=$B30 ";
          //  $sql="UPDATE reaction1 SET k_value1='$answer1_react1',lnk_value1='$log1_react1',k2='$answer2_react3',lnk_value2='$log2_react3',k3='$answer3_react3',lnk_value3='$log3_react3' WHERE temp1=$B31 ";
        	mysqli_query($con,$sql);
        	//header('location:index.php?task=third_reaction');
        }
         
        }
       
    

}

?>


