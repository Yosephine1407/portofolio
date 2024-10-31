<?php
include '../koneksi.php';
$querykemampuan = mysqli_query($koneksi, "SELECT * FROM kemampuan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kemampuan.css">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kemampuan</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>



        </tbody>
        <?php
        $no = 1;
        $variable = mysqli_fetch_all($querykemampuan, MYSQLI_ASSOC);
        foreach ($variable as $value) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value['nama_kemampuan'] ?></td>
                <td><?php echo $value['level'] ?></td>
                <td>
                    <a class="tombol edit" href="tambah-kemampuan.php?edit=<?php echo $value['id'] ?>">Edit</a>
                    <a class="tombol delete" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                    href="kemampuan.php?delete=<?php echo $value['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </thead>

</body>

</html>