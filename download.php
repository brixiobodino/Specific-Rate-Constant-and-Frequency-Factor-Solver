<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "nelvie");
$output = '';

        $query = "SELECT * FROM arrhenius";
    
 $result = mysqli_query($connect,$query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
     <tr>  
        <th>Id</th>  
        <th>Full Name</th>  
        <th>Address</th>  
        <th>Contact</th>  
        <th>Age</th>  
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>                
        <td>'.$row["temp_com"].'</td> 
        <td>'.$row[""].'</td>  
        <td>'.$row["address"].'</td>  
        <td>'.$row["contact_number"].'</td>  
        <td>'.$row["k_value"].'</td>  
    </tr>
   ';
  }
  
 }
 $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
?>
