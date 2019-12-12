<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    include 'model/list_poli.php';
    $result = ListPoli($id);
    include 'model/list_puskesmas.php';
    $list = ListPuskesmasByID($id);
    $puskesmas = $list->fetch_assoc();
    $namaPuskesmas = $puskesmas['nama'];
    $alamatPuskesmas = $puskesmas['alamat'] . "<br>" . $puskesmas['telp'];
    date_default_timezone_set('Asia/Jakarta');
} else {
    $message = "Harus pilih puskesmas dulu";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<center> akan redirect dalam beberapa detik <br></center>";
    header("refresh:1; url=login.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="javascript" href="js/bootstrap.js">

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
        text-decoration: none;
    }

    #link_login,
    #link_login a {
        color: white;
    }

    .card {
        margin: 5px auto;
        padding: 10px;
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
    <!-- Bagian Main Content + jumbotron/gambar -->
    <div class="container-fluid my-5 text-center">
        <div style="padding: 20px;">
            <img width="40%" src="img/rs.jpg" alt="uhuy">
        </div>
        <div>
            <h4><?php echo $namaPuskesmas ?></h4>
        </div>
        <div>
            <p><?php echo $alamatPuskesmas ?></p>
        </div>
    </div>
    <!-- space hijau -->
    <nav class="container-fluid" style="height: 100px;background-color: rgb(21, 211, 155);width: 100%;"></nav>
    <!-- space hijau -->
    <div style="margin-left: auto; margin-right: auto;text-align: center;" class="col-9">
        <div class="navbar" style="margin-left: auto; margin-right: auto;">
            <h3 style="margin: auto;font-family: 'Typo Slab';">Pilihan Poli</h3>
        </div>
        <?php
        // include 'model/list_puskesmas.php';
        // $result = ListPuskesmas();
        // $no = 1;
        // for ($i = 0; $i < 5; $i++) {
        ?>
        <div class="row">
            <?php
            for ($i = 0; $i < 2; $i++) {
                for ($j = 0; $j < 2; $j++) {
                    $row = $result->fetch_assoc();
                    ?>
            <div class="card">
                <div style="text-align: center; padding: 5px;" class="card-img-top">
                    <img width="10%" src="img/poli.png" alt="uhuy">
                </div>
                <div class="card-title">
                    <h5>
                        <?php echo $row['nama'] ?>
                    </h5>
                </div>
                <a href="model/antrian_proses.php?idpu=<?php echo $id ?>&idpo=<?php echo $row['id'] ?>&date=<?php echo date("Y-m-d") ?>"
                    class="btn btn-primary">Antri Sekarang</a>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <nav style="background-color: rgb(21, 211, 155); height: 40px; "
        class="navbar navbar-expand-lg my-auto text-center ">
        <div style="margin-left: auto; margin-right: auto; ">
            <p style="text-align: center; "><b>Copyright &copy; Tim Ambyarrr</b></p>
        </div>
    </nav>
    <!-- <script>
        $(document).ready(function() {
            /* This code is executed after the DOM has been completely loaded */

            $('nav a,footer a.up').click(function(e) {

                // If a link has been clicked, scroll the page to the link's hash target:

                $.scrollTo(this.hash || 0, 1500);
                e.preventDefault();
            });

        });
    </script> -->

</body>

</html>