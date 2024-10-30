<?php
include '../koneksi.php';
$querypengalaman_pekerjaan = mysqli_query($koneksi, "SELECT * FROM pengalaman_pekerjaan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pengalaman-pekerjaan.css">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pekerjaan</th>
                <th>Deskripsi</th>
                <th>Nama Perusahaan</th>
                <th>Bulan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>



        </tbody>
        <?php
        $no = 1;
        $variable = mysqli_fetch_all($querypengalaman_pekerjaan, MYSQLI_ASSOC);
        foreach ($variable as $value) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value['nama_pekerjaan'] ?></td>
                <td><?php echo $value['deskripsi'] ?></td>
                <td><?php echo $value['nama_perusahaan'] ?></td>
                <td><?php echo $value['bulan'] ?></td>
                <td>
                    <a class="tombol edit" href="tambah-pengalaman_pekerjaan.php?edit=<?php echo $value['id'] ?>">Edit</a>
                    <a class="tombol delete" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                        href="pengalaman-pekerjaan.php?delete=<?php echo $value['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </thead>

</body>

</html>