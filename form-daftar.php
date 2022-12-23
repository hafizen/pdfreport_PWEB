<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftaran Siswa Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.40.1/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body class="flex justify-center flex-col h-screen items-center">
    <div class="card w-96 bg-neutral text-neutral-content">
        <div class="card-body items-center text-center">
            <h1>Pendaftaran Siswa Baru</h1>
            <div class="form-control">
                <form action="proses-pendaftaran.php" method="POST" class="space-y-4" enctype="multipart/form-data">
                    <label class="input-group">
                        <span>Nama</span>
                        <input type="text" placeholder="Nama lengkap" class="input input-bordered" name="nama" />
                    </label>
                    <label class="input-group">
                        <span>Alamat</span>
                        <input type="text" placeholder="Alamat" class="input input-bordered" name="alamat" />
                    </label>
                    <label class="input-group">
                        <span>Jenis Kelamin</span>
                        <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
                    </label>
                    <label class="input-group">
                        <span>Agama</span>
                        <select name="agama">
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                            <option>Atheis</option>
                        </select> </label>
                    <input type="file" name="foto">
                    <label class="input-group">
                        <span>Asal sekolah</span>
                        <input type="text" name="sekolah_asal" placeholder="nama sekolah" />
                    </label>
                    <div class="flex justify-center">
                        <input class="btn btn-active btn-primary" type="submit" value="daftar" name="daftar" />
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>