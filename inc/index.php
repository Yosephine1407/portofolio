<?php
include '../koneksi.php';

// menampilkan data profil dari database
$queryprofil = mysqli_query($koneksi, "SELECT * FROM profil ORDER BY id");
$rowprofil = mysqli_fetch_assoc($queryprofil);

// menampilkan data pendidikan dari database
$querypendidikan = mysqli_query($koneksi, "SELECT * FROM pendidikan ORDER BY id");
$rowpendidikan = mysqli_fetch_assoc($querypendidikan);

// menampilkan data pengalaman pekerjaan dari database
$querypengalaman_pekerjaan = mysqli_query($koneksi, "SELECT * FROM pengalaman_pekerjaan ORDER BY id");
$rowpengalaman_pekerjaan = mysqli_fetch_assoc($querypengalaman_pekerjaan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="jumbotron">
            <h1>Yosephine Leonie</h1>
            <nav>
                <ul>
                    <li><a href="#Profil">Profil</a></li>
                    <li><a href="#Pendidikan">Pendidikan</a></li>
                    <li><a href="#Pengalaman Pekerjaan">Pengalaman Pekerjaan</a></li>
                </ul>
            </nav>
        </div>
    </header>




    <main>
        <div class="content">
            <article id="profil" class="card">
                <h2>Profil</h2>
                <p>Saya <?php echo $rowprofil['nama'] ?></p>
                </td>
                <p>Lahir <?php echo $rowprofil['tgl_lahir'] ?></p>
            </article>




            <article id="pendidikan" class="card">
                <h3 id="pendidikan">Pendidikan</h3>
                <p>Lulusan <?php echo $rowpendidikan['nama_universitas'] ?></p>
                <p>Jurusan <?php echo $rowpendidikan['jurusan'] ?></p>
                <p>Tahun Masuk <?php echo $rowpendidikan['tahun_masuk'] ?></p>
                <p>Tahun Keluar <?php echo $rowpendidikan['tahun_keluar'] ?></p>
            </article>




            <article id="pengalaman pekerjaan" class="card">
                <h3>Pengalaman Pekerjaan</h3>
                <p><?php echo $rowpengalaman_pekerjaan['nama_pekerjaan'] ?></p>
                <p><?php echo $rowpengalaman_pekerjaan['deskripsi'] ?></p>
                <p><?php echo $rowpengalaman_pekerjaan['nama_perusahaan'] ?></p>
                <p><?php echo $rowpengalaman_pekerjaan['bulan'] ?></p>
            </article>
        </aside>

</body>

<footer>
    Copyright &copy; Yosephine Leonie
</footer>

</html>