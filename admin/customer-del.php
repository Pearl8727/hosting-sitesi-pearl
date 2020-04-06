<?php
if (isset($_REQUEST["kullanici2"])) {
include("config.php");
$sql = ("select * from musteri");
}
else {
header ("Location: login.php");
}
?>
<?
$id = $_GET['id'];
mysql_query("Delete  from musteri where id = '$id'");
echo "<meta http-equiv=refresh content=0;URL=customer.php>";
?>
