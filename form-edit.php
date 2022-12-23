<?php

include("config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Formulir Edit Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.40.1/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body class="flex justify-center flex-col h-screen items-center">
    <div class="card w-96 bg-neutral text-neutral-content">
        <div class="card-body items-center text-center">
            <h1>Formulir Edit Siswa</h1>
            <div class="form-control">
                <form action="proses-edit.php" method="POST" class="space-y-4">
                    <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

                    <label class="input-group">
                        <span>Nama</span>
                        <input type="text" placeholder="Nama lengkap" class="input input-bordered" name="nama" value="<?php echo $siswa['nama'] ?>" />
                    </label>
                    <label class="input-group">
                        <span>Alamat</span>
                        <input type="text" placeholder="Alamat" class="input input-bordered" name="alamat" value="<?php echo $siswa['alamat'] ?>" />
                    </label>

                    <label class="input-group">
                        <span>Jenis Kelamin</span>
                        <?php $jk = $siswa['jenis_kelamin']; ?>
                        <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
                    </label>

                    <label class="input-group">
                        <span>Agama</span>
                        <?php $agama = $siswa['agama']; ?>
                        <select name="agama">
                            <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                            <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                            <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                            <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                            <option <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
                        </select> </label>
                    <input type="file" name="foto">
                    <label class="input-group">
                        <span>Asal sekolah</span>
                        <input type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
                    </label>
                    <div class="flex justify-center">
                        <button class="btn btn-active btn-primary"><input type="submit" value="simpan" name="simpan" /></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>