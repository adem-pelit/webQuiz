<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="0; url=index.php">
  <script type="text/javascript" src="main.js"></script>
  <link rel="stylesheet" href="main.css">
</head>

<body>
<?php include "connect.php";
if(strlen($_POST["mesaj"]) == 0 || strlen($_POST["mesaj"]) >= 280) exit;
session_start();
$isLogin = false;
if(isset($_SESSION["userName"]) &&  isset($_SESSION["password"])){
    //echo $_SESSION["userName"] . " " . $_SESSION["password"] . " hoşgeldin!<br />\n";
    $sql = "SELECT * FROM userInfo where userName=\"".$_SESSION['userName']."\" AND pass=\"". $_SESSION['password']."\" LIMIT 1;";
    $rowNames = array();
    $result = $conn->query($sql);
    if ($result = $conn->query($sql)) $isLogin = true;  
}

$isUpdated = false;

if (!$isLogin) echo "\"access denied!\"";
else {
    $sql = "INSERT INTO pat(id,text,userName) VALUES(\"".uniqid()."\",\"". $_POST["mesaj"] ."\",\"" . $_SESSION["userName"] . "\")";
    if ($result = $conn->query($sql)) $isUpdated = true;  
}
$conn->close();
?>

</body>

</html>