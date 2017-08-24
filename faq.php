<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="description" content="Hällen Gaming är en ideell förening som spelar rollspel, med fokus på DnD">
    <meta name="keywords" content="DnD,Rollspelsförening,ungdomsförening,kulturaktivitet,rollspel">
    <meta name="author" content="Hällen Gaming Webbutskott">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hällens Gaming</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/H1.png">
    <!--<link rel="apple-touch-icon-precomposed" href="touch-icon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="touch-icon-114.png">-->
    <link href="css/main.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/faq.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="viewport" class="">
      <div id="viewport-content">
        <div id="page" class="page homepage">
          <!-- HELP ME!-->

          <!-- HEADER -->
          <div class="region region-header">
            <div id="block-dx1-common-blocks-block-dx1-common-blocks-header" class="block block-dx1-common-blocks">
              <div class="content">
                <header>
                  <div class="page-width">
                    <a href="index.php" class="home">Hällen Gaming</a>


                    <nav id="menu">
                            <p class="menu-bar"><span id="menu-button"></span><span class="label">Menu</span></p>
                      <ul>
                        <li id="mn_new-to-dd" class="has-children expanded ">
                          <span class="accordion-icon"><span></span></span>
                          <a href="kalender.php">KALENDER</a></li>
                        <li id="mn_product" class="has-children  "><span class="accordion-icon"><span></span></span>
                          <a href="om.php">OM</a></li>
                        <li id="mn_play-events" class="has-children  ">
                          <span class="accordion-icon"><span></span></span>
                          <a href="vart.php">VART</a></li><li id="mn_articles" class="has-children  ">
                        <span class="accordion-icon"><span></span></span>
                        <a href="avgift.php">AVGIFT</a></li><li id="mn_community" class="has-children  ">
                        <span class="accordion-icon"><span></span></span>
                        <a href="kampanjer.php">KAMPANJER</a></li><li id="mn_community" class="has-children  ">
                        <span class="accordion-icon"><span></span></span>
                        <a href="faq.php">FAQ</a></li><li id="mn_-community">
                        <a href="loggain.php">LOGGA IN</a></li></ul>
                    </nav>

                  </div>
                  <hr>
                </header>
              </div>
            </div>
          </div>
          <div class="tabs"></div>

          <h1 id="liten" style="text-align: center;margin: 10px;">
          <a href="kalender.php">KALENDER</a><br>
          <a href="om.php">OM</a><br>
          <a href="vart.php">VART</a><br>
          <a href="avgift.php">AVGIFT</a><br>
          <a href="kampanjer.php">KAMPANJER</a><br>
          <a href="faq.php">FAQ</a><br>
          <a href="loggain.php">LOGGA IN</a><br>
          </h1>
        </div>
      </div>

      <div id="kropp">
        <h1 style="margin-bottom: 0;">Frequently Asked Questions:</h1>
        <br>

        <?php
          include("loggain/config.php");
        ?>

        <?php
        		if ($db->connect_error) {
             die("Connection failed: " . $db->connect_error);
        }
        echo "<nav id='table' role='navigation' class='table-of-contents'>
      <h2 style='margin-bottom: 2;
                  font-size:220%;''>On this page:</h2>";
        $sql = "SELECT question, answer, user, reg_time, id FROM faq";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             echo "<ul style='list-style-type:disc'>";
             while($row = $result->fetch_assoc()) {
                 echo "<li><a href=faq.php#" . $row["id"] . ">" . $row["question"] . "</a></li>";
             }
             echo "</ul>";
           } else {
                echo "<h2>Ingen har frågat något!</h2>";
           }
          echo "</nav>";?>

<?php
//include("loggain/config.php");
 if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT question, answer, user, reg_time, id FROM faq";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<button id=". $row["id"] . " class='accordion'><b>". $row["question"] . "</b></button>
            <div class='panel'>
            <p><i style='font-size:90%;'>" . $row["answer"] . "</i><br></p>
            <p><i style='font-size: 1rem;'>". $row["user"]. " - " . $row["reg_time"] . ";</i></p>
      </div>";
  }
} else {
  echo "<h2>Ingen har frågat något!</h2>";
}

$db->close();
?>

      </div>
    </div>
    <script src="js/FAQ.js"></script>
  </body>
</html>