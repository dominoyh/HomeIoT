<?php
  $conn = mysqli_connect("localhost","root","nav30227.","HomeIoT");
  $description = $_GET["description"];
  $field1 = $_POST["field1"];
  $field2 = $_POST["field2"];
  $field3 = $_POST["field3"];

  //$sql="insert into devices (description,field1,field2,field3,time) values('$description','$field1','$field2','$field3',now());";
  //mysqli_query($conn, $spl);

  $sql="select * from devices";
  $result=mysqli_query($conn,$spl);
  echo $result;

  mysqli_close($conn);
?>
