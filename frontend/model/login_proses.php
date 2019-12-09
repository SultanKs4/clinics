<?php
session_start();

function LoginCheckQuery(String $username, String $password)
{
    include 'connection.php';
    $query = "SELECT nik, dataPasien.nama AS namaPasien , dataPasien.password AS passwordPasien, nip, dataAdmin.nama as namaAdmin, dataAdmin.password AS passwordAdmin FROM dataPasien CROSS JOIN dataAdmin WHERE nik = '$username' AND dataPasien.password = '$password' OR nip = '$username' AND dataAdmin.password = '$password'";
    $result = $connect->query($query);

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
            header("location:../dashboard.html");
            echo 'login berhasil admin';
        } elseif ($row['nik'] == $username) {
            $_SESSION['username'] = $row['nip'];
            $_SESSION['name'] = $row['namaAdmin'];
            header("location:../index.html");
            echo 'login berhasil pasien';
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
    $message = "Can't direct inject script";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location : " . $_SERVER['HTTP_REFERER']);
}