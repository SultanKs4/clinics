<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <script src="js/jquery-3.4.1.js"></script>

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

    #link_login a:hover {
        color: black;
    }

    #link_login,
    #link_login a {
        color: white;
    }

    .table {
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
        width: 30%;
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
            <div id="link_login" style="padding-left: 40px;font-family: 'Monteserrat';">
                <?php
                if (isset($_SESSION["idLoginPasien"]) || isset($_SESSION["idLoginAdmin"])) {
                    $username = $_SESSION['name'];
                    ?>
                <div class="row m-auto">
                    <!-- kolom logout -->
                    <div class="col">
                        <a href="model/logout_proses.php" class="btn btn-secondary">Logout</a>
                    </div>
                    <!-- kolom profil -->
                    <div class="col">
                        <?php
                                if (isset($_SESSION["idLoginPasien"])) {
                                    ?>
                        <a href="user_dashboard.php"><img src="img/profile_picture.jpg" width="40px"
                                alt="profile_picture"></a><br>
                        <?php
                                } else if (isset($_SESSION["idLoginAdmin"])) {
                                    ?>
                        <a href="admin_dashboard.php"><img src="img/profile_picture.jpg" width="40px"
                                alt="profile_picture"></a><br>
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
                } else {
                    ?>
                <a class="btn btn-warning" href="login.php">Login</a> | <a class="btn btn-success"
                    href="register.php">Register</a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- Tampil Struk -->
    <div class="container-fluid">
        <!-- kotakan -->
        <div style="margin: 90px auto; border: 1px solid black; width: 50%;">
            <!-- judul struk -->
            <div class="text-center">
                <p><b>Struk Antri Puskesmas Terbaru</b></p>
            </div>
            <?php
            include 'model/antrian_proses.php';
            $result = Struk();
            $row = $result->fetch_assoc();
            ?>
            <!-- nomor antrian -->
            <div class="mx-auto text-center">
                <h6>Nomor Antrian</h6>
                <h4><?php echo $row['antrian'] ?></h4>
            </div>
            <div class="table">
                <div class="row">
                    <div class="col">
                        <p><b>Nama Puskesmas</b></p>
                    </div>
                    <div class="col">
                        <p><?php echo $row['namaPus'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b>Nama Poli</b></p>
                    </div>
                    <div class="col">
                        <p><?php echo $row['namaPol'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b>Nama Pasien</b></p>
                    </div>
                    <div class="col">
                        <p><?php echo $row['namaPas'] ?></p>
                    </div>
                </div>
                <p>Dimohon Hadir pada jam kerja di tanggal <?php echo $row['tanggal'] ?></p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer style="background-color: rgb(21, 211, 155); height: 40px;"
        class="navbar navbar-expand-lg my-auto text-center fixed-bottom">
        <div style="margin-left: auto; margin-right: auto;">
            <p style="text-align: center; "><b>Copyright &copy; Tim Ambyarrr</b></p>
        </div>
    </footer>
</body>

</html>