<?php
    function displayAbout(){
        
        echo("<h2>About the Informatics Club</h2>");
        
        echo("<div id='mainAbout'>");
            echo("<p>The Informatics club is a student organization.</p>");
            
            echo("<h4>Our activities include</h4>");
            
            echo("<ol>");
                echo("<li>Social Events</li>");
                echo("<li>Game Nights</li>");
            echo("</ol>");

            echo("<h4>Our Officers</h4>");
            echo("<ul>");
                echo("<li>Gavin Power</li>");
            echo("</ul>");
        echo("</div>");
       
        echo("<div id='aboutQA'>");
            echo("<h3>Questions and Comments</h3>");
            echo("Something about questions and comments to be directed to the correct people.");
        echo("</div");
   
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function displayRegister(){
        
        echo("<h1>Become a Club Member</h1>");
       
        echo("<table align='left'>");
        echo("<form method ='POST' id='registerForm' action='assign4_Source2.php'>");
            
            echo("<tr>");
                echo("<td align = 'left'>First Name</td>");
                echo("<td align= 'left'> <input type='text'; name='firstText'; size='15'; maxlength ='15'; </td>");
            echo("</tr>");

            echo("<tr>");
                echo("<td align = 'left'>Last Name</td>");
                echo("<td align= 'left'> <input type='text'; name='lastText'; size='15'; maxlength ='15'; </td>");
            echo("</tr>");

            echo("<tr>");
                echo("<td align = 'left'>Your Email</td>");
                echo("<td align= 'left'> <input type='text'; name='email'; size='15'; maxlength ='15'; </td>");
            echo("</tr>");

            echo("<tr>");
                echo("<td align = 'left'>Gender:</td>");
                echo("<td align='left'><input type='radio' name='gender' value='male'>Male<br>");
                echo("<input type='radio' name='gender' value='female'>Female</td>");
            echo("</tr>");

            echo("<tr>");
                echo("<td align='left'>Interested in:</td>");
                
                echo("<td align='left'>");
                    echo("<fieldset>");
                        echo("<legend>Check all that apply:</legend>");
                        echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='pizza'><label for='pizza'>Pizza Party</label><br>");

                        echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='study'><label for='study'>Joining Study Groups</label><br>");

                        echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='employer'><label for='employer'>Visiting Employer Sites</label><br>");

                        echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='competitions'><label for='competitions'>Participating 
                                                                                                                                    in Programming Competitions</label><br>");

                        echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='games'><label for='games'>Building Games</label><br>");

                        echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='officer'><label for='officer'>Becoming an Officer of the Club</label><br>");
                    echo("</fieldset>");
                echo("</td>");
            
                echo("</tr>");
                echo("<tr><td><button type='submit' name='submit' value='Submit'>Submit Form</button></td></tr>");
        echo("</form>");
        echo("</table>");

    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function displayMembers(){
        include("assign4_MembersSource.php");
    }
    function displayHome(){
        echo("");
    }
?>