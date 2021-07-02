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
                        <a class="nav-link active" href="vkriteria.php">Data Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="vkonversi.php">Data Konversi Alternatif</a>
                </ul>
                <br>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
                        <thead class="bg-success" align="center">
                            <tr style="color: white"> 
                                <th>Nomor</th>
                                <th>ID Kriteria</th>
                                <th>Kriteria</th>
                                <th>Deskripsi</th>
                                <th>Bobot Kriteria</th>
                                
                            </tr>
                            </thead>
                             <?php
                            $id = 0;
                            $sql="SELECT * FROM kriteria";
                            $result=mysqli_query($konek,$sql);
                            while($row=mysqli_fetch_array($result)){
                                $id++;
                                echo "
                                        <tr>
                                            <td align='center'>".$id."</td>
                                            <td>".$row[0]."</td>  
                                            <td>".$row[1]."</td>
                                            <td>".$row[2]."</td>
                                            <td>".$row[3]."</td>
                                        </tr>   
                                    "; 
                                }
                                ?>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "footer.html";
?>