<?php
# insert into $description (field1,field2,field3,time) values($field1,$field2,$field3,DATE_ADD(now(),interval 9 hour))
  $conn = mysqli_connect("127.0.0.1", "root", "nav30227.", "HomeIoT");

  $description=$_GET["description"];

  $sql1="insert into $description (";
  $sql2=",time) values(";
  $state=0;

  $field1=$_GET["field1"];
  $field2=$_GET["field2"];
  $field3=$_GET["field3"];

  if($_GET["field1"]){
    $sql1=$sql1."field1";
    $sql2=$sql2."$field1";
    $state=1;
  }
  if($_GET["field2"]){
    if ($state) {
      $sql1=$sql1.",field2";
      $sql2=$sql2.",$field2";
    }else {
      $sql1=$sql1."field2";
      $sql2=$sql2."$field2";
      $state=1;
    }
  }
  if($_GET["field3"]){
    if ($state) {
      $sql1=$sql1.",field3";
      $sql2=$sql2.",$field3";
    }else {
      $sql1=$sql1."field3";
      $sql2=$sql2."$field3";
      $state=1;
    }
  }



  $sql=$sql1.$sql2.",DATE_ADD(now(),interval 9 hour))";

  $result = mysqli_query($conn, $sql);
  echo $sql;

  mysqli_close($conn);
?>
