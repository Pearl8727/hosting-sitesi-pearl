<?  
/* Kullanıcılar hakkında dğrudan bilgi almak için kullanılan class  */

function guvenlik($q) {
$q = str_replace("`","",$q);
$q = str_replace("&","",$q);
$q = str_replace("%","",$q);
$q = str_replace("'","",$q);
$q = str_replace("<","",$q);
$q = str_replace(">","",$q);
$q = str_replace("?","",$q);
$q=trim($q);
return $q;
}

function bilgileri($id,$neyi=null) 
{
    if ($neyi)
    {
        $bilgim=mysql_fetch_row(mysql_query("SELECT ".$neyi." FROM musteri WHERE id='$id'"));
        return $bilgim[0];
    }
    else
    { 
        return mysql_fetch_assoc(mysql_query("SELECT * FROM musteri WHERE id='$id'"));
    }
} 


class kullanici 
{ 
    function bilgileri($id,$neyi=null) 
    {
        if ($neyi)
        {
            $bilgim=mysql_fetch_row(mysql_query("SELECT ".$neyi." FROM kulbil WHERE id='$id'"));
            return $bilgim[0];
        }
        else
        { 
            return mysql_fetch_assoc(mysql_query("SELECT * FROM kulbil WHERE id='$id'"));
        }
    }      
    function kredi_bakiye($id) 
    {
        $bilgim=mysql_fetch_row(mysql_query("SELECT bakiye FROM kredi_bakiye WHERE kulno='$id'"));
        if (!$bilgim[0]) $bilgim[0]="0";
        return $bilgim[0];
    }      
    function odenecek($id) 
    {
        $toplami=mysql_fetch_row(mysql_query("SELECT SUM(yayinci_kazanci) FROM tiklar 
                                                          WHERE yayincino='$id' "));
        return $toplami[0];
    }      
    function kredi_ekle($id,$miktar) 
    {
        global $simdi;
        global $ssimdi;
        global $sonip;
        // Son 30 saniye içinde bakiye kısmına kayıt yapıldıysa kayda engel olunacak
        // uyarı verilecek ki çok fazla miktar ard arda eklenemesin
            $topla = mysql_query(" SELECT * FROM kredi_bakiye WHERE kulno='$id' order BY id desc limit 0,1");
            $sayim = mysql_num_rows($topla);
            $veri  = mysql_fetch_assoc($topla);
            
            //echo time()-$veri[ssontarih];
            //exit;
            
            if ((time()-$veri[ssontarih]) < 30)
            {
            
                echo "Sistem güvenliği nedeniyle bir kullanıcıya 30 sn ara ile kredi ekleyebilirsiniz."; 
                echo "<script>
                         setTimeout(alert('Son 30 sn içinde bu kullanıcıya kredi yüklemişsiniz. Daha sonra tekrar deneyin.'),1146662250);
                         window.location='".myURL."/rkmedyagroup/?yon=kredi_ekle';
                      </script>";
                exit;
            }
            else
            {
                // Kredi_bakiye satırı varsa UPDATE yoksa INSERT edilecek                 
                if (!$sayim) 
                {
                      mysql_query("INSERT INTO kredi_bakiye 
                                           SET kulno      ='$id',
                                               sontarih   ='$simdi',
                                               ssontarih  ='".time()."',
                                               bakiye     ='$miktar'");
                }
                else {        
                      $bakiye=$this->kredi_bakiye($id) + $miktar;
                      mysql_query("UPDATE kredi_bakiye SET  sontarih  ='$simdi',
                                                            ssontarih ='".time()."',
                                                            bakiye    ='$bakiye'
                                                     WHERE  kulno='$id' ");
                }
                // Kredinin tarih, miktar, gönderen ip bilgileri kayıt ediliyor.
                //
                 mysql_query("INSERT INTO krediler_kayitlar SET 
                                     kulno  ='$id',
                                     tarih  ='$simdi',
                                     starih ='".time()."',
                                     miktar ='$miktar',
                                     ip     ='$sonip'");
            }
    }      
} 
?>
