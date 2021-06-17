<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="main.css">
</head>

<body>
<div class="msg">
    <form action="login.php" method="post">
      <label for="fname">userName:</label><br>
      <input class="girdi" name="userName"><br />
      <label for="fname">password:</label><br>
      <input class="girdi" name="password"><br />
      <input class="btn" id="buton" type="submit" value="Submit">
    </form>
    <?php
    
    include "connect.php";
    session_start();
    login();
    function login(){
      if(isset($_GET["error"]))
      if($_GET["error"] == "accessDenied"){
        echo "<p>girilen bilgiler hatalıdır!</p>";
        exit();
      }
      if(isset($_POST["userName"]) && isset($_POST["password"])){
        $_SESSION["userName"] = $_POST["userName"];
        $_SESSION["password"] = $_POST["password"];
        
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
        header("index.php");
        exit();
      }
      else echo "userName AND password aren't izzet";
      
    }
    ?>
</body>
</html>