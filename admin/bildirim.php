<?include("header.php");?>
<div class="wrap">
	<h2><font color="#31343E"><span style="font-size: 20pt">Ödeme Bildirimleri</span></font></h2>
	
	<h3>&nbsp;</h3>
	<table class="widefat">
		<thead>
			<tr>
	    		<th width="17" style="text-align: center" scope="col">ID</th>
    		  <th width="83" scope="col">Müþteri adý</th>
			    <th width="120" scope="col">Ödeyen Ad-Soyad</th>
    		  <th width="88" scope="col">Alan Adý</th>
			    <th width="35" scope="col">Ödeme Tarihi</th>
			    <th width="35" scope="col">Banka</th>
				  <th width="27" scope="col">Tutar</th>
				  <th width="27" scope="col">Not</th>
			    <th width="40" style="text-align: center" scope="col">Ýþlem</th>
  		  </tr>
	  	</thead>
	  	<tbody id="the-list">
			<?
			
			$q=mysql_query("Select * from bildirim order by customer ");
			while ($r=mysql_fetch_array($q)) {
			
			?>
	  		<tr id="page-<? echo $r[id];?>" class="alternate">
	    		<th scope="row" style="text-align: center"><? echo $r[id];?></th>
	    		<td><A href="customer-edit.php?id=<? echo $r[customer];?>"> <?  
                      $top=mysql_fetch_assoc(mysql_query("SELECT ad FROM musteri WHERE id=$r[customer]"));
                      echo $top[ad];
                       
              ?></a></td>
          		<td><? echo $r[paid];?></td>
	    		<td><? echo $r[webpage];?></td>
                <?php 
				$sorgulama = $r[package];
				$paket = mysql_query("SELECT * FROM package WHERE id='$sorgulama'");
                $yazdir = mysql_fetch_array($paket);
				?>
          		<td><? echo $r[status];?></td>
	    		
	    		<td><? echo $r[banka];?></td>
	    		<td><? echo $r[tutar];?></td>
	    		
	    		<td><? echo $r[info];?></td>
	    		
	    		<td><a href="bildirim-del.php?id=<? echo $r[id];?>" class='delete'>Sil</a></td>
	  		</tr>
			<?}?>
		</tbody>
	</table>
	<div id="ajax-response"></div>
	<h3>&nbsp;</h3>
</div>
<?include("footer.php");?>&nbsp;