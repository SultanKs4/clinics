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
    </style>

</head>

<body>

    <!-- Header -->
    <nav style="background-color: rgb(21, 211, 155);" class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="#"><img src="img/logo_rs.png" width="50px"></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <p style="font-family: 'Blockletter'; font-size: 30px; padding-top: 13px;color: white;" class="navbar-brand ">
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
                    <a href="dashboard.html"><img src="img/profile_picture.jpg" width="40px" alt="profile_picture"></a><br>
                    <p id="username" style="font-size: smaller;">Username</p>
                </div>
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
                    <br> Cukup dengan memasukkan data pada website ini kemudian download tiket antrian anda dan anda tinggal menunjukkan tiket ke petugas tanpa perlu di cetak.<br>
                    <br><br>
                    <b><i>Anda puas, kami lebih puas</i></b>
                </p>
            </div>
            <div class="col-4 bg-secondary">
                <h4 style="font-family: 'Typo Slab';">Petunjuk User</h4>
                <ol>
                    <li>Mengisikan data pada halaman register</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid row">
            <div style="color: white;" class="col">____</div>
            <div class="col"></div>
        </div>
        <div class="container-fluid row">
            <div id="link_puskesmas" class="col" style="border: 4px black solid; text-align: center;">
                <ul>
                    <li><a href="puskesmas.html">Memilih puskesmas</a></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Footer -->
    <nav style="background-color: rgb(21, 211, 155); height: 40px;" class="navbar navbar-expand-lg my-auto text-center">
        <div style="margin-left: auto; margin-right: auto;">
            <p style="text-align: center; ">Copyright &copy; Tim Ambyarrr</p>
        </div>
    </nav>





    <script>
        $(document).ready(function() {
            /* This code is executed after the DOM has been completely loaded */

            $('nav a,footer a.up').click(function(e) {

                // If a link has been clicked, scroll the page to the link's hash target:

                $.scrollTo(this.hash || 0, 1500);
                e.preventDefault();
            });

        });
    </script>
</body>

</html>