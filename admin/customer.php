<?php

include("header.php");?>

<div class="wrap">
	<h2><font color="#31343E"><span style="font-size: 20pt">M��teri Y�netimi</span></font></h2>
	<p><?$customer=mysql_num_rows(mysql_query("select id from musteri"));?><strong><?=$customer;?></strong> adet m��teri bulunmaktad�r.</p>
	<h3><a href="customer-add.php">Yeni M��teri Ekle &raquo;</a></h3>
	<table class="widefat">
		<thead>
			<tr>
	    		<th scope="col" style="text-align: center">ID</th>
	    		<th scope="col">M��teri ad�</th>
	    		<th scope="col">Mail adresi</th>
				<th scope="col">Telefon</th>
				<th scope="col">�ehir</th>
				<th scope="col">�l�e</th>
				<th scope="col">T.C Numaras�</th>
				<th scope="col" colspan="2" style="text-align: center">��lem</th>
	  		</tr>
	  	</thead>
	  	<tbody id="the-list">
			<?
			$q=mysql_query("Select * from musteri order by ad ");
			while ($r=mysql_fetch_array($q)) {
			?>
	  		<tr id="page-<? echo $r[id];?>" class="alternate">
	    		<th scope="row" style="text-align: center"><? echo $r[id];?></th>
	    		<td><A href="hosting.php?k=<? echo $r[id];?>"><? echo $r[ad];?></a></td>
	    		<td><? echo $r[kullaniciadi];?></td>
	    		<td><? echo $r[tel]; ?></td>
	    		<td><? echo $r[sehir];?></td>
	    		<td><? echo $r[ilce];?></td>
	    		<td><? echo $r[tc];?></td>
	    		<td><a href="customer-edit.php?id=<? echo $r[id];?>" class='edit'>D�zenle</a></td>
	    		<td><a href="customer-del.php?id=<? echo $r[id];?>" class='delete'>Sil</a></td>
	  		</tr>
			<?}?>
		</tbody>
	</table>
	<div id="ajax-response"></div>
	<h3><a href="customer-add.php">Yeni M��teri Ekle &raquo;</a></h3>
</div>
<?include("footer.php");?>&nbsp;
