<?php include "connect.php";

session_start();

/*
$_SESSION["userName"] = "adem";
$_SESSION["password"] = "123456";

$_SESSION["userName"] = "ThousendAli";
$_SESSION["password"] = "asdasd";
*/

/*
$_SESSION["userName"] = "hazinson12";
$_SESSION["password"] = "bcdbcd";

$_COOKIE["userName"] = "hazinson12";
$_COOKIE["password"] = "bcdbcd";
*/
/*
$_SESSION["userName"] = null;
$_SESSION["password"] = null;
*/

$isLogin = false;
if(isset($_SESSION["userName"]) &&  isset($_SESSION["password"])){
    $sql = "SELECT * FROM userInfo where userName=\"".$_SESSION['userName']."\" AND pass=\"". $_SESSION['password']."\" LIMIT 1;";
    $rowNames = array();
    $result = $conn->query($sql);
    if ($result = $conn->query($sql)) {
        while ($finfo = $result->fetch_field()) {
            array_push($rowNames, $finfo->name);
        }
    }
    if ($result = $conn->query($sql)) {
        //echo "[<br />\n";
        while ($row = $result->fetch_assoc()) $isLogin = true;
    }
}

if (!$isLogin) echo "\"access denied!\"";
else {

    $sql = "SELECT * FROM pat";
    $rowNames = array();
    if ($result = $conn->query($sql)) {
        while ($finfo = $result->fetch_field()) {
            array_push($rowNames, $finfo->name);
        }
    }

    $toJson = array();

    if ($result = $conn->query($sql)) {
        //echo "[<br />\n";
        while ($row = $result->fetch_assoc()) {
            $myRow = array();
            //echo "{<br />";
            for ($i = 0; $i < count($rowNames); $i++)  $myRow[$rowNames[$i]] = $row[$rowNames[$i]];  //echo $rowNames[$i] . ":'" . $row[$rowNames[$i]] . "',<br />\n";
            //echo "},<br />\n";
            array_push($toJson, $myRow);
        }
        //echo "]<br />\n";
    }

    echo json_encode($toJson);
}
$conn->close();
?>