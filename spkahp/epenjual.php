<?php
include "header.php";
?>

<div class="container">
    <div class="bs-example">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <h1>Edit Data Penjual</h1>
            <hr>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                <?php 
                    $carikode = mysqli_query($konek, "select max(idP) from penjual");
                    $datakode = mysqli_fetch_array($carikode);
                    if ($datakode) {
                    $nilaikode = substr($datakode[0], 1);
                    $kode = (int) $nilaikode;
                    $kode = $kode + 1;
                    $hasilkode = "P".str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                    $hasilkode = "P001";
                    }
                ?>
                <?php
                    $tampil = "SELECT * FROM penjual where idP='".$_GET['id']."'";
                    $sql = mysqli_query ($konek,$tampil);
                    while($data = mysqli_fetch_assoc($sql)){
                        $idP                 =  $data['idP'];
                        $nama                =  $data['nama'];
                        $identitas           =  $data['identitas'];
                        $telp                =  $data['telp'];
                        $kelamin             =  $data['kelamin'];
                        $alamat              =  $data['alamat'];
                    }
                ?>
                
                    <label class="control-label col-xs-3">ID Penjual :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="idP" placeholder="ID Penjual" value="<?php echo $idP; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Nama :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $nama; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Nomor Identitas :</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="identitas" placeholder="KTP / SIM / PASSPORT" value="<?php echo $identitas; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">No. Telp :</label>
                    <div class="col-xs-9">
                        <input type="tel" class="form-control" name="telp" placeholder="Nomor Telepon / Handphone" value="<?php echo $telp; ?>" onkeypress="return hanyaAngka(event)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Jenis Kelamin :</label>
                    <div class="col-xs-2">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Laki-laki" <?php echo ($kelamin == 'Laki-laki')? "checked" : "" ;?>> Laki-laki
                        </label>
                    </div>
                    <div class="col-xs-2">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Perempuan" <?php echo ($kelamin == 'Perempuan')? "checked" : "" ;?>> Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Alamat :</label>
                    <div class="col-xs-9">
                        <textarea rows="3" class="form-control" name="alamat" placeholder="Masukan Alamat Lengkap"><?php echo $alamat; ?></textarea>
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
                            $eidP                 = $_POST['idP'];
                            $enama                = $_POST['nama'];
                            $eidentitas           = $_POST['identitas'];
                            $enotelp              = $_POST['telp'];
                            $ekelamin             = $_POST['gender'];
                            $ealamat              = $_POST['alamat'];
                            $query="UPDATE penjual SET nama='$enama', alamat='$ealamat', kelamin='$ekelamin', identitas='$eidentitas', telp='$enotelp' WHERE idP='$eidP'";
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
