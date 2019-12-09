<?php
session_start()
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
                // if () {
                
                ?>
                <a class="btn btn-warning" href="login.php">Login</a> | <a class="btn btn-success"
                    href="register.php">Register</a>
                <!-- }else{
                <?php
                ?>
                <a href="dashboard.html"><img src="img/profile_picture.jpg" width="40px" alt="profile_picture"></a><br>
                    <p id="username" style="font-size: smaller;">Username</p>
            } -->
            </div>
        </div>
    </nav>
    <!-- Bagian Main Content + jumbotron/gambar -->
    <div class="thumbnail text-center">
        <img width="100%" height="400px" src="img/marcelo-leal-k7ll1hpdhFA-unsplash.jpg" alt="Rumah Sakit">
        <div class="penutup"></div>
        <div class="caption">
            <p>Selamat Datang di Website <b style="color: rgb(189, 189, 189);"><i>Malang Fast Clinic</i></b></p>
        </div>
    </div>
    <!-- space antara gambar dan about -->
    <nav class="container-fluid">
        <div class="container-fluid row">
            <div style="color: white;" class="col">____</div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col-8 text-center">
                <h5 style="font-family: 'Typo Slab';">Tentang Malang Fast Clinic</h5>
                <p>Malang Fast Clinic adalah website untuk booking online tiket antrian puskesmas di Kota Malang.
                    <br> Anda tidak perlu lagi mengantri berjam-jam menunggu giliran periksa.
                    <br> Cukup dengan memasukkan data pada website ini kemudian download tiket antrian anda dan anda
                    tinggal menunjukkan tiket ke petugas tanpa perlu di cetak.<br>
                    <br><br>
                    <b><i>Anda puas, kami lebih puas</i></b>
                </p>
            </div>
            <div class="col-4 bg-secondary">
                <div style="padding: 10px; font-size: 14px; color: white;">
                    <h6 style="font-family: 'Typo Slab';"><b>Petunjuk User</b></h6>
                    <ol>
                        <li>Memasukkan username dan password</li>
                        <ul>
                            <li>Jika belum pernah mendaftar, tekan link register kemudian masukkan data yang
                                diperintahkan di halaman register tersebut</li>
                            <li>Jika sudah pernah mendaftar langsung tekan link login</li>
                        </ul>
                        <li>Memilih puskesmas yang terdekat</li>
                        <li>Memilih poli sesuai kebutuhan</li>
                        <li>Struk siap ditunjukkan ke petugas</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid row" style="height: 100px;">
            <div style="color: white; " class="col ">____</div>
            <div class="col "></div>
        </div>
    </nav>
    <!-- space hijau -->
    <nav class="container-fluid" style="height: 100px;background-color: rgb(21, 211, 155);width: 100%;"></nav>
    <!-- space hijau -->
    <nav class="container-fluid">
        <div class="container-fluid row" style="height: 100px;">
            <div style="color: white; " class="col ">____</div>
            <div class="col "></div>
        </div>
        <div style="margin-left: auto; margin-right: auto;text-align: center;" class="col-9">
            <div class="navbar" style="margin-left: auto; margin-right: auto;">
                <h3 style="margin: auto;font-family: 'Typo Slab';">Pilihan Puskesmas</h3>
            </div>
            <?php
            include 'model/list_puskesmas.php';
            $result = ListPuskesmas();
            $no = 1;
            for ($i = 0; $i < 5; $i++) {
                ?>
            <div class="row">
                <?php
                        for ($j = 0; $j < 3; $j++) {
                            $row = $result->fetch_assoc();
                            $subTitle = $row['alamat'] . '<br>' . $row['telp'];
                            ?>
                <div class="col">
                    <div class="card">
                        <div style="text-align: center; padding: 5px;" class="card-img-top">
                            <img width="100%" src="img/rs.jpg" alt="uhuy">
                        </div>
                        <div class="card-title">
                            <h5> <?php echo $row['nama'] ?> </h5>
                        </div>
                        <div class="card-subtitle">
                            <p><?php echo $subTitle ?></p>
                        </div>
                        <a href="detail_puskesmas.php" class="btn btn-primary">Details</a>
                    </div>
                </div>
                <?php
                            $no++;
                        }
                        ?>
            </div>
            <?php
                $no++;
            }
            ?>
            <div class="container-fluid row" style="height: 100px;">
                <div style="color: white; " class="col ">____</div>
                <div class="col "></div>
            </div>
    </nav>
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