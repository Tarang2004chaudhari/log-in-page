<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'logindata/logindata.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sequre_pass = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `userdata1` ( `username`, `email`, `password`, `date`) VALUES ( '$username', '$email', '$sequre_pass',  current_timestamp())";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="log1.css">
    <!-- <script src="log12.js"></script> -->

</head>

<body>

    <div class="box">
        <form action="/loginsystem/login.php" method="POST">
            <div class="form">
                <div class="cont">
                    <h2>log in</h2>
                    <div class="inputbox">
                        <input class="input1" type="text" required="required" name="username">
                        <span class="username">Username</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input class="input1" type="email" required="required" name="email" pattern="(?=.*\d)(?=.*[a-z]).{4,}" title="email is wring">
                        <span class="username">email</span>
                        <i></i>
                    </div>
                    <div class="inputbox" id="password">
                        <input class="input1" id="psw1" type="password" required="required" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" title="Enter at leat 1 lowercase and one upper and sale umber bhi toh dal">
                        <span class="username">password</span>
                        <i></i>
                    </div>
                    <div class="links">
                        <a href="#">forgot password</a>
                        <a href="signin.php">sign in</a>
                    </div>
                    <input class="login" type="submit" value="login">

                </div>
                <div class="msg" id="message">
                    <div class="indi" id="pass12">
                        <div class="id1" id="2ii">v</div>
                        <div class="id1" id="2i">a</div>
                        <div class="id1" id="3i">l</div>
                        <div class="id1" id="4i">i</div>
                        <div class="id1" id="5i">d</div>
                        <!-- <div class="id1" id="6i"></div> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        var myinput = document.getElementById("psw1");
        var small1 = document.getElementById("2i");
        var small = document.getElementById("2ii");
        var capital = document.getElementById("3i");
        var capital1 = document.getElementById("4i");
        var number = document.getElementById("5i");
        // var excit = document.getElementById("6i");

        myinput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myinput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        myinput.onkeyup = function() {
            var lowerCaseLetters = /[a-z]/g;
            if (myinput.value.match(lowerCaseLetters)) {
                if (myinput.value.length > 1) {
                    small1.classList.remove("id1");
                    small1.classList.add("id2");
                }
                small.classList.add("id2");
                small.classList.remove("id1");
            } else {
                if (myinput.value.length == 0) {
                    small1.classList.add("id1");
                    small1.classList.remove("id2");
                }
                small.classList.remove("id2");
                small.classList.add("id1");
            }
            var upperCaseLetters = /[A-Z]/;
            if (myinput.value.match(upperCaseLetters)) {
                if (myinput.value.length > 1) {
                    capital1.classList.remove("id1");
                    capital1.classList.add("id2");
                }
                capital.classList.add("id2");
                capital.classList.remove("id1");
            } else {
                if (myinput.value.length < 2) {
                    capital1.classList.add("id1");
                    capital1.classList.remove("id2");
                }
                capital.classList.remove("id2");
                capital.classList.add("id1");
            }
            var numbers = /[0-9]/g;
            if (myinput.value.match(numbers)) {
                number.classList.remove("id1");
                number.classList.add("id2");
            } else {
                number.classList.remove("id2");
                number.classList.add("id1");
            }
          
        }
        if(myinput.value.match(lowerCaseLetters) && myinput.value.match(upperCaseLetters)){
            myinput.onblur = function() { document.getElementById("message").style.display = "block";
            }
           }
    
        
        
    </script>
</body>

</html>
<!-- style="display: none;" -->