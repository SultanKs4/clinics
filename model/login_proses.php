<?php
session_start();

function LoginCheckQuery(String $username2, String $password2)
{
    include 'connection.php';
    $query = "SELECT dataPasien.id AS idPasien, nik, dataPasien.nama AS namaPasien , dataPasien.password AS passwordPasien, dataAdmin.id AS idAdmin, nip, dataAdmin.nama as namaAdmin, dataAdmin.password AS passwordAdmin FROM dataPasien CROSS JOIN dataAdmin WHERE nik = '$username2' AND dataPasien.password = '$password2' OR nip = '$username2' AND dataAdmin.password = '$password2'";
    $result = $connect->query($query);

    $connect->close();
    FinalCheck($result, $username2);
}

function FinalCheck($result, $username2)
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
        if ($row['nip'] == $username2) {
            $_SESSION["username"] = $row['nip'];
            $_SESSION["name"] = $row['namaAdmin'];
            $_SESSION["idLoginAdmin"] = $row['idAdmin'];
            header("location:../admin_dashboard.php");
        } elseif ($row['nik'] == $username2) {
            $_SESSION["username"] = $row['nik'];
            $_SESSION["name"] = $row['namaPasien'];
            $_SESSION["idLoginPasien"] = $row['idPasien'];
            header("location:../index.php");
        }
    }
}

if (isset($_POST['submit'])) {
    $username2 = $_POST['username'];
    $password2 = md5($_POST['password']);
    LoginCheckQuery($username2, $password2);
    $simpan = $_POST['remember'];
    echo $simpan;
} else {
    echo '<script>window.history.back()</script>';
}