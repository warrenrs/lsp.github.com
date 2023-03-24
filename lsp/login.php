<?php
include("inc_koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if($username == '' or $password == "") {
        $err .= "<li>Silahkan Masukkan Username Dan Password</li>";
    }
    if(empty($err)){
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if($r1['password'] != md5($password)) {
            $err .= "<li>Akun Tidak Tersedia</li>";
        }
    }
    if(empty($err)){
        $_SESSION['admin_username'] = $username;
        header("location:admin_depan.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="app">
        <h1>Halaman Login</h1>
        <?php
        if($err){
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="post">
            <input type="text" value="<?php echo $username ?>" name="username" class="input" placeholder="Masukkan Username" /><br /><br />
            <input type="password" name="password" class="input" placeholder="Masukkan Password" /><br /><br />
            <input type="submit" name="login" value="Login" />
        </form>
    </div>
</body>

</html>