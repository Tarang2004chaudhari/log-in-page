<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'logindata/logindata.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password2 = $_POST["password"];
    echo var_dump($password2);
    $npass = password_hash($password2, PASSWORD_DEFAULT);
    $login = false;

    $sql = "SELECT * FROM `userdata1`where username='$username'";
    $result = mysqli_query($conn, $sql);
    $n = mysqli_num_rows($result);
    if ($n >= 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password2, $row['password'])) {
                $login = true;
                session_start();
                header("location:/web1/fooddelivey/index.html");
            } else {
                header("location:login.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sig-in</title>
    <link rel="stylesheet" href="log1.css">
</head>

<body>
    <div class="box">
        <form action="/loginsystem/signin.php" method="POST">
            <div class="form">
                <div class="cont">
                    <h2>sign in</h2>
                    <div class="inputbox">
                        <input class="input1" type="text" required="required" name="username">
                        <span class="username">Username</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input class="input1" type="email" required="required" name="email">
                        <span class="username">email</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input class="input1" type="password" required="required" name="password">
                        <span class="username">password</span>
                        <i></i>
                    </div>
                    <input class="lognin" type="submit" value="signin">
                </div>
            </div>
        </form>
    </div>
</body>

</html>