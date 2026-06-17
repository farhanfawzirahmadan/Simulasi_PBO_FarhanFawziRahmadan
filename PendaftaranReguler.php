<?php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik jalur Reguler
    private $pilihan_prodi; 
    private $lokasi_kampus; 

    public function __construct($data) {
        parent::__construct(
            $data['id_pendaftaran'], 
            $data['nama_calon'], 
            $data['asal_sekolah'], 
            $data['nilai_ujian'], 
            $data['biaya_pendaftaran_dasar']
        ); 
        $this->pilihan_prodi = $data['pilihan_prodi'];
        $this->lokasi_kampus = $data['lokasi_kampus'];
    }

    // Metode Query Spesifik Jalur Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'"; 
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // WAJIB ADA (Dideklarasikan kosong dulu karena ini kerjaan Tahap 5)
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar;
    }

    public function tampilkanInfoJalur() {
        return "Prodi: " . $this->pilihan_prodi . " (" . $this->lokasi_kampus . ")";
    }

?>
