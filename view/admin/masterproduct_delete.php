<?php
require '../../database/database.php';

$id = $_GET["id"];
$querybuku = "SELECT * FROM data_mobil WHERE id = $id";
$resultbuku = mysqli_query($connect, $querybuku);
$rowbuku = mysqli_fetch_assoc($resultbuku);
$buku = $rowbuku['picture'];
$query = "DELETE FROM data_mobil WHERE id = $id";
unlink('../../assets/'.$buku);
mysqli_query($connect, $query);

if (mysqli_affected_rows($connect) > 0) {
    echo "<script type='text/javascript'>
            alert('Data berhasil dihapus...!'); 
            document.location.href = 'masterproduct.php';
        </script>";
};
?>
