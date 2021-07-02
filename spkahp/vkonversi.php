<?php
include "header.php";
?>

    <div class="container">
        <div class="card m-5">
            <div class="card-body">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link" href="vkapal.php">Data Alternatif Kapal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vkriteria.php">Data Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"href="vkonversi.php">Data Konversi Alternatif</a>
                </ul>
                <br>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                        <thead class="bg-success" align="center">
                            <tr style="color: white"> 
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Harga Sewa</th>
                                <th>Kapasitas Jumlah Orang</th>
                                <th>Fasilitas Khusus</th>
                                <th>Kenyamanan Kapal</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                            $id = 0;
                            $sql="SELECT * FROM konversi";
                            $result=mysqli_query($konek,$sql);
                            while($row=mysqli_fetch_assoc($result)){
                                $id++;
                                

                                echo "
                                        <tr align='center'>
                                            <td>".$id."</td>
                                            <td>".$row['nama']."</td>
                                            <td>".$row['hargasewa']."</td>
                                            <td>".$row['kapasitas']."</td>
                                            <td>".$row['fasilitas']."</td>
                                            <td>".$row['kenyamanan']."</td>
                                            <td><a href=\"emobil.php?id=".$row['idK']."\" class='btn btn-primary'>Edit</a></td>
                                            <td><a href=\"mdelete.php?id=".$row['idK']."\" class='btn btn-danger' onclick='return checkDelete()'>Hapus</a></td>
                                        </tr>   
                                    "; 
                                }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "footer.html";
?>