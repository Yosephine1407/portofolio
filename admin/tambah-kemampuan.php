<?php
session_start();
include '../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_kemampuan = $_POST['nama_kemampuan'];
    $level = $_POST['level'];
   

    $insert = mysqli_query($koneksi, "INSERT INTO kemampuan (nama_kemampuan, level) VALUES ('$nama_kemapuan', '$level'");
     header("location:kemampuan.php?tambah=berhasil");


}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editprofil = mysqli_query($koneksi, "SELECT * FROM kemampuan WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editprofil);

if (isset($_POST['edit'])) {
    $nama_kemampuan = $_POST['nama_kemampuan'];
    $level  = $_POST['level'];
    // ubah user kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE kemampua SET nama_kemampuan='$nama_kemampuan', level='$level' WHERE id= '$id'");
    header("location:kemampuan.php?ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connection, "DELETE FROM kemampuan WHERE id='$id'");
    header("location:kemampuan.php?hapus=berhasil");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kemampuan2.css">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Profil</h2>
    <form action="pengalaman-pekerjaan.php" method="post">
        <div class="form-group">
            <label for="nama_kemampuan">Nama Kemampuan</label>
            <div class="input"><input type="text" name="nama_kemampuan" placeholder="Masukkan Nama Kemampuan Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_kemampuan'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <div class="input"><input type="text" name="level" placeholder="Masukkan Level Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['level'] : '' ?>">
        </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="tombol simpan">
        </div>
        </form>
    
</body>
</html>
