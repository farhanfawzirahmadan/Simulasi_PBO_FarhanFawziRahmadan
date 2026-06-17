<?php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik jalur Prestasi
    private $jenis_prestasi; 
    private $tingkat_prestasi; 

    public function __construct($data) {
        parent::__construct(
            $data['id_pendaftaran'], 
            $data['nama_calon'], 
            $data['asal_sekolah'], 
            $data['nilai_ujian'], 
            $data['biaya_pendaftaran_dasar']
        ); 
        $this->jenis_prestasi = $data['jenis_prestasi'];
        $this->tingkat_prestasi = $data['tingkat_prestasi'];
    }

    // Metode Query Spesifik Jalur Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'"; 
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // WAJIB ADA (Dideklarasikan kosong dulu karena ini kerjaan Tahap 5)
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Prestasi: " . $this->jenis_prestasi . " (" . $this->tingkat_prestasi . ")";
    }
}
?>