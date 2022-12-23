<?php include("config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Siswa Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.40.1/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body class="flex justify-center flex-col h-screen items-center">
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <nav class="space-x-4">
        <a href="form-daftar.php">[+] Tambah Baru</a>
        <a href="create_report.php" class="border-2 rounded-md">Cetak Pdf</a>
    </nav>

    <br>
    <div class="overflow-x-auto">
        <table border="1" class="table w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);

                while ($siswa = mysqli_fetch_array($query)) {
                    echo "<tr>";

                    echo "<td>" . $siswa['id'] . "</td>";
                    echo "<td><img src='image/" . $siswa['foto'] . "' width='100' height='100'></td>";
                    echo "<td>" . $siswa['nama'] . "</td>";
                    echo "<td>" . $siswa['alamat'] . "</td>";
                    echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                    echo "<td>" . $siswa['agama'] . "</td>";
                    echo "<td>" . $siswa['sekolah_asal'] . "</td>";

                    echo "<td>";
                    echo "<a href='form-edit.php?id=" . $siswa['id'] . "'>Edit</a> | ";
                    echo "<a href='hapus.php?id=" . $siswa['id'] . "'>Hapus</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

</body>

</html>