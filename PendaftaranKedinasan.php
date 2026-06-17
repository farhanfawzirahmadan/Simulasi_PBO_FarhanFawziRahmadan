<?php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik jalur Kedinasan
    private $sk_ikatan_dinas; [cite: 38]
    private $instansi_sponsor; [cite: 38]

    public function __construct($data) {
        parent::__construct(
            $data['id_pendaftaran'], 
            $data['nama_calon'], 
            $data['asal_sekolah'], 
            $data['nilai_ujian'], 
            $data['biaya_pendaftaran_dasar']
        ); [cite: 24]
        $this->sk_ikatan_dinas = $data['sk_ikatan_dinas'];
        $this->instansi_sponsor = $data['instansi_sponsor'];
    }

    // Metode Query Spesifik Jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'"; [cite: 39]
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // WAJIB ADA (Dideklarasikan kosong dulu karena ini kerjaan Tahap 5)
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Sponsor: " . $this->instansi_sponsor . " (SK: " . $this->sk_ikatan_dinas . ")";
    }
}
?>