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
  </head>
  <body>

    <div id="viewport" class="">
      <div id="viewport-content">
        <div id="page" class="page homepage">

          <!-- HEADER -->
          <div class="region region-header">
            <div id="block-dx1-common-blocks-block-dx1-common-blocks-header" class="block block-dx1-common-blocks">
              <div class="content">
                <header>
                  <div class="page-width">
                    <a href="#" class="home">Hällen Gaming</a>


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
                        <a href="kampanjer.php">KAMPANJER</a></li><li id="mn_-community">
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
          <a href="loggain.php">LOGGA IN</a><br>
          </h1>
        </div>
      </div>

      <div id="kropp">
        <h1>
					VARJE LÖRDAG
				</h1>
				<h1>
					14-18
				</h1>
				<h1>
					I SPÅNGA FOLKAN
				</h1>
				<a href="https://forening.sverok.se/hallengaming/" style="
    color: white;
    text-decoration: underline;
    font-size: 2rem;
">Vår Sverok sida (här kan du bli medlem)</a>

				<br /><br />

				<h1>
					Kontakt
				</h1>
				<p>
					 Om du har frågor kan du ringa <a href="tel:0707632069" style="color: white; text-decoration: underline;">0707632069</a>,
					eller maila till styrelsegruppens mail som är
					<a href="mailto:hgstyrelse@freespeed.nu" style="color: white; text-decoration: underline;">hgstyrelse@freespeed.nu</a>
				</p>


<hr style="
    display: block;
    margin-bottom: 10px;
">
  <h1 style="margin-bottom: 0;">Nyheter</h1>
	<?php
	 include("loggain/config.php");

		if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT datum, nyhettext, user, reg_date FROM Nyheter";
$result = $db->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<h2><i style='font-size: 1rem;'>". $row["user"]. " - " . $row["reg_date"] . ";</i><br /><b>". $row["datum"]. "</b> " . $row["nyhettext"] . "</h2>";
     }
} else {
     echo "<h2>Inga nyheter!</h2>";
}

$db->close();
	?>

      </div>

    </div>


  </body>
</html>
