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
                <a class="btn btn-success" href="register.php">Register</a> | <a href="index.html"
                    class="btn btn-outline-danger">Back</a>
            </div>
        </div>
    </nav>
    <!-- Bagian Form -->
    <div class="container-fluid">
        <div class="container-fluid row ">
            <div style="color: white; " class="col ">____</div>
            <div class="col "></div>
        </div>
        <form action="model/login_proses.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="inputUsername1" name="username"
                    aria-describedby="usernameHelp" placeholder="Masukkan username" required>
                <small id="usernameHelp" class="form-text text-muted">Masukkan username yang telah anda buat</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="password"
                    required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">Simpan password</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="container-fluid row ">
            <div style="color: white; " class="col ">____</div>
            <div class="col "></div>
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