<html>


    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="assign5_styles.css">
    </head>


    <body>
        <div id = "container" style="width: 900px;">
            
            <!--the div with the top black bar-->
	        <div id="blackBar">	
	        </div>

            <header>
                <h1>Informatics Student Club 2.0</h2>
            </header>

             <!--the div with the bottom black bar-->
	        <div id="blackBar">	
	        </div>

            <div id="leftNav">
                <a id="about" href="assign5.php?SelectedLink=about">About Us</a><br>
                <a id="register" href="assign5.php?SelectedLink=register">Register</a><br>
                <a id="members" href="assign5.php?SelectedLink=members">Members</a>
                <hr>
                <a id="home" href="assign5.php?SelectedLink=home">Home</a>
            </div>

            <div id="bodyContent">

                <?php
                    require_once("assign5_source.php");

                    $myClub = new Club ("localhost", "A340User", "Pass123Word", "info_club");

                    if(isset($_GET['SelectedLink'])){
                        if($_GET['SelectedLink'] == "about"){
                            $myClub->displayAbout();
                        }
                        else if($_GET['SelectedLink'] == "register"){
                            $myClub->displayRegister();

                        }
                        else if($_GET['SelectedLink'] == "members"){
                            $myClub->displayMembers();
                        }
                        else if($_GET['SelectedLink'] == "home"){
                            $myClub->displayHome();
                        }
                    }
                ?>

            </div>

            <footer>
                <h1>©Copyright 2023 by Gavin Power - Web Programming</h1>
            </footer>

        </div>
    </body>



</html>
