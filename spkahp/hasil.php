<?php
include "header.php";
?>

<div class="container">
    <div class="card m-5">
      <div class="card-body">
        <ul class="nav nav-tabs nav-justified">
          <li class="nav-item">
            <a class="nav-link" href="proses.php">Proses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="hasil.php">Perankingan</a>
          </li>
        </ul>
        <br>
        <div class="panel panel-info">
          <div class="panel-body">
            <table width="100%" class="table table-bordered table-hover table-responsive table-sm table-list tablesorter" id="dtBasicExample">
                <thead class="bg-success" align="center">
                    <tr style="color: white">
                        <th class="th-sm" style="background-color: red">RANKING</th>
                        <th class="th-sm" style="background-color: magenta">ID Kapal</th>
                        <th class="th-sm" style="background-color: blue">Total</th>
                        <th class="th-sm">ID Alternatif</th>
                        <th class="th-sm">Nama Kapal</th>
                        <th class="th-sm">Harga Sewa</th>
                        <th class="th-sm">Kapasitas Jumlah Orang</th>
                        <th class="th-sm">Fasilitas Khusus</th>
                        <th class="th-sm">Kenyamanan Kapal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql="SELECT SUM(hargasewa), SUM(kapasitas), SUM(fasilitas), SUM(kenyamanan) FROM konversi";
                    $result=mysqli_query($konek,$sql); //row melihat dari sql 
                    while($row=mysqli_fetch_array($result)){
                        $minHargaSewa  =$row[0];
                        $maxKapasitas  =$row[1];
                        $maxFasilitas  =$row[2];
                        $maxKenyamanan =$row[3];
                    }


                    $sql="SELECT * FROM konversi, bobot"; 
                    //ORDER BY tahun DESC, peminat DESC,  kondisi DESC, harga DESC, pemilik DESC, pajak DESC, transmisi DESC";
                    //ORDER BY peminat ASC, tahun ASC, kondisi ASC, harga ASC, pemilik ASC, pajak ASC, transmisi ASC";
                    $result=mysqli_query($konek,$sql); //row melihat dari sql 
                    $ranking=1;
                    while($row=mysqli_fetch_assoc($result)){
                        $bhargasewa   =$row['bhargasewa'];
                        $bkapasitas   =$row['bkapasitas'];
                        $bfasilitas   =$row['bfasilitas'];
                        $bkenyamanan  =$row['bkenyamanan'];

                        $idA         =$row['idA'];
                        $idK         =$row['idK'];
                        $nama        =$row['nama'];
                        $hHargaSewa  =$bhargasewa*($row['hargasewa']/$minHargaSewa);
                        $hKapasitas  =$bkapasitas*($row['kapasitas']/$maxKapasitas);
                        $hFasilitas  =$bfasilitas*($row['fasilitas']/$maxFasilitas);
                        $hKenyamanan =$bkenyamanan*($row['kenyamanan']/$maxKenyamanan);

                        $total=$hHargaSewa+$hKapasitas+$hFasilitas+$hKenyamanan;
                      
                        echo "
                                <tr> 
                                  <td align='center'>".$ranking++."</td>
                                  <td>".$idK."</td>
                                  <td align='center'>".round($total,3)."</td> 
                                  <td>".$idA."</td>
                                  <td>".$nama."</td>
                                  <td align='center'>".round($hHargaSewa,3)."</td>
                                  <td align='center'>".round($hKapasitas,3)."</td>
                                  <td align='center'>".round($hFasilitas,3)."</td>
                                  <td align='center'>".round($hKenyamanan,3)."</td>
                                </tr>  
                        ";        
                            
                    }
                    ?>
            </tbody>
            </table>
            <hr>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
include "footer.html";
?>