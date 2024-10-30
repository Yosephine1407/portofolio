<?php
session_start();
include '../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_universitas = $_POST['nama_universitas'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_keluar = $_POST['tahun_keluar'];

    $insert = mysqli_query($koneksi, "INSERT INTO pendidikan
    (nama_universitas,jurusan, tahun_masuk, tahun_keluar) VALUES 
    ('$nama_universitas', '$jurusan', '$tahun_masuk', '$tahun_keluar')");
    header("location:pendidikan.php?tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editpendidikan = mysqli_query($koneksi, "SELECT * FROM pendidikan WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editpendidikan);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $jurusan  = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_keluar = $_POST['tahun_keluar'];
    // ubah user kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($connection, "UPDATE pendidikan SET nama_universitas='$nama_universitas', jurusan='$jurusan',  tahun_masuk='$tahun_masuk', tahun_keluar='$tahun_keluar' WHERE id= '$id'");
    header("location:pendidikan.php?ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM pendidikan WHERE id='$id'");
    header("location:pendidikan.php?hapus=berhasil");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pendidikan2.css">
    <title>Document</title>
</head>

<body>
    <h2>Tambah Profil</h2>
    <form action="pendidikan.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Universitas</label>
            <div class="input"><input type="text" name="nama_universitas" placeholder="Masukkan Nama Universitas Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_universitas'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <div class="input"><input type="text" name="tgl_lahir" placeholder="Masukkan Jurusan Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['jurusan'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="tahun_masuk">Tahun Masuk</label>
            <div class="input"><input type="year" name="tahun_masuk" placeholder="Masukkan Tahun Masuk Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['tahun_masuk'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="tahun_keluar">Tahun Keluar</label>
            <div class="input"><input type="year" name="tahun_keluar" placeholder="Masukkan Tahun Keluar Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['tahun_keluar'] : '' ?>">
            </div>
        </div>

        <div class="form-group">
            <input type="submit" value="Simpan" class="tombol simpan">
        </div>
    </form>

</body>

</html>