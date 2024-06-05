<?php
include '../../../config/database.php';
$db = new database();

$db->koneksi();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $kelas_id = $_POST['kelas_id'];
    $spp_id = $_POST['spp_id'];

    // Cek apakah NIS sudah digunakan
    $cek_sql = "SELECT COUNT(*) FROM siswa WHERE nis = ?";
    $cek_nis = $db->conn->prepare($cek_sql);
    $cek_nis->bind_param("i", $nis);
    $cek_nis->execute();
    $cek_nis->bind_result($nis_count);
    $cek_nis->fetch();
    $cek_nis->close();

    if ($nis_count > 0) {
        $pesan_error = "NIS Sudah Digunakan";
    } else {
        // Menambahkan siswa baru ke database
        $sql = "INSERT INTO siswa (nis, nama_lengkap, tanggal_lahir, jenis_kelamin, alamat, no_hp, kelas_id, spp_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $waduh = $db->conn->prepare($sql);
        $waduh->bind_param("isssssii", $nis, $nama_lengkap, $tanggal_lahir, $jenis_kelamin, $alamat, $no_hp, $kelas_id, $spp_id);
        $waduh->execute();
        $waduh->close();

        header('Location: viewSiswa.php');
        exit;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="../../../assets/css/styles.min.css" />
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../../../assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>

                                <p class="text-center">Tambah Data Siswa</p>
                                <form method="post" action="">
                                    <?php if (isset($pesan_error)) : ?>
                                        <div class="card text-bg-danger mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title fw-semibold mb-4">Kesalahan Berpikir</h5>
                                                <p class="card-text mb-0"><?php echo $pesan_error; ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input name="nis" type="number" class="form-control" id="nis" aria-describedby="emailHelp" maxlength="20" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" maxlength="50" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" maxlength="50" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                            <option value="L">Laki Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control" id="alamat" maxlength="100" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input name="no_hp" type="text" class="form-control" id="no_hp" maxlength="13" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="kelas_id" class="form-label">Kelas</label>
                                        <select class="form-select" name="kelas_id" id="kelas_id" required>
                                            <?php 
                                                $query = "SELECT * FROM kelas";
                                                $hasil = $db->conn->query($query);
                                                while ($data = $hasil->fetch_assoc()) :
                                            ?>
                                                <option value="<?= $data["id"] ?>"><?= $data["kode_kelas"] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="spp_id" class="form-label">SPP</label>
                                        <select class="form-select" name="spp_id" id="spp_id" required>
                                            <?php 
                                                $tahun = 2023;
                                                $query = "SELECT * FROM spp WHERE tahun >= $tahun";
                                                $hasil = $db->conn->query($query);
                                                while ($data = $hasil->fetch_assoc()) :
                                            ?>
                                                <option value="<?= $data["id"] ?>"><?= $data["tahun"] ?> - <?= $data["nominal"] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Tambah Data">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
