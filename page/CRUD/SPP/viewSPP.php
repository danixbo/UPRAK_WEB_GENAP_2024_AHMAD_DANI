<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../auth/login.php");
    exit();
}

include '../../../config/database.php';
$db = new database();
    
$db->koneksi();
$query = "SELECT * FROM spp";
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
                    <h5 class="card-title fw-semibold mb-4">Data SPP</h5>
                    <a href="tambahSPP.php"class="btn btn-primary m-1">Tambah</a>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tahun</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nominal</h6>
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
                                        <h6 class="fw-semibold mb-0"><?= $data["id"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["tahun"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?= $data["nominal"]; ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><a href="editSPP.php?id=<?php echo $data['id']; ?>" class="btn btn-primary m-1">Edit</a></h6>
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
