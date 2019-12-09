<?php
session_start();

function LoginCheckQuery(String $username, String $password)
{
    include 'connection.php';
    $query = "SELECT dataPasien.id AS idPasien, nik, dataPasien.nama AS namaPasien , dataPasien.password AS passwordPasien, dataAdmin.id AS idAdmin, nip, dataAdmin.nama as namaAdmin, dataAdmin.password AS passwordAdmin FROM dataPasien CROSS JOIN dataAdmin WHERE nik = '$username' AND dataPasien.password = '$password' OR nip = '$username' AND dataAdmin.password = '$password'";
    $result = $connect->query($query);

    $connect->close();
    FinalCheck($result, $username);
}

function FinalCheck($result, $username)
{
    if ($result->num_rows <= 0) {
        $message = "Username dan Password salah.\\nHarap coba lagi.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<center> akan redirect dalam beberapa detik <br></center>";
        header("refresh:2; url=../login.php");
        echo "<center>jika tidak terbuka secara otomatis klik ";
        echo '<a href="../login.php">LINK</a><br></center>';
    } else {
        $row = $result->fetch_assoc();
        if ($row['nip'] == $username) {
            $_SESSION['username'] = $row['nip'];
            $_SESSION['name'] = $row['namaAdmin'];
            $_SESSION['idLogin'] = $row['idAdmin'];
            header("location:../admin_dashboard.php");
        } elseif ($row['nik'] == $username) {
            $_SESSION['username'] = $row['nik'];
            $_SESSION['name'] = $row['namaPasien'];
            $_SESSION['idLogin'] = $row['idPasien'];
            header("location:../index.php");
        }
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    LoginCheckQuery($username, $password);
    $simpan = $_POST['remember'];
    echo $simpan;
} else {
    echo '<script>window.history.back()</script>';
}