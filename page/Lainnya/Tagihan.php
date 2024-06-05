<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../auth/login.php");
    exit();
}

include '../../config/database.php';
$db = new database();
$db->koneksi();

if(isset($_POST["submit"])) {
    $nis = $_POST['nis'];
    $tahun = $_POST['tahun_tagihan'];
    
    $query = "SELECT bulan_tagihan FROM pembayaran WHERE nis = $nis AND tahun_tagihan = '$tahun'";
    $hasil = $db->conn->query($query);

    $bulan = [1,2,3,4,5,6,7,8,9,10,11,12];

    $bulan_dibayar = [];

    while ($row = $hasil->fetch_assoc()) {
        $bulan_dibayar[] = $row['bulan_tagihan'];
    }

    $query_nama = "SELECT nama_lengkap FROM siswa WHERE nis = '$nis'";
    $hasil_nama = $db->conn->query($query_nama);

    if($hasil_nama->num_rows > 0) {
        $nama_row = $hasil_nama->fetch_assoc();
        $nama = $nama_row["nama_lengkap"]; 
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../assets/css/styles.min.css" />
</head>

<body>
    <?php include '../../layout/header.php'; ?>
    <div class="row d-flex align-items-center justify-content-center"> 
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100" style="margin-top: 6rem;">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Data Tagihan</h5>
                    <form action="" method="post">
                        <div class="d-flex gap-6">
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan NIS" name="nis" id="nis">
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Tahun" name="tahun_tagihan" id="tahun_tagihan" maxlength="4">
                            <button class="btn btn-primary m-1" name="submit" type="submit">Kirim</button>
                        </div>
                        <div class="my-7">
                            <input type="text" class="form-control mb-6" placeholder="NIS" aria-describedby="emailHelp" name="nis_display" id="nis_display" value="<?= isset($nis) ? $nis : '' ?>" readonly>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" aria-describedby="emailHelp" name="nama_lengkap" id="nama_lengkap" value="<?= isset($nama) ? $nama : '' ?>" readonly>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Bulan</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($_POST["submit"])) {
                                    foreach ($bulan as $bln) :
                                        $status_pembayaran = in_array($bln, $bulan_dibayar) ? 'Lunas' : 'Belum Lunas';
                            ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $bln; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $status_pembayaran; ?></h6>
                                    </td>
                                </tr>
                            <?php endforeach; }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
