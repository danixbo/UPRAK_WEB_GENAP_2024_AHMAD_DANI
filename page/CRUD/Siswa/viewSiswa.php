<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../auth/login.php");
    exit();
}

include '../../../config/database.php';
$db = new database();

$db->koneksi();
$query = "SELECT siswa.nis, siswa.nama_lengkap, siswa.tanggal_lahir, siswa.jenis_kelamin, siswa.alamat, siswa.no_hp, kelas.kode_kelas, spp.nominal FROM siswa JOIN kelas ON siswa.kelas_id = kelas.id JOIN spp ON siswa.spp_id = spp.id";
$hasil = $db->conn->query($query);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../../assets/css/styles.min.css" />
</head>

<body>
    <?php
    include '../../../layout/header.php';
    ?>
    <div class="row d-flex align-items-center justify-content-center"> 
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100 " style="margin-top: 6rem;">
                <div class="card-body p-4 ">
                    <h5 class="card-title fw-semibold mb-4">Data Siswa</h5>
                    <a href="tambahSiswa.php"class="btn btn-primary m-1">Tambah</a>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">NIS</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama Lengkap</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tanggal Lahir</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Alamat</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No HP</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kelas</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">SPP</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($hasil as $data) :
                            ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $data["nis"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["nama_lengkap"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["tanggal_lahir"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["jenis_kelamin"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["alamat"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["no_hp"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["kode_kelas"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["nominal"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><a href="editSiswa.php?nis=<?= $data['nis']; ?>" class="btn btn-primary m-1">Edit</a></h6>
                                    </td>
                                </tr>
                            <?php endforeach; ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
