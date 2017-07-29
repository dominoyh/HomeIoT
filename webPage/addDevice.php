<?php  #  DATE_ADD(now(),interval 9 hour) -> now()
  $conn = mysqli_connect("127.0.0.1", "root", "nav30227.", "HomeIoT");

  $sql="insert into devices (description,fieldName1,fieldName2,fieldName3,time) values ("
  $state=0;

  if ($_GET["description"]) {
    $description="'".$_GET["description"]."'";
    $state=1;
    $sql=$sql.$description;
  }
  if ($_GET["fieldName1"]) {
    $fieldName1="'".$_GET["fieldName1"]."'";
    if ($state) {
      $sql=$sql.",".$fieldName1;
      $state=1;
    }else {
      $sql=$sql.$fieldName1;
    }
  }
  if ($_GET["fieldName2"]) {
    $fieldName2="'".$_GET["fieldName2"]."'";
    if ($state) {
      $sql=$sql.",".$fieldName2;
      $state=1;
    }else {
      $sql=$sql.$fieldName2;
    }
  }
  if ($_GET["fieldName3"]) {
    $fieldName3="'".$_GET["fieldName3"]."'";
    if ($state) {
      $sql=$sql.",".$fieldName3;
      $state=1;
    }else {
      $sql=$sql.$fieldName3;
    }
  }

  $sql=$sql."DATE_ADD(now(),interval 9 hour))"

  # $sql="insert into devices (description,time,fieldName1,fieldName2,fieldName3) values ($description,DATE_ADD(now(),interval 9 hour),$fieldName1,$fieldName2,$fieldName3)";
  $result = mysqli_query($conn, $sql);
  echo $sql;

  mysqli_close($conn);
  # http://192.168.0.15/addDevice.php?description=test4&fieldName1=temp
?>
