<?php
session_start();
include '../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];

    $insert = mysqli_query($koneksi, "INSERT INTO profil
    (nama,tgl_lahir) VALUES 
    ('$nama', '$tgl_lahir')");
     header("location:profil.php?tambah=berhasil");


}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editprofil = mysqli_query($koneksi, "SELECT * FROM profil WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editprofil);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    // ubah user kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($connection, "UPDATE profil SET nama='$nama', tgl_lahir='$tgl_lahir' WHERE id= '$id'");
    header("location:profil.php?ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connection, "DELETE FROM profil WHERE id='$id'");
    header("location:profil.php?hapus=berhasil");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil2.css">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Profil</h2>
    <form action="profil.php" method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <div class="input"><input type="text" name="nama" placeholder="Masukkan nama Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <div class="input"><input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['tgl_lahir'] : '' ?>">
        </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="tombol simpan">
        </div>
        </form>
    
</body>
</html>
