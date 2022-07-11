<?php
require_once('db.php');

function hapus($id) {
    global $conn;
    $connection = $conn;
    $query = "DELETE FROM buku WHERE id_buku = $id";
    $result = mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

$id = $_GET["id"];
if(hapus($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href='../admin.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus);
            document.location.href='../admin.php';
        </script>
    ";
}
?>
