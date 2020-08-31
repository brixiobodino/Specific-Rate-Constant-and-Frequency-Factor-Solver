<?php

header('Content-Type: application/json');

$con = mysqli_connect("127.0.0.1","root","","bodino_demo");

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "SELECT * FROM reaction1");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("x" => $row['temp_com1'] , "y1" => $row['lnk_value1'], "y2" => $row['lnk_value2'], "y3" => $row['lnk_value3']);
       
        array_push($data_points, $point);        
    }

    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
    
}
mysqli_close($con);

?>