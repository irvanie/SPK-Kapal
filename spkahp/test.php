<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'coba');   
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.container{
			width:650px;
			margin: auto;
			border: 1px dotted #blue;
			padding: 10px;
			background: grey;
			color:#fff;
		}

		h2{
			text-align: center;
			text-decoration: underline;


		}

		table{
			background: DeepPink;
			margin:auto;

		}

		td{
			padding: 10px
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Form Pemesanan buku</h2>
		<table border="1">
			<tr>
				<th>No </th>
				<th>Judul buku</th>
				<th>harga</th>
				<th>jumlah</th>
			</tr>

			<tr>
				<th>1</th>
                <th>algoritma dan pemprograman</th>
                <th>
                <?php
                                $query = "select * from menu";
                                $hasil = mysqli_query($koneksi, $query);
                                $namaM = "var Nmenu= new Array();\n";
                                echo '<select id="idMenu" name="idMenu" class="form-control" onchange="changeValue(this.value)">';
                                echo '<option>Pilih Menu</option>';
                                while ($tabel = mysqli_fetch_array($hasil)){
                                    echo '<option value="'.$tabel['nama_menu'].'">'.$tabel['nama_menu'].'</option>';  
                                    $namaM .= "Nmenu['" . $tabel['nama_menu'] . "'] = {name:'" . addslashes($tabel['harga']) . "'};\n";     
                                }
                                echo '</select>';
                            ?>
                            </th>
                <th>@<input type="number" name="jumlah_algoritma" id="harga_algoritma" size="7" value="0" onchange="total()"></th>
                <script type="text/javascript">
                                <?php echo $namaM; ?>
                                function changeValue(id){
                                document.getElementById('harga_algoritma').value = Nmenu[id].name;
                                }
                            </script>
			</tr>

			<tr>
				<th>2</th>
				<th>algoritma dan pemprograman</th>
				<th>@<input type="text" name="harga" id="javascript" size="7" value="46000" readonly></th>
				<th>@<input type="number" name="jumlah_javascript" id="harga_javascript" size="7" value="0" onchange="total()"></th>
			</tr>

			<tr>
				<th>3</th>
				<th>PHP</th>
				<th>@<input type="text" name="harga" id="php" size="7" value="90000" readonly></th>
				<th>@<input type="number" name="jumlah_php" id="harga_php" size="7" value="0" onchange="total()"></th>
			</tr>

			<tr>
				
				<th colspan="3" style="text-align:right">jumlah total</th>
				<th>@<input type="text" name="total_jumlah" id="total" size="7" value="" readonly></th>
			</tr>
		</table>
		<br><br>
		<input type="button" onclick="window.print()" value="cetak">

		<script type="text/javascript">
		function total() {
		var valgoritma = parseInt(document.getElementById('harga_algoritma').value);
		var vjavascript = parseInt(document.getElementById('harga_javascript').value);
		var vphp = 90000 * parseInt(document.getElementById('harga_php').value);

		var jumlah_harga = valgoritma + vjavascript + vphp;

		document.getElementById('total').value = jumlah_harga;
		}
		
		</script>
	</div>
</body>
</html>