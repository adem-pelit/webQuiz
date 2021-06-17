<html>

<head>
  <meta charset="UTF-8">
  <!--<meta http-equiv="refresh" content="50000; url=index.html">-->
  <script type="text/javascript" src="main.js"></script>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <div class="msg" id="postPanel">
    <h1>
      <?php session_start(); echo $_SESSION["userName"]; ?>
    </h1>
    <form action="destroy.php">
      <button>çıkış yap</button> <!--<button class="btnRight">right</button>-->
      <!--<input class="yuzde" id="buton" type="submit" value="Submit">-->
    </form>
    <form action="ekle.php" method="post">
      <textarea class="yuzde" name="mesaj" rows="3" placeholder="paylaşın!"></textarea><br><br>
      <button class="btn" >Paylaş!</button> <!--<button class="btnRight">right</button>-->
      <!--<input class="yuzde" id="buton" type="submit" value="Submit">-->
    </form>
  </div>
</body>

</html>