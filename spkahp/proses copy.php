<?php
include "header.php";
?>

<div class="container">
    <div class="card m-5">
      <div class="card-body">
        <ul class="nav nav-tabs nav-justified">
          <li class="nav-item">
            <a class="nav-link active" href="proses.php">Proses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hasil.php">Perangkingan</a>
          </li>
        </ul>
        <br>
        <div class="panel panel-info">
          <div class="panel-body">
            <h4>Matriks Keputusan</h4>
            <table width="100%" class="table table-sm table-bordered table-hover" id="dataTables-example">
            <thead class="bg-success" align="center">
                            <tr style="color: white"> 
                                <th>Alternatif</th>
                                <th>C1 (Profit)</th>
                                <th>C2 (Profit)</th>
                                <th>C3 (Profit)</th>
                                <th>C4 (Cost)</th>
                                <th>C5 (Profit)</th>
                                <th>C6 (Profit)</th>
                                <th>C7 (Profit)</th>
                            </tr>
                        </thead>
                        <?php
                            $id = 0;
                            $sql="SELECT * FROM mobil";
                            $result=mysqli_query($konek,$sql);
                            while($row=mysqli_fetch_array($result)){
                                echo "
                                        <tr align='center'>
                                            <td>".$row[0]."</td>  
                                            <td>".$row[4]."</td>
                                            <td>".$row[5]."</td>
                                            <td>".$row[6]."</td>
                                            <td>".$row[7]."</td>
                                            <td>".$row[8]."</td>
                                            <td>".$row[9]."</td>
                                            <td>".$row[10]."</td>
                                        </tr>   
                                    "; 
                                }
                                ?>
            </table>
            <hr>
            <h4>Nilai Min Max</h4>
            <table width="100%" class="table table-sm table-bordered table-hover" id="dataTables-example">
                <thead class="bg-success" align="center">
                    <tr style="color: white"> 
                        <th>C1 (Profit)</th>
                        <th>C2 (Profit)</th>
                        <th>C3 (Profit)</th>
                        <th>C4 (Cost)</th>
                        <th>C5 (Profit)</th>
                        <th>C6 (Profit)</th>
                        <th>C7 (Profit)</th>
                    </tr>
                </thead>
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
                echo "      
                    <tr align='center'>  
                        <td>".$maxPeminat."</td>  
                        <td>".$maxTahun."</td>
                        <td>".$maxKondisi."</td>
                        <td>".$minHarga."</td>
                        <td>".$maxPemilik."</td>
                        <td>".$maxPajak."</td>
                        <td>".$maxTransmisi."</td>
                        </tr>   
                ";        
              
              ?>
            </table>
            <hr>
            <h4>Matriks Normalisasi</h4>
            <table width="100%" class="table table-sm table-bordered table-hover" id="dataTables-example">
                <thead class="bg-success" align="center">
                    <tr style="color: white"> 
                        <th>Alternatif</th>
                        <th>C1 (Profit)</th>
                        <th>C2 (Profit)</th>
                        <th>C3 (Profit)</th>
                        <th>C4 (Cost)</th>
                        <th>C5 (Profit)</th>
                        <th>C6 (Profit)</th>
                        <th>C7 (Profit)</th>
                    </tr>
                </thead>
              <?php
              $sql="SELECT * FROM mobil";
              $result=mysqli_query($konek,$sql); //row melihat dari sql 
              while($row = mysqli_fetch_assoc($result)){
                  $idM          =$row['idM'];
                  $rPeminat     =$row['peminat']/$maxPeminat;
                  $rTahun       =$row['tahun']/$maxTahun;
                  $rKondisi     =$row['kondisi']/$maxKondisi;
                  $rHarga       =$minHarga/$row['harga'];
                  $rPemilik     =$row['pemilik']/$maxPemilik;
                  $rPajak       =$row['pajak']/$maxPajak;
                  $rTransmisi   =$row['transmisi']/$maxTransmisi;
                  echo "      
                    <tr align='center'>
                        <td>".$idM."</td>
                        <td>".round($rPeminat,2)."</td>
                        <td>".round($rTahun,2)."</td>
                        <td>".round($rKondisi,2)."</td>
                        <td>".round($rHarga,2)."</td>
                        <td>".round($rPemilik,2)."</td>
                        <td>".round($rPajak,2)."</td>
                        <td>".round($rTransmisi,2)."</td>
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