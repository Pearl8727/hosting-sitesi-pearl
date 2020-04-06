<?php
if (isset($_REQUEST["kullanici2"])) {
include("config.php");
$sql = ("select * from uye");
}
else {
header ("Location: login.php");
}
?>
<?
$id = $_GET['id'];
mysql_query("Delete  from bildirim where id = '$id'");
echo "<meta http-equiv=refresh content=0;URL=bildirim.php>";
?>