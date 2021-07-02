<?php
include "koneksi.php";

$query="DELETE from kapal where idK='".$_GET['id']."'";
mysqli_query($konek, $query);
header("location:vkapal.php");
?>