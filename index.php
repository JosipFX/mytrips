<!DOCTYPE html>
<html>

<head>
    <title>MyTrips - Croatia</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/styles.css">
    <script>
        // client side validation
        function isFormValid(){
            // get all values first
            let place = document.getElementById("place").value.trim();
            let description = document.getElementById("description").value.trim();
            let url = document.getElementById("url").value.toString();
            let firstname = document.getElementById("firstname").value.trim();
            let lastname = document.getElementById("lastname").value.trim();
            let email = document.getElementById("email").value.trim();

            // check if a required field is empty
            if(place == "" || description == "" || url.toString() == "" || firstname == ""){
                alert("Mindestens ein benötigtes Feld wurde leer gelassen!");
                return false;
            }

            // check if URL is valid and ends with .jpg
            if(!(url.match(/http.*\.jpg$/))){
                alert("URL must start with http and must end with .jpg");
                return false;
            }

            return true;
        }

    </script>
</head>

<body class="background">
    
    <header>        
        <!-- title -->
        <section class="title w3-padding-large w3-blue w3-center w3-grayscale">
            <h1 class="title">My Trips - Croatia</h1>
        </section>
        
        <section>
                <nav class="w3-bar w3-black ">
                    <a class="w3-button w3-bar-item w3-mobile w3-red" href="index.php">Home</a>
                    <a class="w3-button w3-bar-item w3-mobile" href="#information">Information</a>
                    <a class="w3-button w3-bar-item w3-mobile" href="#canvas">Canvas</a>
                    <a class="w3-button w3-bar-item w3-mobile" href="#formular">Formular</a>
                </nav>
        </section>

        
    </header>

    <main>

        <?php
            if(isset($_COOKIE['firstname'])){
                echo '<section class="w3-container w3-panel w3-green rounded-borders">
                            <h3>Willkommen zurück ' . $_COOKIE['firstname'] . '!</h3>
                        </section>';
            }
        ?>


        <!-- information -->
        <section id="information" class="w3-container w3-white w3-margin-bottom w3-margin-top rounded-borders">
            <div class="w3-row-padding">
                <div class="w3-col m6 l6 w3-center">
                    <img class="images" src="img/einfuehrung.PNG" width="100%" height="100%">
                </div>
                <div class="w3-col m6 l6 w3-container">
                    <header class="w3-blue w3-grayscale w3-center">
                        <h2>Information</h2>
                    </header>
                    <main>
                        <p>Auf dieser Internetseite können Menschen ihre Erfahrungen in Kroatien mit anderen teilen. Die Einträge werden auf dieser Seite in Felder mit Text und Bild dargestellt.</p>
                        <p>Neue Einträge können mithilfe des Formulars erstellt werden. Die Felder <strong>Ort</strong>, <strong>Beschreibung</strong>, <strong>Bild-URL</strong> und <strong>Vorname</strong> sind Pflichtfelder. Diese müssen ausgefüllt werden, damit ein neuer Eintrag entstehen kann. Zu jedem Feld werden folgende Imformationen benötigt:</p>
                        <ul>
                            <li><strong>Ort:</strong> Muss zwischen 3 und 64 Zeichen beinhalten. Ist ein Pflichtfeld. Wird als Titel verwendet in der entstehenden Kachel.</li>
                            <li><strong>Beschreibung:</strong> Muss zwischen 5 bis 1200 Zeichen. Ist ein Pflichtfeld. Wird als Text/Beschreibung unterhalb des Titels genutzt. </li>
                            <li><strong>Jahr der Reise:</strong> Jahr muss zwischen 1900 bis zum aktuellem Jahr sein. Mit dieser Information wird dem Leser gezeigt, wie lange eine Reise her war. </li>
                            <li><strong>Bild-URL:</strong> Die URL darf nicht mehr als 400 Zeichen enthalten. Ist ein Pflichtfeld. Aus der URL wird ein Bild geladen, welches auf der linken Seite der Kachel geladen wird. Die URL muss mit "http" beginnen und mit ".jpg" enden.</li>
                            <li><strong>Vorname:</strong> Muss zwischen 3 und 64 Zeichen beinhalten. Ist ein Pflichtfeld. Wird genutzt um den Autor zu kennzeichnen. Es wird nach der Beschreibung angezeigt.</li>
                            <li><strong>Nachname:</strong> Muss zwischen 3 und 64 Zeichen beinhalten. Wird nach dem Vornamen hinzugefügt falls verfügbar. </li>
                            <li><strong>E-Mail:</strong> Darf nicht mer als 64 Zeichen. Muss dem normalen Email-Format entsprechen. Wird beim Autor hinzugefügt nach Vor- und Nachname.</li>
                        </ul> 
                        <p>Mit den Knopf "Hochladen" werden die Eingaben überprüft und ein neuer Eintrag erstellt.</p>
                    </main>
                    <footer>
                        <p class="author">Autor: Josip Corkovic, joso.corkovic@gmail.com</p>
                    </footer>
                </div>
            </div>
        </section>

        <!-- canvas -->
        <section id="canvas" class="w3-container w3-white w3-margin-bottom w3-margin-top rounded-borders">
            <div class="w3-row-padding">
                <div class="w3-col m6 l6 w3-center">
                    <canvas id="croatiaCanvas" width="400px" height="330px"></canvas>
                    <script>

                        drawCroatiaCanvas();

                        function drawCroatiaCanvas(){
                            let croatiaCanvas = document.getElementById("croatiaCanvas");
                            let c = croatiaCanvas.getContext("2d");
                            
                            // draw landmass of croatia
                            c.beginPath();
                            c.moveTo(16, 102);
                            c.lineTo(24, 107);
                            c.lineTo(34, 107);
                            c.lineTo(37, 105);
                            c.lineTo(60, 104);
                            c.lineTo(64, 99);
                            c.lineTo(66, 92);
                            c.lineTo(71, 93);
                            c.lineTo(73, 99);
                            c.lineTo(81, 103);
                            c.lineTo(97, 103);
                            c.lineTo(103, 108);
                            c.lineTo(113, 103);
                            c.lineTo(109, 86);
                            c.lineTo(109, 86);
                            c.lineTo(122, 81);
                            c.lineTo(129, 76);
                            c.lineTo(127, 55);
                            c.lineTo(152, 40);
                            c.lineTo(162, 39);
                            c.lineTo(161, 31);
                            c.lineTo(173, 30);
                            c.lineTo(197, 45);
                            c.lineTo(229, 73);
                            c.lineTo(252, 83);
                            c.lineTo(271, 85);
                            c.lineTo(304, 71);
                            c.lineTo(306, 94);
                            c.lineTo(312, 101);
                            c.lineTo(310, 109);
                            c.lineTo(329, 122);
                            c.lineTo(330, 126);
                            c.lineTo(324, 128);
                            c.lineTo(317, 124);
                            c.lineTo(314, 130);
                            c.lineTo(310, 149);
                            c.lineTo(305, 150);
                            c.lineTo(291, 136);
                            c.lineTo(277, 132);
                            c.lineTo(235, 130);
                            c.lineTo(204, 124);
                            c.lineTo(197, 119);
                            c.lineTo(185, 124);
                            c.lineTo(173, 124);
                            c.lineTo(164, 137);
                            c.lineTo(157, 134);
                            c.lineTo(141, 124);
                            c.lineTo(134, 133);
                            c.lineTo(133, 145);
                            c.lineTo(139, 159);
                            c.lineTo(156, 182);
                            c.lineTo(161, 198);
                            c.lineTo(172, 210);
                            c.lineTo(215, 251);
                            c.lineTo(236, 279);
                            c.lineTo(233, 285);
                            c.lineTo(202, 258);
                            c.lineTo(180, 248);
                            c.lineTo(153, 245);
                            c.lineTo(145, 242);
                            c.quadraticCurveTo(120, 240, 133, 227);
                            c.lineTo(100, 193);
                            c.quadraticCurveTo(110, 180, 103, 178);
                            c.lineTo(92, 166);
                            c.lineTo(86, 143);
                            c.lineTo(75, 125);
                            c.lineTo(61, 115);
                            c.lineTo(53, 115);
                            c.lineTo(40, 149);
                            c.lineTo(29, 159);
                            c.lineTo(18, 129);
                            c.lineTo(15, 112);
                            c.lineTo(16, 102);
                            
                            // draw some ilands
                            c.moveTo(68, 125);
                            c.lineTo(63, 133);
                            c.lineTo(77, 141);
                            c.lineTo(68, 125);
                            
                            c.moveTo(54, 128);
                            c.lineTo(60, 160);
                            c.lineTo(64, 165);
                            c.lineTo(63, 147); 
                            c.lineTo(58, 129);
                            c.lineTo(54, 128);
                            
                            c.moveTo(205, 278);
                            c.lineTo(215, 279);
                            c.lineTo(237, 289);
                            c.lineTo(245, 288);
                            c.lineTo(279, 310);
                            c.lineTo(279, 317);
                            c.lineTo(241, 295);
                            c.lineTo(218, 285);
                            c.lineTo(206, 281);
                            c.lineTo(205, 278);
                            
                            c.moveTo(180, 260);
                            c.arc(180, 260, 4, 0 , 2 * Math.PI);

                            // set filling
                            let g = c.createLinearGradient(250,330,250,0);
                            g.addColorStop(0, "blue");
                            g.addColorStop(1, "red");
                            c.fillStyle = g;
                            c.fill();

                            // add title
                            c.font = "24px Arial";
                            c.fillText("MAP OF CROATIA", 175, 190);

                            c.stroke();
                        }
                        
                        
                        </script>
                </div>
                <div class="w3-col m6 l6 w3-container">
                    <header class="w3-blue w3-grayscale w3-center">
                        <h2>Croatia Canvas</h2>
                    </header>
                    <main>
                        <p>Hier finden eine Canvas-Karte von Kroatien. Kroatien liegt im südosten Europas an der Adria. Sie gilt als Reiseziel vieler Touristen.</p>
                    </main>
                </div>
            </div>
        </section>

        <!-- places -->
        <?php 
        //------------------------ HELPER FUNCTIONS ---------------------------
        // calculates difference of two dates in days
        function getDiffOfDatesInDays($date1, $date2){
            $diff = abs(strtotime($date2) - strtotime($date1)); // diff in seconds
            return floor($diff / (60*60*24));
        }

        function isNullOrEmpty($string){
            return (!isset($string) || trim($string) === '');
        }

        //------------------------ LOAD DATA ---------------------------

        /*
            this section loads all places stored in the database and displays them as a tile.
        */

        // create connection to the database
        $conn = mysqli_connect("localhost", "root", "", "mytrips");
        
        // load data and display data 
        if($conn){
            $query = "SELECT place, description, url, firstname, lastname, email, entry_date, visit_year FROM places;"; // no use of prepared statement is needed here, since no userinput is being used for the search
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);

            if($results){
                while($row = mysqli_fetch_assoc($results)) {
                    $place = $row['place'];
                    $description = $row['description'];
                    $url = $row['url'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $date = $row['entry_date'];
                    $year = $row['visit_year'];
                    $footer = '';

                    // settup footer 
                    if(isNullOrEmpty($lastname) && !isNullOrEmpty($email)){
                        $footer = 'Autor: ' . $firstname . ', '. $email;
                    } else if(!isNullOrEmpty($lastname) && isNullOrEmpty($email)){
                        $footer = 'Autor: ' . $firstname . ' ' . $lastname;
                    } else if(isNullOrEmpty($lastname) && isNullOrEmpty($email)){
                        $footer = 'Autor: ' . $firstname;
                    } else {
                        $footer = 'Autor: ' . $firstname . ' ' . $lastname . ', '. $email;
                    }

                    if(!isNullOrEmpty($year)){
                        // year is set
                        $footer = $footer . ', Reise vor ' . (date("Y") - $year) . ' Jahr(en)'; // MATHEMATISCHE BERECHNUNG
                    }

                    $footer = $footer . ' <br> (Hochgeladen vor ' . getDiffOfDatesInDays($date, date("Y-m-d")) . ' Tagen.)';

                    ?>
                    <section class="w3-container w3-white w3-margin-bottom w3-margin-top rounded-borders">
                        <div class="w3-row-padding">
                            <div class="w3-col m6 l6 w3-center">
                                <img class="images" src="<?php echo $url ?>" width="100%" height="100%">
                            </div>
                            <div class="w3-col m6 l6 w3-container">
                                <header class="w3-blue w3-grayscale w3-center">
                                    <h2><?php echo $place ?></h2>
                                </header>
                                <main>
                                    <p><?php echo $description ?></p>
                                </main>
                                <footer>
                                    <p class="author"><?php echo $footer ?></p>
                                </footer>
                            </div>
                        </div>
                    </section>

                    <?php
                }
            }      
        }

        ?>

        <!-- formular -->
        <section id="formular" class="w3-container w3-white w3-margin-bottom w3-margin-top rounded-borders">
            <header class="w3-blue w3-grayscale w3-center">
                <h2>Neuen Artikel hinzufügen</h2>
            </header>
            <main>
                <form class="w3-container" onsubmit="return isFormValid()" method="POST" action="newEntry.php">
                    <div class="w3-row">    
                        <fieldset class="w3-col m6 l6">
                            <legend><strong>Ort</strong></legend>
                            <label for="place">Ort:</label>
                            <br/>
                            <input minlength="3" maxlength="64" class="w3-input w3-border" required id="place" name="place" type="text" placeholder="Ort*"/>
                            <br/>
                            <label for="year">Jahr der Reise:</label>
                            <br/>
                            <input class="w3-input w3-border" id="year" name="year" min="1900" max="2099" step="1" type="number" placeholder="2020"/>
                            <br/>
                            <label for="description">Beschreibung:</label>
                            <br/>
                            <textarea minlength="5" maxlength="1200" class="w3-input w3-border" required id="description" name="description" type="text" rows="5" placeholder="Beschreibung*"></textarea>
                            <br/>
                            <br/>
                            <label for="url">Bild-URL:</label>
                            <br/>
                            <input minlength="5" maxlength="400" class="w3-input w3-border" required id="url" name="url" type="url" width="100%" placeholder="*"/>
                        </fieldset>
                        <fieldset id="test" class="w3-col m5 l5">
                            <legend><strong>Autor</strong></legend>
                            <label for="firstname">Vorname:</label>
                            <br/>
                            <input minlength="3" maxlength="64" class="w3-input w3-border" required id="firstname" name="firstname" type="text" size="50" 
                            <?php
                                // prefill field if cookie is set
                                if(isset($_COOKIE['firstname'])){
                                    echo 'value = "' . $_COOKIE['firstname'] . '"' ;
                                } else {
                                    echo 'placeholder="Vorname"';
                                }                            
                            ?>
                            />
                            <br/>
                            <label for="lastname">Nachname:</label>
                            <br/>
                            <input minlength="3" maxlength="64" class="w3-input w3-border" id="lastname" name="lastname" type="text" size="50" placeholder="Nachname"/>
                            <br/>
                            <br/>
                            <label for="email">E-Mail:</label>
                            <br/>
                            <input class="w3-input w3-border" maxlength="64" id="email" name="email" type="email" placeholder="z.B. test@test.com"/>
                        </fieldset>
                    </div>
                    <footer class="w3-margin-top w3-margin-bottom">
                        <button class="w3-button w3-blue w3-grayscale" type="submit" name="upload">Hochladen</button>
                    </footer>
                </form>
            </main>
        </section>
    </main>

</body>

</html>