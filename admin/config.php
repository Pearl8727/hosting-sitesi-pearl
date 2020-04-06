<?

$server 	= "localhost";
$username 	= "veritabani_kullanýcýAdi_buraya";
$dbname 	= "veritabani_adi_buraya";
$password 	= "sifre_buraya";

$title="Hosting Takip Sistemi v3.0 Sonal // Yönetim Paneli";
$charset="windows-1254";


    $sonip=getenv('REMOTE_ADDR');
    $simdi=date("H:i:s d-m-Y");
    $ssimdi=date("YmdHis");
    $geri="<a href=# onClick=history.go(-1);> <strong><< geri</strong></a>";

include "classes.php";

extract($_POST);
extract($_GET);
extract($_SERVER);


mysql_connect($server,$username,$password) or die ("Hata: dbname bilgilerinde sorun var!");
mysql_select_db($dbname) or die ("Hata: dbname baðlanamadý!");
mysql_query("set names latin5");
mysql_query("set CHARACTER SET latin5_turkish_ci");

$version	= 'v3.0';
?>
