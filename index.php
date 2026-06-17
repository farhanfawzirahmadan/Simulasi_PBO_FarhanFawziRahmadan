<?php
require_once 'koneksi.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 1. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// Inisialisasi variabel awal agar tidak terjadi error undidatfined variable saat di-render
$dataReguler = [];
$dataPrestasi = [];
$dataKedinasan = [];
$error_koneksi = false;

// 2. Validasi Keamanan: Cek apakah koneksi database berhasil atau bernilai NULL
if ($db === null) {
    // Jika koneksi gagal, aktifkan flag error tanpa menghentikan paksa (die) aplikasi
    $error_koneksi = true;
} else {
    // Jika koneksi aman, baru eksekusi metode query spesifik dari Tahap 4
    $dataReguler = PendaftaranReguler::getDaftarReguler($db);
    $dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
    $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
}

// 3. Helper Function untuk merender tabel (Tahap 6)
function renderTable($daftarMahasiswa, $namaJalur) {
    echo "<h3>Daftar Calon Mahasiswa - Jalur $namaJalur</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0' style='width:100%; margin-bottom:30px; border-collapse:collapse;'>
            <tr style='background-color:#f2f2f2; text-align:center;'>
                <th width='5%'>ID</th>
                <th width='20%'>Nama Calon</th>
                <th width='15%'>Asal Sekolah</th>
                <th width='10%'>Nilai Ujian</th>
                <th width='15%'>Biaya Dasar</th>
                <th width='20%'>Informasi Spesifik Jalur</th>
                <th width='15%'>Total Biaya Akhir</th>
            </tr>";
    
    if (empty($daftarMahasiswa)) {
        echo "<tr><td colspan='7' align='center'>Tidak ada data calon mahasiswa untuk jalur ini.</td></tr>";
    } else {
        foreach ($daftarMahasiswa as $row) {
            // SINKRONISASI OOP: Ubah data array mentah menjadi Objek Konkrit sesuai jalurnya
            if ($namaJalur === 'Reguler') {
                $mhs = new PendaftaranReguler($row);
            } elseif ($namaJalur === 'Prestasi') {
                $mhs = new PendaftaranPrestasi($row);
            } elseif ($namaJalur === 'Kedinasan') {
                $mhs = new PendaftaranKedinasan($row);
            }

            // Sekarang kita bisa panggil method-method polimorfik dengan aman!
            echo "<tr>
                    <td align='center'>".$row['id_pendaftaran']."</td>
                    <td>".htmlspecialchars($row['nama_calon'])."</td>
                    <td>".htmlspecialchars($row['asal_sekolah'])."</td>
                    <td align='center'>".$row['nilai_ujian']."</td>
                    <td>Rp ".number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.')."</td>
                    <td><em>".$mhs->tampilkanInfoJalur()."</em></td>
                    <td style='font-weight:bold; color:#2c3e50;'>Rp ".number_format($mhs->hitungTotalBiaya(), 0, ',', '.')."</td>
                  </tr>";
        }
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen PMB Jalur Spesifik</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #fafafa; }
        h2 { color: #2c3e50; text-align: center; }
        h3 { color: #2980b9; border-left: 5px solid #2980b9; padding-left: 10px; }
        
        /* Desain Alert Kotak Error */
        .error-box {
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 6px;
            margin: 20px 0;
        }
        .error-box h4 { margin-top: 0; font-size: 18px; }
        .error-box ol { margin-bottom: 0; padding-left: 20px; }
        .error-box li { margin-bottom: 5px; }
    </style>
</head>
<body>

    <h2>SISTEM MANAJEMEN PENDAFTARAN MAHASISWA BARU (PMB)</h2>
    <hr>

    <?php if ($error_koneksi): ?>
        
        <div class="error-box">
            <h4>⚠️ Koneksi Database Gagal!</h4>
            <p>Aplikasi tidak dapat menampilkan data karena koneksi ke MySQL bermasalah. Silakan lakukan pengecekan berikut:</p>
            <ol>
                <li>Pastikan aplikasi MySQL di Control Panel XAMPP / Laragon Anda sudah dalam kondisi <strong>Running (Aktif)</strong>.</li>
                <li>Pastikan Anda sudah membuat/mengimport database di <strong>phpMyAdmin</strong>.</li>
                <li>Buka file <code>koneksi/database.php</code> dan pastikan variabel <code>$db_name</code> sudah diganti dari tulisan <code>"DB_SIMULASI_PBO_KELAS_NamaLengkap"</code> menjadi nama database asli yang Anda buat di phpMyAdmin.</li>
            </ol>
        </div>

    <?php else: ?>
        
        <?php 
            renderTable($dataReguler, "Reguler"); 
            renderTable($dataPrestasi, "Prestasi"); 
            renderTable($dataKedinasan, "Kedinasan"); 
        ?>

    <?php endif; ?>

</body>
</html>