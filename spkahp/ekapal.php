<?php
include "header.php";
?>

<div class="container">
    <div class="bs-example">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <h1>Edit Data Kapal</h1>
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
                <?php
                    $tampil = "SELECT * FROM kapal where idK='".$_GET['id']."'";
                    $sql = mysqli_query ($konek,$tampil);
                    while($data = mysqli_fetch_assoc($sql)){
                        $idK                 =  $data['idK'];
                        $nama                =  $data['nama'];
                        $tipemesin           =  $data['tipemesin'];
                        $hargasewa           =  $data['hargasewa'];
                        $kapasitas           =  $data['kapasitas'];
                        $fasilitas           =  $data['fasilitas'];
                        $kenyamanan           =  $data['kenyamanan'];
                    }
                ?>
                
                    <label class="control-label col-xs-3">ID Kapal :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="idK" placeholder="ID Penjual" value="<?php echo $idK; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Nama Kapal:</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $nama; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Tipe Mesin :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="tipemesin" placeholder="Tipe Mesin" value="<?php echo $tipemesin; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Harga Sewa :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="hargasewa" placeholder="Harga Sewa" value="<?php echo $hargasewa; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Kapasitas Jumlah Orang :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="kapasitas" placeholder="Kapasitas Jumlah Orang" value="<?php echo $kapasitas; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Fasilitas Khusus :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas Khusus" value="<?php echo $fasilitas; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Kenyamanan Kapal :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="kenyamanan" placeholder="Kenyamanan Kapal" value="<?php echo $kenyamanan; ?>">
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
                            $eidK                 = $_POST['idK'];
                            $enama                = $_POST['nama'];
                            $etipemesin           = $_POST['tipemesin'];
                           
                            $query="UPDATE kapal SET nama='$enama', tipemesin='$etipemesin' WHERE idK='$eidK'";
                            $result=mysqli_query($konek, $query);


                             if($query){
                            //     echo "<script>alert('Data Berhasil Ditambahkan');</script>";
                                 echo "<script>location='vpenjual.php';</script>";
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
