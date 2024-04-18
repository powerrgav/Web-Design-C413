<?php 
    
    echo("<table id='membership' class='members' style='width:100%'>");
        echo("<tr>");    
            echo("<th colspan='3'>Informatics Club Membership</th>");
        echo("</tr>");

        echo("<tr>");
            echo("<td>Name</td>");
            echo("<td>Email</td>");
            echo("<td>Interests</td>");
        echo("</tr>");

    $filename = "Assign4_Membership.txt";
    $fp = fopen($filename, "r");
    while(!feof($fp))
    {
        $aLine = trim(fgets($fp)); // note the use of the trim() function
        switch ($aLine) {
            
            case "<firstText>" :
                $fname = trim(fgets($fp));
                $throwAway = fgets($fp); 
                $throwAway = fgets($fp); 
                $lname = trim(fgets($fp));
                echo("<tr class='members'><td class='members'>" . $fname . " " . $lname . "</td>");
                $throwAway = fgets($fp); 
                break;
            case "<email>" :
                 $email =trim(fgets($fp)); // cast the grade into an integer
                 echo("<td class='members'>" . $email . "</td>");
                 $throwAway = fgets($fp); // throwaway
                 break;
            case "<interests>" :
                $interests = array(); // Array to store interests
                while (($line = trim(fgets($fp))) != "</interests>") {
                    $interests[] = $line; // Add interest to array
                }
                // Display interests as unordered list
                echo("<td class='members'><ul>");
                foreach ($interests as $interest) {
                    echo("<li>" . $interest . "</li>");
                }
                echo("</ul></td></tr>");
                break;
            default:
                break;
        }
    }
    echo("</table>");
?>