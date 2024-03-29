<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <script src="jquery-3.4.1.js"></script>

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
                <a class="btn btn-warning" href="login.php">Login</a> <a class="btn btn-outline-danger"
                    href="index.php">Back</a>
            </div>
        </div>
    </nav>
    <!-- Bagian Form -->
    <div class="container-fluid">
        <div class=" container-fluid row ">
            <div style=" color: white; " class=" col ">____</div>
            <div class=" col "></div>
        </div>
        <form action="model/register_proses.php" method="POST">
            <div class="form-group">
                <label for="exampleInputFullName1">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="inputFullName1" aria-describedby="fullnameHelp"
                    placeholder="Masukkan Nama Lengkap" required>
                <small id="fullnameHelp" class="form-text text-muted">Masukkan Nama Lengkap</small>
            </div>
            <div class="form-group">
                <label for="exampleInputKTP1">NIK</label>
                <input type="text" name="nik" class="form-control" id="inputNoKTP1" placeholder="Nomor KTP" required>
                <small id="ktpHelp" class="form-text text-muted">Masukkan Nomor KTP</small>
            </div>
            <div class="form-group">
                <label for="exampleInputTTL1">Tanggal Lahir</label>
                <input type="date" name="tanggal" class="form-control" id="inputTTL1" placeholder="Tanggal Lahir"
                    required>
                <small id="ttlHelp" class="form-text text-muted">Masukkan Tanggal Lahir</small>
            </div>
            <div class="form-group">
                <label for="inputJK">Jenis Kelamin</label><br>
                <label class="radio-inline"><input type="radio" name="jenisKelamin" value="1">Laki-Laki</label>
                <label class="radio-inline"><input type="radio" name="jenisKelamin" value="2">Wanita</label>
                <small id="bpjsHelp" class="form-text text-muted">Masukkan Jenis Kelamin</small>
            </div>
            <div class="form-group">
                <label for="exampleInputBPJS1">Nomor BPJS</label>
                <input type="text" name="bpjs" class="form-control" id="inputBPJS1" placeholder="Nomor BPJS" required>
                <small id="bpjsHelp" class="form-text text-muted">Masukkan Nomor BPJS</small>
            </div>
            <div class="form-group">
                <label for="exampleInputNoHP1">Nomor HP</label>
                <input type="text" name="noHp" class="form-control" id="inputBPJS1" placeholder="Nomor HP" required>
                <small id="noHpHelp" class="form-text text-muted">Masukkan Nomor HP</small>
            </div>
            <div class="form-group">
                <label for="exampleInputAlamat1">Alamat</label>
                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                <small id="alamatHelp" class="form-text text-muted">Masukkan Alamat Rumah</small>
            </div>
            <!-- <div class="form-group">
            <label for="exampleInputUsername1">Username Baru</label>
            <input type="text" class="form-control" id="inputUsername1" placeholder="Username" required>
        </div> -->
            <div class="form-group">
                <label for="exampleInputPassword1">Password Baru</label>
                <input type="password" class="form-control" id="inputPassword1" name="password"
                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Konfirmasi Password</label>
                <input type="password" class="form-control" id="inputPassword2"
                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required oninput="check(this)">
                <script language='javascript' type='text/javascript'>
                function check(input) {
                    if (input.value != document.getElementById('inputPassword1').value) {
                        input.setCustomValidity('Password Must be Matching.');
                    } else {
                        input.setCustomValidity('');
                    }
                }
                </script>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <div class="container-fluid row ">
            <div style="color: white; " class="col ">____</div>
            <div class="col "></div>
        </div>
    </div>
    <!-- Footer -->
    <footer style="background-color: rgb(21, 211, 155); height: 40px;"
        class="navbar navbar-expand-lg my-auto text-center">
        <div style="margin-left: auto; margin-right: auto;">
            <p style="text-align: center; "><b>Copyright &copy; Tim Ambyarrr</b></p>
        </div>
    </footer>






</body>

</html>