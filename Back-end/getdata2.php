<?php
    //connect and select the database

$servername = "localhost";  
$username = "root";         
$password="";  
$database1 = "alma18int";
$conn = new mysqli($servername, $username, $password, $database1);

if($conn->connect_error){
    die("COnnection failed ".$conn->connect_error);
}

$values = array();
$sql = "SELECT * FROM csvTable";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($OPEN, $HIGH,$LOW, $CLOSE);

while($stmt->fetch()){
    $temp = [
    'OPEN'=>$OPEN,
    'HIGH'=>$HIGH,
    'LOW'=>$LOW,
    'CLOSE'=>$CLOSE
    ];

    array_push($values, $temp);
}

echo json_encode($values);
?>