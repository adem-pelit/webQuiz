<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="msg">
        <form action="register.php" method="post">
            <label for="fname">userName:</label><br>
            <input class="girdi" name="userName"><br />
            <label for="fname">password:</label><br>
            <input class="girdi" name="password"><br />
            <input class="btn" id="buton" type="submit" value="Submit">
        </form>
        <?php include "connect.php";
        session_start();
        if (isset($_POST["userName"]) && isset($_POST["password"])) {
            $sql = "INSERT INTO userInfo(userName, pass) VALUES(\"" . $_POST["userName"] . "\",\"" . $_POST["password"] . "\");";
            if ($result = $conn->query($sql)) {
                echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
                header("login.php");
                exit();
            } else echo $_POST["userName"] . " kullanıcı adı daha önce alınmış olabilir";

        }
        ?>
</body>

</html>