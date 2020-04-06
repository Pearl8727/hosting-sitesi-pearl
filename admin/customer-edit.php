<?

include("header.php");

$ix = $_POST['ix'];
if($ix == "1"){
$name = guvenlik($_POST['name']);
$mail = guvenlik($_POST['mail']);
$city = guvenlik($_POST['city']);
$telephone = guvenlik($_POST['telephone']);
$ilce = guvenlik($_POST['ilce']);
$info = guvenlik($_POST['info']);
$adres = guvenlik($_POST['adres']);
$tc = guvenlik($_POST['tc']);
$id = $_GET['id'];
if (($name == "" OR $mail == "") OR $city == "" ) { ?>
<script>alert("Lütfen tüm boþluklarý doldurunuz!");
window.location = "customer.php"
</script>
<? }else{ 
mysql_query("update musteri set  ad= '$name',kullaniciadi ='$kadi',sehir ='$city',mustip='$mustip',tel ='$telephone',
                                 hakkimda ='$info',ilce ='$ilce',adres ='$adres',tc ='$tc' where id = '$id'");
echo "<meta http-equiv=refresh content=0;URL=customer.php>";}
}else{
$id = $_GET['id'];
$q=mysql_query("select * from musteri where id='$id'");
$r=mysql_fetch_array($q);
?>

<div class="wrap">
	<h2><font color="#31343E"><span style="font-size: 20pt">Müþteri Yönetimi</span></font></h2>
	<p><?$customer=mysql_num_rows(mysql_query("select id from musteri"));?><strong><?=$customer;?></strong> adet müþteri bulunmaktadýr.</p>
	<div id="ajax-response"></div>
	<FORM action="customer-edit.php?id=<? echo $_GET['id'];?>" method="post"?><INPUT type=hidden value=1 name=ix> 
		<table class="editform" width="100%" cellspacing="2" cellpadding="5">
			<tr>
				<th width="33%" scope="row" valign="top"><label for="name">Müþteri 
				Adý Soyadý:</label></th>
				<td width="67%"><input name="name" id="name" type="text" value="<? echo $r[ad];?>" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="mail">Eposta:</label></th>
				<td><input name="kadi" id="kadi" type="text" value="<? echo $r[kullaniciadi];?>" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top">Eposta (tekrar):</th>
				<td><input name="mail" id="mail" type="text" value="<? echo $r[email];?>" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="telephone">Telefon:</label></th>
				<td><input name="telephone" id="telephone" type="text" value="<? echo $r[tel];?>" size="40" /></td>
			</tr>
				<tr>
				<th scope="row" valign="top">Müþteri Tipi:</th>
			<td>
			
				<input name="mustip" id="mustip" type="radio" 
        
        <? if($r[mustip]=="k") echo "checked"; ?>     value=k /> <label for="mustip">Kurumsal</label>   
        
        <input name="mustip" id="mustip2" type="radio"   <? if($r[mustip]=="b") echo "checked"; ?>
        value=b /> <label for="mustip2">Bireysel</label>
        
        </td>
			</tr><tr>
				<th scope="row" valign="top"><label for="city">Þehir:</label></th>
				<td>
		  			<input name='city' value="<? echo $r[sehir]?>"> 
		  		</td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="ilce">Ýlçe:</label></th>
				<td>
				<input name="ilce" id="ilce" type="text" value="<? echo $r[ilce];?>" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="adres">Adres:</label></th>
				<td>
				<textarea name="adres" id="adres" rows="5" cols="50" style="width: 97%;"><? echo $r[adres];?></textarea></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="tc">TC Numarasý:</label></th>
				<td>
				<input name="tc" id="tc" type="text" value="<? echo $r[tc];?>" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="info">Hakkýnda: (isteðe 
				baðlý)</label></th>
				<td><textarea name="info" id="info" rows="5" cols="50" style="width: 97%;"><? echo $r[hakkimda];?></textarea></td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="submit" value="Müþteri Düzenle &raquo;" /></p>
	</form>
</div>
<?include("footer.php");?>
<?}?>&nbsp;
