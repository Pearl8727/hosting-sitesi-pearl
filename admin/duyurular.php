<? include "header.php"; ?>
<div class="wrap"><h2><font color="#31343E"><span style="font-size: 20pt">Duyurular</span></font></h2>
<br />
<strong><a href=?tip=ekle>Yeni Duyuru</a>
|
<a href=?tip=liste>Duyurular</a>
</strong>
<br /><br />
<?
if (!$tip) $tip="liste";
extract($_GET);
extract($_POST);
if ($sil)
{
    mysql_query("DELETE FROM duyurular WHERE id='$sil'");
}
if ($ozelgonder)
{
    $yermi=mysql_fetch_assoc(mysql_query("SELECT * FROM duyurular WHERE kulno='$ozelgonder' AND baslik='$baslik'"));
    if (!$yermi[id])
    {
          $isims=$kullanici->bilgileri($ozelgonder,"isim");
          mysql_query("INSERT INTO duyurular SET id=null,
                                              kulno  ='$ozelgonder',
                                              baslik ='$isims : $baslik',
                                              duyuru ='$yazi'");
          echo "Yeni duyuru kullanýcýya eklendi...<br /><br />";
    }
    else
    {
        echo "<li>Bu baþlýkta duyuru var.<br><br>$geri";
    }
}
if ($gonder)
{
    $yermi=mysql_fetch_assoc(mysql_query("SELECT * FROM duyurular WHERE baslik='$baslik'"));
    if (!$yermi[id])
    {
          mysql_query("INSERT INTO duyurular SET id=null,
                                              baslik='$baslik',
                                              duyuru='$yazi'");
          echo "Yeni duyuru eklendi...";
    }
    else
    {
        echo "<li>Bu baþlýkta duyuru var.<br><br>$geri";
    }
}
if ($tip=="ekle")
{
    ?>
    <form action="?tip=liste" method=post>
        Baþlýk :<br />
        <input type=text name=baslik size=40 />
        <br /><br />
        Duyuru :<br />
        <textarea name=yazi rows=13 cols=50></textarea>
        <br /><font size=1>HTML serbesttir.
        </font>
        <br />    
        <br />
        <input type="submit" name="gonder" value="Duyuru Ekle" />
    </form>
    <?
}
if ($tip=="liste")
{
     $sayim=mysql_num_rows(mysql_query("SELECT * FROM duyurular"));
      if (!$s) $s=0;
      $topla=mysql_query("SELECT * FROM duyurular");
      while ($cek=mysql_fetch_assoc($topla))
      {
          echo "<a onClick=myToggle('$cek[id]');><u><strong>$cek[baslik]</strong></u></a> 
              - <a href=?tip=$tip&sil=$cek[id]\">sil</a>
                <div style=\"margin-left:10px; display:none;\" name=$cek[id] id=$cek[id]>$cek[duyuru]</div><br />";
      }
}
if ($ozel)
{
    echo "<h2>".$kullanici->bilgileri($ozel,"isim")."  için özel duyuru...</h2>";
?>
    <form action="duyurular.php?tip=liste" method=post>
        Baþlýk :<br /> <input type=text name=baslik size=40 /> <br /> <br />
        Duyuru :<br /> <textarea name=yazi rows=10 cols=90></textarea>  <br /> <font size=1> HTML serbesttir. </font>
        <br />  <br />
        <input type="submit" name="ozgonder" value="Özel Duyuru Ekle" />
    </form>
    <?
}
?>