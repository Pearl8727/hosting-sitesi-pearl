<? include "header.php"; ?><div class="wrap">
<h2><font color="#31343E"><span style="font-size: 20pt">Destek Talepleri</span></font></h2>
<br /><br />

<?

  #######################################
  # KAPATMA 
  if ($kapat)
  {
      mysql_query("UPDATE destek SET kapali='1' WHERE id='$kapat'");
      
      echo "Destek talebi kapatýldý.";
   
      exit;
  }
  
if (!$tip) $tip="liste";
if ($sil)  {  mysql_query("DELETE FROM destek WHERE id='$sil'");  }

if ($gonder)
{
    $starih=time();
    mysql_query("INSERT INTO destek SET ustid   ='$cevapust',
                                        baslik  ='$baslik',
                                        tarih   ='$simdi',
                                        starih  ='$starih',
                                        yazi    ='$cevap'");
    
    /*
    $topla=mysql_fetch_assoc(mysql_query("SELECT * FROM musteri WHERE id=(SELECT kulno FROM destek WHERE id=$cevapust)"));                                        
    
    $baslik = "Destek";
    $mesaj  = "Merhaba <strong>$topla[isim]</strong>;
              <br /><br />
              Hosting Destek kanallarýný kullanarak yaptýðýnýz talep cevaplandýrýlmýþtýr.  
              <br /><br />
              Bol kazançlar dileriz.
              <br /></br>
              <strong></strong>";
    $headers .= "From:  no-reply <no-reply@no-reply.com>\r\n";
    $headers .= "Reply-To: no-reply@no-reply.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    @mail($topla[email],$baslik,$mesaj,$headers);
     */
    echo "Cevap eklendi...";
}


if ($tip=="ekle")
{
    ?>
    <form action="destek.php" method=post>
        Baþlýk :<br />
        <input type=text name=baslik size=40 /><br /><br />
        Yazý :<br />
        <textarea name=yazi rows=13 cols=50></textarea>
        <br /><font size=1>HTML serbesttir.</font><br /><br />
        Yer : ( varsa )<br />
        <input type="text" name="yer" /><br />
        <font size=1>( hesap sayfalarý için adres satýrýndaki hes deðiþkeni buraya yazýlýrsa o 
        sayfaya özel destek konusu olduðu belirtilir.)
        </font><br /><br />
        <input type="submit" name="gonder" value="destek Konusu Ekle" />
    </form>
    <?
}

if ($tip=="liste")
{
    $sayim=mysql_num_rows(mysql_query("SELECT * FROM destek"));
    if (!$s) $s=0;
    $topla=mysql_query("SELECT * FROM destek WHERE ustid='0' ORDER BY id DESC LIMIT $s,15");
    while ($cek=mysql_fetch_assoc($topla))
    {
            echo "<table border=0 style=\"border:1px solid #d0d0d0; margin-bottom:2px;\" width=100%><tr style=cursor:pointer;
                    onClick=myToggle('$cek[id]'); bgcolor=#f0f0f0><td>
                  <u><strong>$cek[baslik]</strong></u></a></td><td align=right> $cek[tarih] -  <b>
                  <a href=\"destek.php?sil=$cek[id]\">sil</a>&nbsp; </td></tr></table>
                  <div style=\"margin-left:0px; display:none;\" name=$cek[id] id=$cek[id]>
                  <div style=\"border:1px solid #d0d0d0; background-color:#f0f0f0; padding:8px;\"  >$cek[yazi]
                  
                  <div align=right><br /><b>".bilgileri($cek[kulno],"ad")."</b></div></div>";
    
            $alttopla=mysql_query("SELECT * FROM destek WHERE ustid='$cek[id]' ORDER BY id ASC");
            while ($ck=mysql_fetch_assoc($alttopla))
            {
                echo "<div style=\"margin-left:10px; margin-top:2px; border:1px solid #d0d0d0; background-color:";
                if ($ck[kulno]=="0") echo "#FFFFBF;"; else  echo "#f0f0f0;";
                
                echo " padding:8px;\"  >
                      
                      <table border=0  width=100%><tr ><td> <strong>$ck[baslik]</strong> 
                      </td><td align=right> $ck[tarih] -  <a href=destek.php?sil=$ck[id]\"
                      ><b>sil</a></td></tr></table>$ck[yazi]";
                      
                if ($ck[kulno]=="0") echo "<div align=right><br /><b>Yetkili</b></div>";
                else                 echo "<div align=right><br /><b>".bilgileri($cek[kulno],"ad")."</b></div>";
                echo "</div>";
            }
            
            echo "<div align=right> <br /></div></b>";
               
            if ($cek[kapali]=="0")
            {              
                echo "<div style=margin-left:10px; ><form action=\"?yon=$yon&cevapust=$cek[id]\" method=post style=display:inline;>
                      <br /><b>Baþlýk :</b><br /><input type=text name=baslik size=90  value=\"$cek[baslik]\"/><br />
                      <b>Cevap :</b> <br />


<textarea name=cevap rows=5 cols=70>Merhaba,<br><br>





<br><br>Diðer soru ve problemlerinize yardýmcý olmaktan mutluluk duyarýz.<br><br>

Saygýlarýmýzla...</textarea>


                      <br><input type=submit name=gonder /></form><br /></div></div>";
            }
            else
            {
               echo "<center><b><h2>Talep kapatýlmýþ.</h2></b></center>"; 
                 echo "<div style=margin-left:10px; ><form action=\"?yon=$yon&cevapust=$cek[id]\" method=post style=display:inline;>
                      <br /><b>Baþlýk :</b><br /><input type=text name=baslik size=90 value=\"$cek[baslik]\" /><br />
                      <b>Cevap :</b> <br /><textarea name=cevap rows=5 cols=70></textarea>
                      <br><input type=submit name=gonder /></form><br /></div></div>";
            }
    }
    
    echo "<br /><div align=center><strong>";
    if ($s>15) 
    {
          echo "<a href=destek.php?s=".($s-15)."><< Geri </a> &nbsp;  &nbsp; ";
    }
    if (($sayim>15) & ($s<($sayim-15))) 
    {
          echo " <a href=destek.php?s=".($s+15).">Ýleri >></a> ";
    }
    echo "</div>";
}
?>