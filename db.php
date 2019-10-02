<?php
$connect=mysqli_connect("localhost","root","") or die ("Unable to connect" . mysqli_error($connect));
$db=mysqli_select_db($connect,"searchdb") or die( "database error" . mysqli_error($connect));
?>