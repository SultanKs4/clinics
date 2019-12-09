<?php
session_start();
if (isset($_SESSION["idLoginAdmin"])) {
    include 'model/detail_admin.php';
    $idAdmin = $_SESSION["idLoginAdmin"];
    $data = DataAdmin($idAdmin);
    $nip = $data['nip'];
    $nama = $data['nama'];
} else {
    $message = "Harus login dulu";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<center> akan redirect dalam beberapa detik <br></center>";
    header("refresh:1; url=login.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.js">

    <style rel="stylesheet" type="text/css">
    .thumbnail {
        position: relative;
    }

    /* .caption {
            position: absolute;
            top: 45%;
            left: 0;
            width: 100%;
        } */

    .caption {
        position: absolute;
        margin: 0;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
        font-family: 'Blockletter';
        font-size: 50px;
        color: aliceblue;
        text-shadow: rgb(21, 211, 155) 3px 5px 10px;
        outline-color: black;
    }

    .penutup {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: 0.4;
    }

    #link_puskesmas ul li {
        margin-right: auto;
        margin-left: auto;
        display: inline-block;
        text-decoration: none;
        font-family: 'Montserrat';
    }

    #link_puskesmas ul li a {
        display: inline-block;
        text-align: center;
        color: black;
        font-family: 'Montserrat';
    }

    #link_puskesmas ul li a:hover {
        display: inline-block;
        text-align: center;
        text-decoration: none;
        color: rgb(21, 211, 155);
        font-family: 'Montserrat';
    }

    .row,
    .col {
        border: 1px solid black;
    }
    </style>

</head>

<body>

    <!-- Header -->
    <nav style="background-color: rgb(21, 211, 155);" class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="index.php" class="btn btn-danger mr-4">Back</a>
            <a class="navbar-brand" href="#"><img src="img/logo_rs.png" width="50px"></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <p style="font-family: 'Blockletter'; font-size: 30px; padding-top: 13px;color: white;"
                        class="navbar-brand ">
                        <i>Malang Fast Clinic
                        </i>
                    </p>
                </li>
                <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li> -->
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
            <div style="padding-left: 40px;padding-top: 15px;">
                <div style="text-align: center;">
                    <a href="dashboard.html"><img src="img/profile_picture.jpg" width="40px"
                            alt="profile_picture"></a><br>
                    <p id="username" style="font-size: smaller;">Username</p>
                </div>
            </div>
        </div>
    </nav>
    <!-- space antara gambar dan about -->
    <nav class="container-fluid text-center" style="padding: 30px;">
        <div class="mx-auto">
            <img class="m-auto" width="150px" src="img/profpic.png" alt="">
        </div>
        <div>
            <h4><?php echo $nama ?></h4>
        </div>
        <div>
            <div>
                <p>ADMIN<br> NIP: <?php echo $nip ?></p>
            </div>
        </div>
        <div class="mx-auto">
            <div>
                <h6>Data Pasien</h6>
            </div>
            <div class="row">
                <div class="col">
                    <p><b>ID</b></p>
                </div>
                <div class="col">
                    <p><b>NIK</b></p>
                </div>
                <div class="col">
                    <p><b>Nama</b></p>
                </div>
                <div class="col">
                    <p><b>BPJS</b></p>
                </div>
                <div class="col">
                    <p><b>tanggalLahir</b></p>
                </div>
                <div class="col">
                    <p><b>jenisKelamin</b></p>
                </div>
                <div class="col">
                    <p><b>No HP</b></p>
                </div>
                <div class="col">
                    <p><b>alamat</b></p>
                </div>
                <div class="col">
                    <p><b>statusPenduduk</b></p>
                </div>
                <div class="col">
                    <p><b>statusPasien</b></p>
                </div>
            </div>
            <?php
            $no = 1;
            include 'model/detail_pasien.php';
            $dataPasien = DataPasien();
            while ($dataBarisPasien = $dataPasien->fetch_assoc()) {
                ?>
            <div class="row">
                <div class="col">
                    <p><?php echo $no ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['nik'] ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['nama'] ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['bpjs'] ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['tanggalLahir'] ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['jenisKelamin'] ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['no_hp'] ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['alamat'] ?></p>
                </div>
                <div class="col">
                    <p><?php echo $dataBarisPasien['status'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="btn btn-success mx-auto">Validate</div>
            </div>
            <?php
                $no++;
            }
            ?>
        </div>
    </nav>
    <!-- Footer -->
    <nav style="background-color: rgb(21, 211, 155); height: 40px;"
        class="navbar navbar-expand-lg my-auto text-center fixed-bottom">
        <div style="margin-left: auto; margin-right: auto;">
            <p style="text-align: center; ">Copyright &copy; Tim Ambyarrr</p>
        </div>
    </nav>
</body>

</html>