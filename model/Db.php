<?php
session_start();

include 'Conn.php';

class Db extends Conn
{
    // Admin CRUD
    public function getAllAdmin()
    {
        $query = $this->get("SELECT * FROM tb_admin");
        return $query;
    }
    public function saveAdmin($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $nama     = $data['nama'];
        $level    = $data['level'];

        global $conn;
        $query = "INSERT INTO tb_admin (   admin_username,
                                                admin_password,
                                                admin_nama,
                                                admin_level) 
                                                VALUES (
                                                    '$username',
                                                    '$password',
                                                    '$nama',
                                                    '$level')";
        return $conn->query($query);
    }
    public function deleteAdmin($id)
    {
        global $conn;
        $query = "DELETE FROM tb_admin WHERE admin_id = '$id'";
        return $conn->query($query);
    }
    public function getOneAdmin($id)
    {
        $query = $this->get("SELECT * FROM tb_admin WHERE admin_id = '$id'");
        return $query;
    }
    public function editAdmin($data)
    {
        global $conn;

        $id       = $data['id'];
        $username = $data['username'];
        $password = $data['password'];
        $nama     = $data['nama'];
        $level    = $data['level'];

        $query    = "UPDATE tb_admin SET    admin_username = '$username',
                                            admin_password = '$password',
                                            admin_nama     = '$nama',
                                            admin_level    = '$level'
                                            WHERE
                                            admin_id = '$id'";
        return $conn->query($query);
    }
    // Perusahaan CRUD
    public function getAllPerusahaan()
    {
        $query = $this->get("SELECT * FROM tb_perusahaan");
        return $query;
    }
    public function savePerusahaan($data)
    {
        $nama   = $data['nama'];
        $telp   = $data['telp'];
        $alamat = $data['alamat'];

        global $conn;
        $query = "INSERT INTO tb_perusahaan (perusahaan_nama,
                                        perusahaan_telp,
                                        perusahaan_alamat) 
                                        VALUES (
                                        '$nama',
                                        '$telp',
                                        '$alamat')";
        return $conn->query($query);
    }
    public function deletePerusahaan($id)
    {
        global $conn;
        $query = "DELETE FROM tb_perusahaan WHERE perusahaan_id = '$id'";
        return $conn->query($query);
    }
    public function getOnePerusahaan($id)
    {
        $query = $this->get("SELECT * FROM tb_perusahaan WHERE perusahaan_id = '$id'");
        return $query;
    }
    public function editPerusahaan($data)
    {
        global $conn;

        $id         = $data['id'];
        $nama       = $data['nama'];
        $telp       = $data['telp'];
        $alamat     = $data['alamat'];

        $query    = "UPDATE tb_perusahaan SET   perusahaan_nama     = '$nama',
                                                perusahaan_telp     = '$telp',
                                                perusahaan_alamat   = '$alamat'
                                                WHERE
                                                perusahaan_id = '$id'";
        return $conn->query($query);
    }

    // Party CRUD
    public function getAllParty()
    {
        $query = $this->get("   SELECT * 
                                FROM tb_party 
                                JOIN tb_perusahaan 
                                ON tb_party.perusahaan_id=tb_perusahaan.perusahaan_id ORDER BY tb_party.party_id DESC ");
        return $query;
    }
    public function saveParty($data)
    {
        $perusahaan = $data['perusahaan'];
        $spk        = $data['spk'];
        $do         = $data['do'];
        $po         = $data['po'];
        $nokontrak  = $data['nokontrak'];
        $kontrak    = $data['kontrak'];

        global $conn;
        $query = "INSERT INTO tb_party (    perusahaan_id,
                                            party_spk,
                                            party_do,
                                            party_po,
                                            party_nokontrak,
                                            party_kontrak) 
                                            VALUES (
                                                '$perusahaan',
                                                '$spk',
                                                '$do',
                                                '$po',
                                                '$nokontrak',
                                                '$kontrak')";
        return $conn->query($query);
    }
    public function deleteParty($id)
    {
        global $conn;
        $query = "DELETE FROM tb_party WHERE party_id = '$id'";
        return $conn->query($query);
    }
    public function getOneParty($id)
    {
        $query = $this->get("SELECT * 
                            FROM tb_party 
                            JOIN tb_perusahaan
                            ON tb_party.perusahaan_id=tb_perusahaan.perusahaan_id
                            WHERE party_id = '$id'
                            ")[0];
        return $query;
    }
    // public function editParty($data)
    // {
    //     global $conn;

    //     $id         = $data['id'];
    //     $perusahaan = $data['perusahaan'];
    //     $spk        = $data['spk'];
    //     $do         = $data['do'];
    //     $po         = $data['po'];
    //     $nokontrak  = $data['nokontrak'];
    //     $kontrak    = $data['kontrak'];

    //     $query    = "UPDATE tb_party SET    perusahaan_id   = '$perusahaan',
    //                                         party_spk       = '$spk',
    //                                         party_do        = '$do',
    //                                         party_po        = '$po',
    //                                         party_nokontrak = '$nokontrak',
    //                                         party_kontrak   = '$kontrak'
    //                                         WHERE
    //                                         party_id = '$id'";
    //     return $conn->query($query);
    // }

    // Party CRUD
    public function getAllDetailParty($id)
    {
        $query = $this->get("   SELECT * 
                                FROM tb_party_detail 
                                JOIN tb_party
                                ON tb_party_detail.party_id=tb_party.party_id 
                                WHERE tb_party_detail.party_id = '$id' ORDER BY tb_party_detail.party_detail_id DESC ");
        return $query;
    }
    public function saveDetailParty($data)
    {

        $idDetail         = $data['idDetail'];
        $idParty          = $data['idParty'];
        $noPolisi         = $data['noPolisi'];
        $tglMuatPabrik    = $data['tglMuatPabrik'];
        $noDo             = $data['noDo'];
        $noKontrak        = $data['nokontrak'];
        $noSppb           = $data['noSppb'];
        $tonaseMuatPabrik = $data['tonaseMuatPabrik'];
        $tglBongkarUip    = $data['tglBongkarUip'];
        $tonaseBongkarUip = $data['tonaseBongkarUip'];
        $selisih          = $data['selisih'];
        $namaSupir        = $data['namaSupir'];
        $upah             = $data['upah'];
        $jumlahTagihan    = $data['jumlahTagihan'];
        $adminOfficeFee   = $data['adminOfficeFee'];
        $driverDeposito   = $data['driverDeposito'];
        $nagari           = $data['nagari'];
        $totalTagihan     = $data['totalTagihan'];

        global $conn;
        $query = " UPDATE `tb_party_detail` 
                        SET 
                        `party_id`= '$idParty',
                        `party_detail_no_polisi`= '$noPolisi',
                        `party_detail_tgl_muat_pabrik`= '$tglMuatPabrik',
                        `party_detail_do`= '$noDo',
                        `party_detail_kontrak`= '$noKontrak',
                        `party_detail_sppb`= '$noSppb',
                        `party_detail_ton_muat_pabrik`= '$tonaseMuatPabrik',
                        `party_detail_tgl_bongkar_uip`= '$tglBongkarUip',
                        `party_detail_ton_bongkar_uip`= '$tonaseBongkarUip',
                        `party_detail_selisih_ton`= '$selisih',
                        `party_detail_nama_supir`= '$namaSupir',
                        `party_detail_upah_kg`= '$upah',
                        `party_detail_jum_tagihan`= '$jumlahTagihan',
                        `party_detail_admin`= '$adminOfficeFee',
                        `party_detail_driver_deposito`= '$driverDeposito',
                        `party_detail_nagari`= '$nagari',
                        `party_detail_total_tagihan`= '$totalTagihan'
                        WHERE
                        `party_detail_id`= '$idDetail'
                                                ";
        return $conn->query($query);
    }

    public function saveDetailPupukMuat($data)
    {

        $idPupuk   = $data['idPupuk'];
        $noPolisi  = $data['noPolisi'];
        $namaSupir = $data['namaSupir'];
        $noSim     = $data['noSim'];
        $jenis     = $data['jenis'];
        $berat     = $data['berat'];
        $tujuan    = $data['tujuan'];
        $noDo      = $data['noDo'];
        $nokontrak = $data['nokontrak'];


        global $conn;
        $query = "INSERT INTO tb_pupuk_detail(  pupuk_id,
                                                pupuk_detail_no_polisi,
                                                pupuk_detail_nama_supir,
                                                pupuk_detail_muat_no_sim,
                                                pupuk_detail_muat_jenis,
                                                pupuk_detail_do,
                                                pupuk_detail_muat_berat,
                                                pupuk_detail_muat_tujuan,
                                                pupuk_detail_kontrak) 
                                                VALUES (
                                                    '$idPupuk',
                                                    '$noPolisi',
                                                    '$namaSupir',
                                                    '$noSim',
                                                    '$jenis',
                                                    '$noDo',
                                                    '$berat',
                                                    '$tujuan',
                                                    '$nokontrak'
                                                    )";
        return $conn->query($query);
    }
    public function saveDetailPartyMuat($data)
    {

        $idParty   = $data['idParty'];
        $noPolisi  = $data['noPolisi'];
        $namaSupir = $data['namaSupir'];
        $noSim     = $data['noSim'];
        $jenis     = $data['jenis'];
        $berat     = $data['berat'];
        $tujuan    = $data['tujuan'];
        $noDo      = $data['noDo'];
        $nokontrak = $data['nokontrak'];


        global $conn;
        $query = "INSERT INTO tb_party_detail(  party_id,
                                                party_detail_no_polisi,
                                                party_detail_nama_supir,
                                                party_detail_muat_no_sim,
                                                party_detail_muat_jenis,
                                                party_detail_do,
                                                party_detail_muat_berat,
                                                party_detail_muat_tujuan,
                                                party_detail_kontrak) 
                                                VALUES (
                                                    '$idParty',
                                                    '$noPolisi',
                                                    '$namaSupir',
                                                    '$noSim',
                                                    '$jenis',
                                                    '$noDo',
                                                    '$berat',
                                                    '$tujuan',
                                                    '$nokontrak'
                                                    )";
        return $conn->query($query);
    }

    public function deleteDetailParty($id)
    {
        global $conn;
        $query = "DELETE FROM tb_party_detail WHERE party_detail_id = '$id'";
        // echo $query;
        // exit;
        return $conn->query($query);
    }
    public function getOneDetailParty($id)
    {
        $query = $this->get("SELECT * 
                            FROM tb_party_detail 
                            JOIN tb_party
                            ON tb_party_detail.party_id = tb_party.party_id
                            JOIN tb_perusahaan
                            ON tb_perusahaan.perusahaan_id = tb_party.perusahaan_id
                            WHERE tb_party_detail.party_detail_id = '$id'")[0];
        return $query;
    }
    // public function editAdmin($data)
    // {
    //     global $conn;

    //     $id       = $data['id'];
    //     $username = $data['username'];
    //     $password = $data['password'];
    //     $nama     = $data['nama'];
    //     $level    = $data['level'];

    //     $query    = "UPDATE tb_admin SET    admin_username = '$username',
    //                                         admin_password = '$password',
    //                                         admin_nama     = '$nama',
    //                                         admin_level    = '$level'
    //                                         WHERE
    //                                         admin_id = '$id'";
    //     return $conn->query($query);
    // }

    // AKSI LOGIN
    public function Login($data)
    {
        global $conn;
        $user  = $data['username'];
        $pass  = $data['password'];
        $level = $data['level'];

        $query = "SELECT * FROM tb_admin WHERE admin_username = '$user' AND admin_password = '$pass' AND admin_level='$level' ";
        // echo $query;
        // exit;
        $ambil = $conn->query($query);
        $cek = $ambil->num_rows;

        if ($level == 1) {
            if ($cek == 1) {
                $_SESSION['akun'] = $ambil->fetch_object();
                echo "
                <script>alert('Berhasil Login');window.location='index.php'</script>
                ";
            } else {
                echo "
                <script>alert('Gagal Login, Silahkan Cek Kembali Username dan Password');window.location='login.php'</script>
                ";
            }
        } elseif ($level == 2) {
            if ($cek == 1) {
                $_SESSION['akun'] = $ambil->fetch_object();
                echo "
                <script>alert('Berhasil Login');window.location='index.php'</script>
                ";
            } else {
                echo "
                <script>alert('Gagal Login, Silahkan Cek Kembali Username dan Password');window.location='login.php'</script>
                ";
            }
        }
    }
    // Aksi CRUD Tambah Perusahaan Pengirim
    public function getAllPengirim()
    {
        $query = $this->get("SELECT * FROM tb_pengirim");
        return $query;
    }
    public function delete($id)
    {
        global $conn;
        $query = "DELETE FROM tb_pengirim WHERE pengirim_id = '$id'";
        return $conn->query($query);
    }
    public function savePengirim($data)
    {
        $nama    = $data['nama_perusahaan'];
        $alamat  = $data['alamat_perusahaan'];

        global $conn;
        $query = "INSERT INTO `tb_pengirim`(`pengirim_nama`, `pengirim_alamat`) 
        VALUES                                  ('$nama',
                                                '$alamat')";
        return $conn->query($query);
    }
    public function getOnepengirim($id)
    {
        $query = $this->get("SELECT * FROM tb_pengirim WHERE pengirim_id = '$id'");
        return $query;
    }
    public function editPengirim($data)
    {
        global $conn;

        $id       = $data['id'];
        $nama     = $data['nama'];
        $alamat   = $data['alamat'];

        $query    = "UPDATE tb_pengirim SET pengirim_nama = '$nama',
                                            pengirim_alamat = '$alamat'
                                            WHERE
                                            pengirim_id = '$id'";
        return $conn->query($query);
    }

    // CRUD Pupuk
    public function getAllPupuk()
    {
        $query = $this->get("SELECT * 
                                FROM tb_pupuk 
                                JOIN tb_perusahaan 
                                ON tb_pupuk.perusahaan_id=tb_perusahaan.perusahaan_id ");
        return $query;
    }
    public function savePupuk($data)
    {
        $perusahaan = $data['perusahaan'];
        $spk        = $data['spk'];
        $do         = $data['do'];
        $po         = $data['po'];
        $nokontrak  = $data['nokontrak'];
        $kontrak    = $data['kontrak'];
        $jenisPupuk    = $data['jenisPupuk'];

        global $conn;
        $query = "INSERT INTO `tb_pupuk`(`perusahaan_id`, `pupuk_spk`, `pupuk_do`, `pupuk_po`, `pupuk_nokontrak`, `pupuk_kontrak`,`pupuk_jenis`) VALUES ('$perusahaan',
                                                '$spk',
                                                '$do',
                                                '$po',
                                                '$nokontrak',
                                                '$kontrak','$jenisPupuk')";
        return $conn->query($query);
    }
    public function getOnePupuk($id)
    {
        $query = $this->get("SELECT * 
                            FROM tb_pupuk 
                            JOIN tb_perusahaan
                            ON tb_pupuk.perusahaan_id=tb_perusahaan.perusahaan_id
                            WHERE pupuk_id = '$id'
                            ")[0];
        return $query;
    }
    // public function editPupuk($data)
    // {
    //     global $conn;

    //     $id         = $data['id'];
    //     $perusahaan = $data['perusahaan'];
    //     $spk        = $data['spk'];
    //     $do         = $data['do'];
    //     $po         = $data['po'];
    //     $nokontrak  = $data['nokontrak'];
    //     $kontrak    = $data['kontrak'];

    //     $query    = "UPDATE tb_party SET    perusahaan_id   = '$perusahaan',
    //                                         party_spk       = '$spk',
    //                                         party_do        = '$do',
    //                                         party_po        = '$po',
    //                                         party_nokontrak = '$nokontrak',
    //                                         party_kontrak   = '$kontrak'
    //                                         WHERE
    //                                         party_id = '$id'";
    //     return $conn->query($query);
    // }
    public function getAllSatuan()
    {
        $query = $this->get("SELECT * 
                                FROM tb_satuan_pupuk");
        return $query;
    }
    public function saveDetailPupuk($data)
    {

        $idPupuk            = $data['idPupuk'];
        $noPolisi           = $data['noPolisi'];
        $noSpb              = $data['noSpb'];
        $noSppb             = $data['noSppb'];
        $jenisSatuan        = $data['jenisSatuan'];
        $tglMuatPabrik      = $data['tglMuatPabrik'];
        $tonaseMuatPabrik   = $data['tonaseMuatPabrik'];
        $satuanMuat         = $data['satuanMuat'];
        $nettoMuat          = $data['nettoMuat'];
        $tglBongkarUip      = $data['tglBongkarUip'];
        $tonaseBongkarUip   = $data['tonaseBongkarUip'];
        $satuanBongkar      = $data['satuanBongkar'];
        $nettoBongkar       = $data['nettoBongkar'];
        $selisih            = $data['selisih'];
        $namaSupir           = $data['namaSupir'];
        $upah               = $data['upah'];
        $jumlahTagihan      = $data['jumlahTagihan'];
        $adminOfficeFee     = $data['adminOfficeFee'];
        $driverDeposito     = $data['driverDeposito'];
        $totalTagihan       = $data['totalTagihan'];

        global $conn;
        $query = "INSERT INTO `tb_pupuk_detail`(`pupuk_id`, `pupuk_detail_no_polisi`, `pupuk_detail_nospb`, `pupuk_detail_sppb`, `pupuk_detail_jenis`, `pupuk_detail_tgl_muat_pabrik`, `pupuk_detail_ton_muat_pabrik`, `pupuk_detail_satuanmuat`, `pupuk_detail_nettomuat`, `pupuk_detail_tgl_bongkar_uip`, `pupuk_detail_ton_bongkar_uip`, `pupuk_detail_satuanbongkar`, `pupuk_detail_nettobongkar`, `pupuk_detail_selisih_ton`, `pupuk_detail_nama_supir`, `pupuk_detail_upah_kg`, `pupuk_detail_jum_tagihan`, `pupuk_detail_admin`, `pupuk_detail_driver_deposito`, `pupuk_detail_total_tagihan`) VALUES (
                                                    '$idPupuk',
                                                    '$noPolisi',
                                                    '$noSpb ',
                                                    '$noSppb',
                                                    '$jenisSatuan',
                                                    '$tglMuatPabrik',
                                                    '$tonaseMuatPabrik',
                                                    '$satuanMuat ',
                                                    '$nettoMuat ',
                                                    '$tglBongkarUip',
                                                    '$tonaseBongkarUip',
                                                    '$satuanBongkar ',
                                                    '$nettoBongkar ',
                                                    '$selisih',
                                                    '$namaSupir',
                                                    '$upah',
                                                    '$jumlahTagihan',
                                                    '$adminOfficeFee',
                                                    '$driverDeposito',
                                                    '$totalTagihan')";
        return $conn->query($query);
    }
    public function getAllDetailPupuk($id)
    {
        $query = $this->get("  SELECT * 
        FROM tb_pupuk_detail 
        JOIN tb_pupuk 
        ON tb_pupuk_detail.pupuk_id=tb_pupuk.pupuk_id
        -- JOIN tb_satuan_pupuk 
        -- ON tb_pupuk_detail.pupuk_detail_jenis=tb_satuan_pupuk.satuan_id
        WHERE tb_pupuk_detail.pupuk_id = $id ");
        return $query;
    }
    public function deleteDetailPupuk($id)
    {
        global $conn;
        $query = "DELETE FROM tb_pupuk_detail WHERE pupuk_detail_id = '$id'";
        // echo $query;
        // exit;
        return $conn->query($query);
    }
    public function deletePupuk($id)
    {
        global $conn;
        $query = "DELETE FROM tb_pupuk WHERE pupuk_id = '$id'";
        return $conn->query($query);
    }

    // CRUD SATUAN
    public function saveSatuan($data)
    {
        $namaSatuan   = $data['namaSatuan'];
        $jumlah   = $data['jumlah'];

        global $conn;
        $query = "INSERT INTO `tb_satuan_pupuk`( `satuan_nama`, `satuan_jumlah`) VALUES(
                                        '$namaSatuan',
                                        '$jumlah')";
        return $conn->query($query);
    }
    public function deleteSatuan($id)
    {
        global $conn;
        $query = "DELETE FROM tb_satuan_pupuk WHERE satuan_id = '$id'";
        return $conn->query($query);
    }
    public function getOnesatuan($id)
    {
        $query = $this->get("SELECT * FROM tb_satuan_pupuk WHERE satuan_id = '$id'");
        return $query;
    }
    public function editSatuan($data)
    {
        global $conn;
        $id             = $data['id'];
        $namaSatuan     = $data['namaSatuan'];
        $jumlah         = $data['jumlah'];

        $query    = "UPDATE tb_satuan_pupuk SET satuan_nama = '$namaSatuan',
                                            satuan_jumlah = '$jumlah'
                                            WHERE
                                            satuan_id = '$id'";
        return $conn->query($query);
    }
}
