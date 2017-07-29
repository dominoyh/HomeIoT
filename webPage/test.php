<?php
  $conn = mysqli_connect("127.0.0.1", "root", "nav30227.", "HomeIoT");

  $sql = "SELECT * FROM devices";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_row($result)){
     print_r($row);
     echo '<br>';
  }

  mysqli_close($conn);
?>
