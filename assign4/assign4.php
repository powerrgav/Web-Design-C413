<html>


    <head>
        <meta charset="UTF-8">


        <style type="text/css">
            
            #blackBar{
                background-color:#000000;
	            float:left;
	            width:100%;
	            height:5px;
            }
            #leftNav{
                background-color:#F57F66;
                float:left;
                width: 150px;
                height:500px;
            }
            #bodyContent{
                overflow:auto;
                background-color:#B3FAE1;
                float:left;
                width: 750px;
                height: 500px;
            }
            #mainAbout{
                
                color:black;
                background-color:white;
                margin:1cm 2cm;
                padding: 10px;
                border-radius: 15px;
            }
            #aboutQA{
                
                color:white;
                background-color:black;
                margin:1cm 1cm;
                padding-left: 5px;
                border-radius: 15px;
            }
            header{
                background-color: lightblue; 
                width: 100%; 
                height: 50px;
            }

            footer{
                background-color: #000000;
                position:fixed;
                bottom:145px;
                left:8px;
                color:white;
                width:900px;
                height:75px;

            }
            h1{
                text-align: center;
            }
            a:hover{
                background-color:lightyellow;
            }
            .members{
                border: 1px solid black;
                text-align:center;
            }
        </style>
    </head>


    <body>
        <div id = "container" style="width: 900px;">
            
            <!--the div with the top black bar-->
	        <div id="blackBar">	
	        </div>

            <header>
                <h1>Informatics Student Club 1.0</h2>
            </header>

             <!--the div with the bottom black bar-->
	        <div id="blackBar">	
	        </div>

            <div id="leftNav">
                <a id="about" href="assign4.php?SelectedLink=about">About Us</a><br>
                <a id="register" href="assign4.php?SelectedLink=register">Register</a><br>
                <a id="members" href="assign4.php?SelectedLink=members">Members</a>
                <hr>
                <a id="home" href="assign4.php?SelectedLink=home">Home</a>
            </div>

            <div id="bodyContent">

                <?php
                    include_once("assign4_Source.php");

                    if(isset($_GET['SelectedLink'])){
                        if($_GET['SelectedLink'] == "about"){
                            displayAbout();
                        }
                        else if($_GET['SelectedLink'] == "register"){
                            displayRegister();
                        }
                        else if($_GET['SelectedLink'] == "members"){
                            displayMembers();
                        }
                        else if($_GET['SelectedLink'] == "home"){
                            displayHome();
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
