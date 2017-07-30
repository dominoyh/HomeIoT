<?php  #  DATE_ADD(now(),interval 9 hour) -> now()
  # $sql="insert into devices (description,time,fieldName1,fieldName2,fieldName3) values ($description,DATE_ADD(now(),interval 9 hour),$fieldName1,$fieldName2,$fieldName3)";
  $conn = mysqli_connect("127.0.0.1", "root", "nav30227.", "HomeIoT");

  $sql1="insert into devices (";
  $sql2=") values (";
  $state=0;

  if ($_GET["description"]) {
    $description="'".$_GET["description"]."'";
    $sql1=$sql1."description";
    $sql2=$sql2."$description";
    $state=1;
  }
  if ($_GET["fieldName1"]) {
    $fieldName1="'".$_GET["fieldName1"]."'";
    if ($state) {
      $sql1=$sql1.",fieldName1";
      $sql2=$sql2.",$fieldName1";
      $state=1;
    }else {
      $sql1=$sql1."fieldName1";
      $sql2=$sql2."$fieldName1";
      $state=1;
    }
  }
  if ($_GET["fieldName2"]) {
    $fieldName2="'".$_GET["fieldName2"]."'";
    if ($state) {
      $sql1=$sql1.",fieldName2";
      $sql2=$sql2.",$fieldName2";
      $state=1;
    }else {
      $sql1=$sql1."fieldName2";
      $sql2=$sql2."$fieldName2";
      $state=1;
    }
  }
  if ($_GET["fieldName3"]) {
    $fieldName3="'".$_GET["fieldName3"]."'";
    if ($state) {
      $sql1=$sql1.",fieldName3";
      $sql2=$sql2.",$fieldName3";
      $state=1;
    }else {
      $sql1=$sql1."fieldName3";
      $sql2=$sql2."$fieldName3";
      $state=1;
    }
  }

  if ($state) {
    $sql1=$sql1.",time";
    $sql2=$sql2.",DATE_ADD(now(),interval 9 hour))";
  }else {
    $sql1=$sql1."time";
    $sql2=$sql2."DATE_ADD(now(),interval 9 hour))";
  }

  $sql=$sql1.$sql2;

  $result = mysqli_query($conn, $sql);
  echo $sql;

  $sql="create table ".$_GET["description"]."(field1 int,field2 int,field3 int,time datetime)";
  $result = mysqli_query($conn, $sql);
  echo $sql;

  mysqli_close($conn);
  # http://192.168.0.15/addDevice.php?description=test4&fieldName1=temp
?>
