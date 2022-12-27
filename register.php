<?php
require_once("config.php");

if (isset($_POST['register'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $sql = "INSERT INTO users (name, username, email, password) 
        VALUES (name, username, email, password)";
    $stmt = $db->prepare($sql);


    $params = array(
        "name" => $name,
        "username" => $username,
        "password" => $password,
        "email" => $email
    );

    $saved = $stmt->execute($params);

    if ($saved)
        header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />

</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <p>&larr; <a href="index.php">Pergi ke Halaman Utama</a></p>
            <h4>Bergabunglah bersama ribuan orang lainnya</h4>
            <p>Sudah punya akun? <a href="login.php">Klik di sini</a></p>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">nama lengkap</label>
                    <input class="form-control" type="text" name="name" placeholder="Nama Lengkap Anda">
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input class="form-control" type="text" name="name" placeholder="Nama Anda" />
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email Anda"/>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input class="form-control" type="password" name="password" placeholder="Isikan password anda">
                </div>

                <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar">

            </form>
        </div>
        <div class="col-md-6">
                <img class="img img-responsive" src="img/connect.png">
        </div>
    </div>
</div>    
</body>
</html>