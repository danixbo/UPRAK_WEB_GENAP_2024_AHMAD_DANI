<?php
include '../../../config/database.php';
$db = new database();
$db->koneksi();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nis'])) {
    $sql = 'SELECT * FROM siswa WHERE nis = ' . $_GET['nis'];
    $result = $db->take($sql);
    if (count($result) == 1) {
        $data = $result[0];
    } else {
        echo "Data Tidak Di Temukan";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nis'])) {
    $sql = 'UPDATE siswa SET nama_lengkap = ?, tanggal_lahir = ?, jenis_kelamin = ?, alamat = ?, no_hp = ?, kelas_id = ?, spp_id = ? WHERE nis = ?';
    $params = [
        $_POST['nama_lengkap'],
        $_POST['tanggal_lahir'],
        $_POST['jenis_kelamin'],
        $_POST['alamat'],
        $_POST['no_hp'],
        $_POST['kelas_id'],
        $_POST['spp_id'],
        $_POST['nis']
    ];
    
    $db->execute($sql, $params);

    header('Location: viewSiswa.php');
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../../../assets/images/logos/favicon.png" />
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

                                <p class="text-center">Your Social Campaigns</p>
                                <form method="post" action="">
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input name="nis" type="number" class="form-control" id="nis" value="<?php echo $data['nis']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" aria-describedby="emailHelp" maxlength="50" value="<?php echo $data['nama_lengkap']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" aria-describedby="emailHelp" value="<?php echo $data['tanggal_lahir']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                                            <option value="L" <?php if ($data['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
                                            <option value="P" <?php if ($data['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input name="no_hp" type="tel" class="form-control" id="no_hp" value="<?php echo $data['no_hp']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="alamat"><?php echo $data['alamat']; ?></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="kelas_id" class="form-label">Kelas</label>
                                        <select class="form-select" name="kelas_id" id="kelas_id" required>
                                            <?php
                                            $query_kelas = "SELECT * FROM kelas";
                                            $hasil_kelas = $db->conn->query($query_kelas);
                                            while ($data_kelas = $hasil_kelas->fetch_assoc()) :
                                                $selected = ($data['kelas_id'] == $data_kelas['id']) ? "selected" : "";
                                            ?>
                                                <option value="<?= $data_kelas["id"] ?>" <?= $selected ?>><?= $data_kelas["kode_kelas"] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="spp_id" class="form-label">SPP</label>
                                        <select class="form-select" name="spp_id" id="spp_id" required>
                                            <?php
                                            $query_spp = "SELECT * FROM spp";
                                            $hasil_spp = $db->conn->query($query_spp);
                                            while ($data_spp = $hasil_spp->fetch_assoc()) :
                                                $selected = ($data['spp_id'] == $data_spp['id']) ? "selected" : "";
                                            ?>
                                                <option value="<?= $data_spp["id"] ?>" <?= $selected ?>><?= $data_spp["tahun"] ?> - <?= $data_spp["nominal"] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Edit Data">
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