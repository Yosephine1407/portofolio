<?php
session_start();
include '../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $deskripsi = $_POST['deskripsi'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $bulan = $_POST['bulan'];

    $insert = mysqli_query($koneksi, "INSERT INTO pengalaman_pekerjaan (nama_pekerjaan, deskripsi, nama_perusahaan, bulan) VALUES ('$nama_pekerjaan', '$deskripsi', '$nama_perusahaan', '$bulan'");
     header("location:pengalaman-pekerjaan.php?tambah=berhasil");


}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editprofil = mysqli_query($koneksi, "SELECT * FROM pengalaman_pekerjaan WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editprofil);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    // ubah user kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($connection, "UPDATE pekerjaan_pekerjaan SET nama_pekerjaan='$nama_pekerjaan', deskripsi='$deskripsi', nama_perusahaan='$nama_perusahaan', bulan='$bulan' WHERE id= '$id'");
    header("location:pengalaman-pekerjaan.php?ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connection, "DELETE FROM profil WHERE id='$id'");
    header("location:pengalaman-pekerjaan.php?hapus=berhasil");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pengalaman-pekerjaan2.css">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Profil</h2>
    <form action="pengalaman-pekerjaan.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Pekerjaan</label>
            <div class="input"><input type="text" name="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_pekerjaan'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <div class="input"><input type="text" name="deskripsi" placeholder="Masukkan Deskripsi Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['deskripsi'] : '' ?>">
        </div>
        </div>
       <div class="form-group">
        <label for="nama_perusahaan">Nama Perusahaan</label>
        <div class="input"><input type="text" name="nama_perusahaan" placeholder="Masukan Nama Perusahaan Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_perusahaan'] : '' ?>">
       </div>
        <div class="form-group">
            <label for="bulan">Bulan</label>
            <div class="input"><input type="text" name="bulan" placeholder="Masukkan Bulan Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['bulan'] : '' ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="tombol simpan">
        </div>
        </form>
    
</body>
</html>
