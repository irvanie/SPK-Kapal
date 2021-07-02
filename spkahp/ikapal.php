<?php
include "header.php";
?>

<div class="container">
    <div class="bs-example">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <h1>Input Data Kapal</h1>
            <hr>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                <?php 
                    $carikode = mysqli_query($konek, "select max(idK) from kapal");
                    $datakode = mysqli_fetch_array($carikode);
                    if ($datakode) {
                    $nilaikode = substr($datakode[0], 1);
                    $kode = (int) $nilaikode;
                    $kode = $kode + 1;
                    $hasilkode = "K".str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                    $hasilkode = "K001";
                    }
                ?>
                    <label class="control-label col-xs-3">ID Kapal :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="idK" placeholder="ID Kapal" value="<?php echo $hasilkode; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Nama Kapal :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kapal">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Tipe Mesin :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="tipemesin" placeholder="Tipe Mesin">
                    </div>
                    <div class="form-group">
                    <label class="control-label col-xs-3">Harga Sewa :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="hargasewa" placeholder="Harga Sewa">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Kapasitas Jumlah Orang :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas Jumlah Orang">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Fasilitas Khusus :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas Khusus">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Kenyamanan Kapal :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="kenyamanan" placeholder="Kenyamanan Kapal">
                    </div>
                </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <button type="submit" name="submit" class="btn btn-primary" onclick="return checkInput()">Simpan</button>
                        <input type="reset" class="btn btn-danger" value="Reset">
                    </div>
                    <?php		
                        if(isset($_POST['submit'])){
                            $idK                 = $_POST['idK'];
                            $nama                = $_POST['nama'];
                            $tipemesin           = $_POST['tipemesin'];
                            $hargasewa           = $_POST['hargasewa'];
                            $kapasitas           = $_POST['kapasitas'];
                            $fasilitas           = $_POST['fasilitas'];
                            $kenyamanan          = $_POST['kenyamanan'];

                            if ($hargasewa > 50000000) {
                                $hargasewaCon = 1;
                            }
                            else if ($hargasewa > 25000001 && $hargasewa < 40000000) {
                                $hargasewaCon = 2;
                            }
                            else if ($hargasewa > 20000001 && $hargasewa < 25000000) {
                                $hargasewaCon = 3;
                            }
                            else if ($hargasewa > 8500001 && $hargasewa < 20000000) {
                                $hargasewaCon = 4;
                            }
                            else if ($hargasewa > 6000001 && $hargasewa < 8500000) {
                                $hargasewaCon = 5;
                            }
                            else if ($hargasewa > 4500001 && $hargasewa < 6000000) {
                                $hargasewaCon = 6;
                            }
                            else if ($hargasewa < 4500000) {
                                $hargasewaCon = 7;
                            }

                            if ($kapasitas < 10) {
                                $kapasitasCon = 1;
                            }
                            else if ($kapasitas > 10 && $kapasitas < 20) {
                                $kapasitasCon = 2;
                            }
                            else if ($kapasitas > 20 && $kapasitas < 40) {
                                $kapasitasCon = 3;
                            }
                            else if ($kapasitas > 40 && $kapasitas < 60) {
                                $kapasitasCon = 4;
                            }
                            else if ($kapasitas > 60 && $kapasitas < 100) {
                                $kapasitasCon = 5;
                            }
                            else if ($kapasitas > 100 && $kapasitas < 150) {
                                $kapasitasCon = 6;
                            }
                            else if ($kapasitas > 150) {
                                $kapasitasCon = 7;
                            }

                            if ($fasilitas == "Tidak Memancing") {
                                $fasilitasCon = 1;
                            }
                            else if ($fasilitas == "Memancing") {
                                $fasilitasCon = 2;
                            }

                            if ($kenyamanan == "Sangat Tidak Nyaman") {
                                $kenyamananCon = 1;
                            }
                            else if ($kenyamanan == "Tidak Nyaman") {
                                $kenyamananCon = 2;
                            }
                            else if ($kenyamanan == "Cukup Nyaman") {
                                $kenyamananCon = 3;
                            }
                            else if ($kenyamanan == "Nyaman") {
                                $kenyamananCon = 4;
                            }
                            else if ($kenyamanan == "Sangat Nyaman") {
                                $kenyamananCon = 5;
                            }

                            $query="INSERT INTO kapal SET idK='$idK', nama='$nama', tipemesin='$tipemesin', hargasewa='$hargasewa', kapasitas='$kapasitas', fasilitas='$fasilitas', kenyamanan='$kenyamanan'";
                            $result=mysqli_query($konek, $query);
                            
                            $queryCon="INSERT INTO konversi SET idA='$idK', idK='$idK', nama='$nama', hargasewa='$hargasewaCon', kapasitas='$kapasitasCon', fasilitas='$fasilitasCon', kenyamanan='$kenyamananCon'";
                            $result2=mysqli_query($konek, $queryCon);

                             if($query){
                                if ($queryCon) {
                                   echo "<script>location='vkapal.php';</script>";
                                }
                            //     echo "<script>alert('Data Berhasil Ditambahkan');</script>";
                                 
                             }
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "footer.html"
?>
