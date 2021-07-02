<?php
include "koneksi.php";

$query="DELETE from konversi where idK='".$_GET['id']."'";
mysqli_query($konek, $query);
header("location:vkonversi.php");
?>