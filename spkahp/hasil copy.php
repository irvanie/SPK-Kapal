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
            <a class="nav-link active" href="hasil.php">Perangkingan</a>
          </li>
        </ul>
        <br>
        <div class="panel panel-info">
          <div class="panel-body">
            <table width="100%" class="table table-bordered table-hover table-responsive table-sm table-list tablesorter" id="dtBasicExample">
                <thead class="bg-success" align="center">
                    <tr style="color: white">
                        <th class="th-sm" style="background-color: red">RANKING</th>
                        <th class="th-sm" style="background-color: magenta">ID Mobil</th>
                        <th class="th-sm" style="background-color: blue">Total</th>
                        <th class="th-sm">ID Penjual</th>
                        <th class="th-sm">Merk</th>
                        <th class="th-sm">Type</th>
                        <th class="th-sm">Peminat</th>
                        <th class="th-sm">Tahun</th>
                        <th class="th-sm">Kondisi Mobil</th>
                        <th class="th-sm">Harga</th>
                        <th class="th-sm">Atas Nama Surat</th>
                        <th class="th-sm">Pajak</th>
                        <th class="th-sm">Jenis Transmisi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql="SELECT MAX(peminat), MAX(tahun), MAX(kondisi), MIN(harga), MAX(pemilik), MAX(pajak), MAX(transmisi) FROM mobil";
                    $result=mysqli_query($konek,$sql); //row melihat dari sql 
                    while($row=mysqli_fetch_array($result)){
                        $maxPeminat   =$row[0];
                        $maxTahun     =$row[1];
                        $maxKondisi   =$row[2];
                        $minHarga     =$row[3];
                        $maxPemilik   =$row[4];
                        $maxPajak     =$row[5];
                        $maxTransmisi =$row[6];   
                    }


                    $sql="SELECT * FROM mobil, bobot"; 
                    //ORDER BY tahun DESC, peminat DESC,  kondisi DESC, harga DESC, pemilik DESC, pajak DESC, transmisi DESC";
                    //ORDER BY peminat ASC, tahun ASC, kondisi ASC, harga ASC, pemilik ASC, pajak ASC, transmisi ASC";
                    $result=mysqli_query($konek,$sql); //row melihat dari sql 
                    $ranking=0;
                    while($row=mysqli_fetch_assoc($result)){
                        $bPeminat   =$row['bpeminat'];
                        $bTahun     =$row['btahun'];
                        $bKondisi   =$row['bkondisi'];
                        $bHarga     =$row['bharga'];
                        $bPemilik   =$row['bpemilik'];
                        $bPajak     =$row['bpajak'];
                        $bTransmisi =$row['btransmisi'];

                        $idP        =$row['idP'];
                        $idM        =$row['idM'];
                        $merk       =$row['merk'];
                        $type       =$row['type'];
                        $hPeminat   =$bPeminat*($row['peminat']/$maxPeminat);
                        $hTahun     =$bTahun*($row['tahun']/$maxTahun);
                        $hKondisi   =$bKondisi*($row['kondisi']/$maxKondisi);
                        $hHarga     =$bHarga*($minHarga/$row['harga']);
                        $hPemilik   =$bPemilik*($row['pemilik']/$maxPemilik);
                        $hPajak     =$bPajak*($row['pajak']/$maxPajak);
                        $hTransmisi =$bTransmisi*($row['transmisi']/$maxTransmisi);

                        $total=$hPeminat+$hTahun+$hKondisi+$hHarga+$hPemilik+$hPajak+$hTransmisi;                      
                        
                        echo "
                                <tr> 
                                  <td align='center'></td>
                                  <td>".$idM."</td>
                                  <td align='center'>".round($total,2)."</td> 
                                  <td>".$idP."</td>
                                  <td>".$merk."</td>
                                  <td>".$type."</td>
                                  <td align='center'>".round($hPeminat,2)."</td>
                                  <td align='center'>".round($hTahun,2)."</td>
                                  <td align='center'>".round($hKondisi,2)."</td>
                                  <td align='center'>".round($hHarga,2)."</td>
                                  <td align='center'>".round($hPemilik,2)."</td>
                                  <td align='center'>".round($hPajak,2)."</td>
                                  <td align='center'>".round($hTransmisi,2)."</td>
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