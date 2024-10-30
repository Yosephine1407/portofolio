<?php
include '../koneksi.php';
$querypendidikan = mysqli_query($koneksi, "SELECT * FROM pendidikan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pendidikan.css">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Universitas</th>
                <th>Jurusan</th>
                <th>Tahun Masuk</th>
                <th>Tahun Keluar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>



        </tbody>
        <?php
        $no = 1;
        $variable = mysqli_fetch_all($querypendidikan, MYSQLI_ASSOC);
        foreach ($variable as $value) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value['nama_universitas'] ?></td>
                <td><?php echo $value['jurusan'] ?></td>
                <td><?php echo $value['tahun_masuk'] ?></td>
                <td><?php echo $value['tahun_keluar'] ?></td>
                <td>
                    <a class="tombol edit" href="tambah-pendidikan.php?edit=<?php echo $value['id'] ?>">Edit</a>
                    <a class="tombol delete" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                        href="pendidikan.php?delete=<?php echo $value['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </thead>

</body>

</html>