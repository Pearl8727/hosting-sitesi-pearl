<?
  include("header.php");
if($_POST[submit]){
    $admin = guvenlik($_POST['admin']);
    $mail  = guvenlik($_POST['mail']);
    $passe  = guvenlik($_POST['passe']);
    $pass  = guvenlik($_POST['pass']);
    $pass2 = guvenlik($_POST['pass2']);
    
    if ($admin=="" OR $mail=="" OR $passe<>$kulbil[pass]) 
    {     ?>
          <script>alert("L�tfen isim ve eposta k�s�mlar�n� doldurunuz ! �ifrenizi kontrol ediniz.");
          window.location = "admin-edit.php"
          </script>
          <? 
          exit; 
    }
    else {
    
          if ($pass)
          {       
              if ($pass==$pass2)
              {
                  $passe=$pass;
              } 
              else
              {
                  ?>
                  <script>alert("Yeni �ifreniz tekrar� ile uyu�mamaktad�r, l�tfen kontrol ediniz.");
                  window.location = "admin-edit.php"
                  </script>
                  <?  
                  exit; 
              }
          }
          
          mysql_query("UPDATE adminler set  admin='$admin',email ='$mail',pass ='$passe' WHERE oturum='$OturumBilgi'");
          echo "<meta http-equiv=refresh content=0;URL=admin-edit.php?m=1>";
    }
}
else  {
?>
<div class="wrap">
	<h2><font color="#31343E"><span style="font-size: 20pt">Y�netici Bilgileri</span></font></h2>
	<div id="ajax-response"><? if ($_GET[m]) echo "<b>Bilgileriniz g�ncellenmi�tir."; ?></div>
	<FORM action="admin-edit.php" method="post"?><INPUT type=hidden value=1 name=ix> 
		<table class="editform" width="100%" cellspacing="2" cellpadding="5" border=0>
			<tr>
				<th width="33%" scope="row" valign="top"><label for="name">Kullan�c� Ad�:</label></th>
				<td width="67%"><input name="admin" id="name" type="text" value="<? echo $kulbil[admin];?>" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="mail">E-Mail adresi:</label></th>
				<td><input name="mail" id="mail" type="text" value="<? echo $kulbil[email];?>" size="40" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="telephone1">Eski �ifre :</label></th>
				<td><input name="passe" id="telephone1" type="password"  size="20" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top">
            <br> <br>
        </th>
        <td> <br><label for="telephone">�ifrenizi de�i�tirmeyecekseniz a�a��daki k�s�mlar� bo� b�rak�n�z...</label></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="telephone2">Yeni �ifre :</label></th>
				<td><input name="pass" id="telephone2" type="password"  size="20" /></td>
			</tr>
			<tr>
				<th scope="row" valign="top"><label for="telephone3">Yeni �ifre Tekrar :</label></th>
				<td><input name="pass2" id="telephone3" type="password"  size="20" /></td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="submit" value="Y�netici Bilgilerini D�zenle &raquo;" /></p>
	</form>
</div>
<?include("footer.php");?>
<?}?>&nbsp;
