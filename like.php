<?php include "connect.php";

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
    $sql = "UPDATE pat SET likes = likes + 1 WHERE id=\"" . $_POST["id"] . "\"";
    if ($result = $conn->query($sql)) $isUpdated = true;  
    if($isUpdated){
        $sql = "SELECT likes FROM pat WHERE id=\"" . $_GET["id"] . "\" LIMIT 1;";
        if ($result = $conn->query($sql)){
            while($row = $result->fetch_assoc()){
                echo $row["likes"];
            }
        }
    }
        
    
}
$conn->close();
