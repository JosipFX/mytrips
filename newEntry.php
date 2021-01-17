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
            let place = document.getElementById("place").value;
            let description = document.getElementById("description").value;
            let url = document.getElementById("url").value.toString();
            let firstname = document.getElementById("firstname").value;
            let lastname = document.getElementById("lastname").value;
            let email = document.getElementById("email").value;

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
                    <a class="w3-button w3-bar-item w3-mobile" href="index.php#information">Information</a>
                    <a class="w3-button w3-bar-item w3-mobile" href="index.php#canvas">Canvas</a>
                    <a class="w3-button w3-bar-item w3-mobile" href="index.php#formular">Formular</a>
                </nav>
        </section>

        
    </header>

    <main>
        <!-- store new entry -->
        <?php
        
        //------------------------ DISPLAY COOKIE IF SET ---------------------------
        if(isset($_COOKIE['firstname'])){
            echo '<section class="w3-container w3-panel w3-green rounded-borders">
                        <h3>Willkommen zurück ' . $_COOKIE['firstname'] . '!</h3>
                    </section>';
        }
    
        //------------------------ HELPER FUNCTIONS ---------------------------
        function getDiffOfDatesInDays($date1, $date2){
            $diff = abs(strtotime($date2) - strtotime($date1)); // diff in seconds
            return floor($diff / (60*60*24));
        }

        function isNullOrEmpty($string){
            return (!isset($string) || trim($string) === '');
        }

        //------------------------ CHECK POST PARAMETERS  ---------------------------
        if(!isset($_POST) && isNullOrEmpty($_POST['place'])){ // no request params can be most likely due to a refresh of this page
            return;
        }

        $place = $_POST['place'];
        $description = $_POST['description'];
        $url = $_POST['url'];
        $firstname = $_POST['firstname'];
        $date = date("Y-m-d");
        $year = $_POST['year'];

        setcookie("firstname", $firstname, time() + 900); // set name in cookie for 15 minutes

        //------------------------ DO POST PARAMETER VALIDATION ---------------------------
        if(isNullOrEmpty($place) || strlen($place) < 3) {
            echo '
                    <section class="w3-container w3-panel w3-red rounded-borders">
                        <h3>Pflicht Parameter wurden nicht korrekt oder leer überliefert!</h3>
                        <p>Versuchen Sie erneut das Formular auszufüllen. Beachten Sie, das der Ort mind. drei Zeichen enthält.</p>
                    </section>';
            return;
        }

        if(isNullOrEmpty($description) || strlen($description) < 5) {
            echo '
                    <section class="w3-container w3-panel w3-red rounded-borders">
                        <h3>Pflicht Parameter wurden nicht korrekt oder leer überliefert!</h3>
                        <p>Versuchen Sie erneut das Formular auszufüllen. Beachten Sie, das die Beschreibung mind. fünf Zeichen enthält.</p>
                    </section>';
            return;
        }

        if(isNullOrEmpty($url) || strlen($url) < 5) {
            echo '
                    <section class="w3-container w3-panel w3-red rounded-borders">
                        <h3>Pflicht Parameter wurden nicht korrekt oder leer überliefert!</h3>
                        <p>Versuchen Sie erneut das Formular auszufüllen. Beachten Sie, das die URL mit "http" beginnt und mit ".jpg" endet.</p>
                    </section>';
            return;
        }

        if(isNullOrEmpty($firstname) || strlen($firstname) < 3) {
            echo '
                    <section class="w3-container w3-panel w3-red rounded-borders">
                        <h3>Pflicht Parameter wurden nicht korrekt oder leer überliefert!</h3>
                        <p>Versuchen Sie erneut das Formular auszufüllen. Beachten Sie, das der Vorname mind. drei Zeichen enthält.</p>
                    </section>';
            return;
        }

        if(!isNullOrEmpty($year)){ // year is set
            if($year > date("Y")) {
                echo '
                        <section class="w3-container w3-panel w3-red rounded-borders">
                            <h3>Pflicht Parameter wurden nicht korrekt oder leer überliefert!</h3>
                            <p>Versuchen Sie erneut das Formular auszufüllen. Beachten Sie, das nur das aktuelle oder vergangene Jahre genutzt werden können.</p>
                        </section>';
                return;
            }
            if($year < 1900) {
                echo '
                        <section class="w3-container w3-panel w3-red rounded-borders">
                            <h3>Pflicht Parameter wurden nicht korrekt oder leer überliefert!</h3>
                            <p>Versuchen Sie erneut das Formular auszufüllen. Beachten Sie, vergangene Jahre nur bis 1900 akzeptiert werden.</p>
                        </section>';
                return;
            }

        }

        //------------------------ INSERT NEW ENTRY  ---------------------------

        // create connection to the database
        $conn = mysqli_connect("localhost", "root", "", "mytrips");

        //  insert data
        if($conn){
            $query = "INSERT INTO places(place, description, url, firstname, lastname, email, visit_year) VALUES (?,?,?,?,?,?,?);";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'ssssssi', $place, $description, $url, $firstname, $_POST['lastname'], $_POST['email'], $_POST['year']);
            $res = mysqli_stmt_execute($stmt);

            if($res){
                echo '
                    <section class="w3-container w3-panel w3-green rounded-borders">
                        <h3>Hallo ' . $firstname . ', folgender Eintrag wurde erfolgreich erstellt!</h3>
                        <p>Der Eintrag wurde erfolgreich erstellt. Sie können unten beim Formular einen weiteren Eintrag erstellen.</p>
                    </section>';
                $footer = '';

                // settup footer 
                if(isNullOrEmpty($_POST['lastname']) && !isNullOrEmpty($_POST['email'])){
                    $footer = 'Autor: ' . $firstname . ', '. $_POST['email'];
                } else if(!isNullOrEmpty($_POST['lastname']) && isNullOrEmpty($_POST['email'])){
                    $footer = 'Autor: ' . $firstname . ' ' . $_POST['lastname'];
                } else if(isNullOrEmpty($_POST['lastname']) && isNullOrEmpty($_POST['email'])){
                    $footer = 'Autor: ' . $firstname;
                } else {
                    $footer = 'Autor: ' . $firstname . ' ' . $_POST['lastname'] . ', '. $_POST['email'];
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



            } else {
                echo '
                    <section class="w3-container w3-panel w3-red rounded-borders">
                        <h3>Eintrag konnte nicht erstellt werden!</h3>
                        <p>Überprüfe deine Werte nochmals.</p>
                    </section>';
            }
        }
        ?>

        <!-- formular -->
        <section class="w3-container w3-white w3-margin-bottom w3-margin-top rounded-borders">
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