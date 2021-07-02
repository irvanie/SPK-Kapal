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
            <a class="nav-link" href="hasil.php">Perankingan</a>
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
                                <th>ID Kapal</th>
                                <th>Nama Kapal</th>
                                <th>C1</th>
                                <th>C2</th>
                                <th>C3</th>
                                <th>C4</th>
                            </tr>
                        </thead>
                        <?php
                            $id = 0;
                            $sql="SELECT * FROM konversi";
                            $result=mysqli_query($konek,$sql);
                            while($row=mysqli_fetch_array($result)){
                                echo "
                                        <tr align='center'>
                                            <td>".$row[0]."</td>  
                                            <td>".$row[1]."</td>
                                            <td>".$row[2]."</td>
                                            <td>".$row[3]."</td>
                                            <td>".$row[4]."</td>
                                            <td>".$row[5]."</td>
                                            <td>".$row[6]."</td>
                                        </tr>   
                                    "; 
                                }
                                ?>
            </table>
            <hr>
            <h4>Nilai SUM Data Alternatif Sesuai Kriteria</h4>
            <table width="100%" class="table table-sm table-bordered table-hover" id="dataTables-example">
                <thead class="bg-success" align="center">
                    <tr style="color: white"> 
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                    </tr>
                </thead>
              <?php
              $sql="SELECT SUM(hargasewa), SUM(kapasitas), SUM(fasilitas), SUM(kenyamanan) FROM konversi";
              $result=mysqli_query($konek,$sql); //row melihat dari sql 
              while($row=mysqli_fetch_array($result)){
                  $sumHargaSewa   =$row[0];
                  $sumKapasitas   =$row[1];
                  $sumFasilitas   =$row[2];
                  $sumKenyamanan  =$row[3]; 
              }
                echo "      
                    <tr align='center'>  
                        <td>".$sumHargaSewa."</td>  
                        <td>".$sumKapasitas."</td>
                        <td>".$sumFasilitas."</td>
                        <td>".$sumKenyamanan."</td>
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
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                    </tr>
                </thead>
              <?php
              $sql="SELECT * FROM konversi";
              $result=mysqli_query($konek,$sql); //row melihat dari sql 
              while($row = mysqli_fetch_assoc($result)){
                  $idK          =$row['nama'];
                  $rhargasewa   =$row['hargasewa']/$sumHargaSewa;
                  $rkapasitas   =$row['kapasitas']/$sumKapasitas;
                  $rfasilitas   =$row['fasilitas']/$sumFasilitas;
                  $rkenyamanan  =$row['kenyamanan']/$sumKenyamanan;
                  echo "      
                    <tr align='center'>
                        <td>".$idK."</td>
                        <td>".round($rhargasewa,2)."</td>
                        <td>".round($rkapasitas,2)."</td>
                        <td>".round($rfasilitas,2)."</td>
                        <td>".round($rkenyamanan,2)."</td>
                    </tr>   
                    ";        
                  }
              ?>
            </table>

            <hr>
            <h4>Hasil</h4>
            <table width="100%" class="table table-sm table-bordered table-hover" id="dataTables-example">
                <thead class="bg-success" align="center">
                    <tr style="color: white"> 
                        <th>Alternatif</th>
                        <th>Jumlah</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                    </tr>
                </thead>
              <?php
              $sql="SELECT * FROM konversi, bobot" ;
              $result=mysqli_query($konek,$sql); //row melihat dari sql 
              $ranking=0;
              while($row = mysqli_fetch_assoc($result)){
                  $bhargasewa  =$row['bhargasewa'];
                  $bkapasitas  =$row['bkapasitas'];
                  $bfasilitas  =$row['bfasilitas'];
                  $bkenyamanan =$row['bkenyamanan'];
                  
                  $idK          =$row['nama'];
                  $hHargaSewa   =$bhargasewa*($row['hargasewa']/$sumHargaSewa);     
                  $hKapasitas   =$bkapasitas*($row['kapasitas']/$sumKapasitas);       
                  $hFasilitas   =$bfasilitas*($row['fasilitas']/$sumFasilitas);     
                  $hKenyamanan  =$bkenyamanan*($row['kenyamanan']/$sumKenyamanan);
                  $total=$hHargaSewa+$hKapasitas+$hFasilitas+$hKenyamanan;                      
                  echo "      
                    <tr align='center'>
                        <td>".$idK."</td>
                        <td align='center'>".round($total,4)."</td> 
                        <td>".round($hHargaSewa,4)."</td>
                        <td>".round($hKapasitas,4)."</td>
                        <td>".round($hFasilitas,4)."</td>
                        <td>".round($hKenyamanan,4)."</td>
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