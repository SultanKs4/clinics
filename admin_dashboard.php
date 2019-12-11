<?php
session_start();
if (isset($_SESSION["idLoginAdmin"])) {
    include 'model/detail_admin.php';
    $idAdmin = $_SESSION["idLoginAdmin"];
    $data = DataAdmin($idAdmin);
    $nip = $data['nip'];
    $nama = $data['nama'];
} elseif (isset($_SESSION["idLoginPasien"])) {
    $message = "Anda admin";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<center> akan redirect dalam beberapa detik <br></center>";
    header("refresh:1; url=user_dashboard.php");
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
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        padding: 5px;
        table-layout: fixed;
    }
    td, th {
        border: 1px solid black;

        padding: 5px;
    }
    th{
        text-align: center;
    }
    
    /* tr:nth-child(even) {
        background-color:rgb(21, 200, 100);
        color: black;
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
    tr.bg-warning td, tr.bg-secondary td{
        padding : 20px;
    }
    td {
        word-break: break-all;
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
                <?php
                if (isset($_SESSION["idLoginPasien"]) || isset($_SESSION["idLoginAdmin"])) {
                    $username = $_SESSION['name'];
                ?>
                <div class="row">
                    <!-- kolom logout -->
                    <div class="col">
                    <a href="model/logout_proses.php" class="btn btn-secondary">Logout</a>
                    </div>
                    <!-- kolom profil -->
                    <div class="col">
                        <?php
                        if (isset($_SESSION["idLoginPasien"])) {
                            ?>
                        <a href="user_dashboard.php"><img src="img/profile_picture.jpg" width="40px"alt="profile_picture"></a><br>
                        <?php
                        }else if(isset($_SESSION["idLoginAdmin"])){
                        ?>
                        <a href="admin_dashboard.php"><img src="img/profile_picture.jpg" width="40px"alt="profile_picture"></a><br>
                        <?php
                        }
                        ?>        
                        <p id="username" style="font-size: smaller;">
                            <?php
                            echo "$username";
                            ?>
                        </p>
                    </div>
                </div>
                <?php
                }else{
                    
                ?>
            
                    <a class="btn btn-warning" href="login.php">Login</a> | <a class="btn btn-success"
                    href="register.php">Register</a>
            <?php 
            }
            ?>
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
            <div>
            <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    NIK
                    </th>
                <th>
                    Nama
                    </th>
                <th>
                    BPJS
                    </th>
                <th>
                    Tanggal Lahir
                    </th>
                <th>
                    Jenis Kelamin
                    </th>
                <th>
                    No HP
                    </th>
                <th>
                    Alamat
                    </th>
                <th>
                    Status Pasien
                    </th>
                <th>
                    Validasi
                    </th>
                <th>
                    Hapus User
                    </th>
            </tr>
            </table>
                </div>
            <?php
            $no = 1;
            include 'model/detail_pasien.php';
            $dataPasien = DataPasien();
            while ($dataBarisPasien = $dataPasien->fetch_assoc()) {
                ?>
            <div>
            <table>
            <tr>
                <td>
                    <?php echo $no ?>
                </td>
                <td>
                    <?php echo $dataBarisPasien['nik'] ?>
                    </td>
                <td>
                    <?php echo $dataBarisPasien['nama'] ?>
                    </td>
                <td>
                    <?php echo $dataBarisPasien['bpjs'] ?>
                    </td>
                <td>
                    <?php echo $dataBarisPasien['tanggalLahir'] ?>
                    </td>
                <td>
                    <?php echo $dataBarisPasien['jenisKelamin'] ?>
                    </td>
                <td>
                    <?php echo $dataBarisPasien['no_hp'] ?>
                    </td>
                <td>
                    <?php echo $dataBarisPasien['alamat'] ?>
                    </td>
                <td>
                    <?php echo $dataBarisPasien['status'] ?>
                    </td>
                <div>
                <td>
                    <div class="btn btn-success mx-auto;">Validate</div>
                </td>
                <td>
                    <div class="btn btn-danger mx-auto;">Delete</div>
                </td>
                </div>
            </tr>
            </table>
                </div>
            <?php
                $no++;
            }
            ?>
        </div>
    </nav>
    <!-- space hijau -->
    <nav class="container-fluid" style="height: 50px;background-color: rgb(21, 211, 155);width: 100%;"></nav>
    <!-- space hijau -->
        <div class="container-fluid my-auto" style="padding: 90px;">
        <!-- tabel update puskesmas -->
        <div class="text-center m-auto">
            <p><b>Tambah Puskesmas</b></p>
        </div>
        <div>
            <table style="background-color: white; text-align: center;">
                <tr>
                    <th>
                    Nama Puskesmas
                    </th>
                    <th>
                    Jenis Puskesmas
                    </th>
                    <th>
                    Nomor Telepon
                    </th>
                    <th>
                    Alamat
                    </th>
                    <th>
                    Tambah
                    </th>
                </tr>
                <tr class="bg-secondary">
                    <form action="#" method="POST">
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputClinicName1" name="nama_puskesmas"
                                    aria-describedby="clinicNameHelp" placeholder="Nama Puskesmas">
                            </div>
                        </td>
                        <td>
                        <div class="form-group">
                            <select class="form-control" id="pilih_jenis_puskesmas1" name="select_puskesmas">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputClinicPhone1" name="telepon_puskesmas"
                                    aria-describedby="clinicPhoneHelp" placeholder="Nomor Telepon">
                            </div>
                        </td>
                        <td>
                        <div class="form-group">
                        <textarea class="form-control" name="deskripsi_puskesmas" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </td>
                        <td>
                        <button name="submit" type="submit" class="btn btn-primary">Tambah Data</button>
                        </td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
    <!-- Footer -->
    <nav style="background-color: rgb(21, 211, 155); height: 40px;"
        class="navbar navbar-expand-lg my-auto text-center">
        <div style="margin-left: auto; margin-right: auto;">
            <p style="text-align: center; ">Copyright &copy; Tim Ambyarrr</p>
        </div>
    </nav>
</body>

</html>