<?
$ix = $_POST['ix'];
if($ix == "1"){

include "config.php";

$name = guvenlik($_POST['name']);
$mustip = guvenlik($_POST['mustip']);
$mail = guvenlik($_POST['mail']);
$city = guvenlik($_POST['city']);
$ilce = guvenlik($_POST['ilce']);
$adres = guvenlik($_POST['adres']);
$info = guvenlik($_POST['info']);
$tc = guvenlik($_POST['tc']);
$telephone = guvenlik($_POST['telephone']);
$id = $_GET['id'];
if (($name == "" OR $mail == "") OR $city == "" ) { ?>
<script>alert("Lütfen tüm boþluklarý doldurunuz!");
window.location = "customer-add.php"
</script>
<? }else{ 
    
    mysql_query("INSERT INTO musteri SET ad='$name' ,email='$mail' ,mustip='$mustip',sehir='$city' , 
                                         kullaniciadi='$kul',sifre='$sif', tel='$telephone' ,hakkimda='$info' ,
                                         ilce='$ilce' ,adres='$adres' ,tc='$tc'");

      echo "<meta http-equiv=refresh content=0;URL=customer.php>";
      
} }else{ ?>
<?include("header.php");?>
<div class="wrap">
	<h2><font color="#31343E"><span style="font-size: 20pt">Yeni Müþteri Kaydý</span></font></h2>
	<p><?$customer=mysql_num_rows(mysql_query("select id from musteri"));?><strong><?=$customer;?></strong> adet müþteri bulunmaktadýr.</p>
	<div id="ajax-response"></div>
	<form method="post" action="customer-add.php"><INPUT type=hidden value=1 name=ix> 
		<table class="editform" width="100%" cellspacing="2" cellpadding="5">
			<tr>
				<th width="33%" scope="row" valign="top"><label for="name">Müþteri 
				Adý Soyadý:</label></th>
				<td width="67%"><input name="name" id="name" type="text" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top">Eposta:</th>
				<td><input name="kul" id="kul" type="text" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top">Eposta (tekrar):</th>
				<td><input name="mail" id="mail" type="text" size="40" /></td>
			</tr>
			
			<tr>
				<th scope="row" valign="top">Þifre:</th>
				<td><input name="sif" id="sif" type="text" size="40" /></td>
			</tr>
			
			<tr>
				<th scope="row" valign="top"><label for="telephone">Telefon:</label></th>
				<td><input name="telephone" id="telephone" type="text" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top">Müþteri Tipi:</th>
			<td>
				<input name="mustip" id="mustip" type="radio" value=k /> <label for="mustip">Kurumsal</label>   
        <input name="mustip" id="mustip2" type="radio" value=b /> <label for="mustip2">Bireysel</label>
        
        </td>
			</tr>	<tr>
				<th scope="row" valign="top"><label for="city">Þehir:</label></th>
				<td><input type=text name='city' id='city' ></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="ilce">Ýlçe:</label></th>
			<td>
				<input name="ilce" id="ilce" type="text" size="20" /></td>
			</tr>
		
			<tr>
				<th scope="row" valign="top">Adres:</th>
				<td>
				<textarea name="adres" id="adres" rows="5" cols="50" style="width: 97%;"></textarea></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="tc">T.C 
				Numarasý:</label></th>
				<td>
				<input name="tc" id="tc" type="text" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="info">Hakkýnda: (isteðe baðlý)</label></th>
				<td><textarea name="info" id="info" rows="5" cols="50" style="width: 97%;"></textarea></td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="submit" value="Müþteri Ekle &raquo;" /></p>
	</form>
</div>
<?include("footer.php");?>
<?}?>&nbsp;
