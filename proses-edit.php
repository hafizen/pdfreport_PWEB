<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    if (empty($foto)) {
        $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
        $query = mysqli_query($db, $sql);

        // apakah query update berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: list-siswa.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    } else {
        $fotobaru = date('dmYHis') . $foto;
        // Set path folder tempat menyimpan fotonya
        $path = "images/" . $fotobaru;

        if (move_uploaded_file($tmp, $path)) {
            // buat query
            $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$fotobaru')";
            $query = mysqli_query($db, $sql);
    
            // apakah query simpan berhasil?
            if ($query) {
                // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                header('Location: list-siswa.php');
            } else {
                // kalau gagal alihkan ke halaman indek.php dengan status=gagal
                die("Gagal menyimpan perubahan...");
            }
        }
    }
} else {
    die("Akses dilarang...");
}
