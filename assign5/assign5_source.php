<?php


    $myClub = new Club ("localhost", "A340User", "Pass123Word", "info_club");

    if (isset($_POST['submit'])) {
        $myClub->processRegistration();
    }
    class Club{
        private $HostName;
        private $UserID;
        private $Password;
        private $DBName;
        private $Con;


        //----------------------------------------------------------------------
        //----------------------------------------------------------------------
        //                      Public Methods
        //----------------------------------------------------------------------
        //----------------------------------------------------------------------

        //Constructor
        public function __construct($host = NULL, $uid = NULL, $pw = NULL, $db = NULL){

            $this->HostName = $host;
            $this->UserID = $uid;
            $this->Password = $pw;
            $this->DBName = $db;

            //Connect to database
            $this->Con = mysqli_connect($host, $uid, $pw, $db);
            if(mysqli_connect_errno()){
                echo("Failed to connect");
            }

        }

        //Destructor
        public function __destruct(){

            mysqli_close($this->Con);

        }

        //--------------------------------------------------------
        public function displayHome(){
            echo("");
        }

        //--------------------------------------------------------
        public function displayMembers(){

            $this->getMembersFromDB();
            //$this->getInterestTypesFromDB();
        }

        //--------------------------------------------------------
        public function displayAbout(){
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
            echo("</div>");
        }

        //--------------------------------------------------------
        public function displayRegister(){
            echo("<h1>Become a Club Member</h1>");
       
            echo("<table align='left'>");
            echo("<form method ='POST' id='registerForm' action='" . $_SERVER['PHP_SELF'] . "'>");
                
                echo("<tr>");
                    echo("<td align = 'left'>First Name</td>");
                    echo("<td align= 'left'> <input type='text'; name='firstText'; size='15'; maxlength ='15';> </td>");
                echo("</tr>");

                echo("<tr>");
                    echo("<td align = 'left'>Last Name</td>");
                    echo("<td align= 'left'> <input type='text'; name='lastText'; size='15'; maxlength ='15';> </td>");
                echo("</tr>");

                echo("<tr>");
                    echo("<td align = 'left'>Your Email</td>");
                    echo("<td align= 'left'> <input type='text'; name='email'; size='15'; maxlength ='15';> </td>");
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
                            echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='Pizza Party'><label for='pizza'>Pizza Party</label><br>");

                            echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='Joining Study Groups'><label for='study'>Joining Study Groups</label><br>");

                            echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='Visiting Employer Sites'><label for='employer'>Visiting Employer Sites</label><br>");

                            echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='Participating in Programming Competitions'><label for='competitions'>Participating 
                                                                                                                                        in Programming Competitions</label><br>");

                            echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='Building Games'><label for='games'>Building Games</label><br>");

                            echo("<input type='checkbox' class='interests' id='interests' name='interests[]' value='Becoming an Officer of the Club'><label for='officer'>Becoming an Officer of the Club</label><br>");
                        echo("</fieldset>");
                    echo("</td>");
                
                    echo("</tr>");
                    echo("<tr><td><button type='submit' name='submit' value='Submit'>Submit Form</button></td></tr>");
            echo("</form>");
            echo("</table>");

            if(isset($_POST['submit'])){
                processRegistration();
            }
        }

        //--------------------------------------------------------
        public function processRegistration(){

                $fname = $_POST['firstText'];
                $lname = $_POST['lastText'];
                $email = $_POST['email'];
                $sex = $_POST['gender'];
                $interests = isset($_POST['interests']) ? implode(',', $_POST['interests']) : '';
        
                $sql = "INSERT INTO `member` (`Email`, `FirstName`, `LastName`, `Gender`, `MemberSince`, `Picture`) 
                        VALUES ('$email', '$fname', '$lname', '$sex', current_timestamp(), NULL);";

                if(mysqli_query($this->Con, $sql)){
                    foreach ($interests as $interest) {
                        $interestId = (int)$interest; 
        
                        $otherSql = "INSERT INTO `member_interests` (`Email`, `InterestID`)
                                     VALUES ('$email', $interestId)";
        
                        mysqli_query($this->Con, $otherSql);
                    }
                }

        }

        //----------------------------------------------------------------------
        //----------------------------------------------------------------------
        //                      Private Methods
        //----------------------------------------------------------------------
        //----------------------------------------------------------------------

        private function getMembersFromDB(){
            $sql = "SELECT
                            member.Email,
                            member.FirstName,
                            member.LastName,
                            member.Gender,
                            member.MemberSince
                    FROM
                            member";
            $result = mysqli_query($this->Con,$sql);

            $arrayResult = array();

            echo("<table id='membership' class='members' style='width:100%'>");
            echo("<tr>");    
                echo("<th colspan='3'>Informatics Club Membership</th>");
            echo("</tr>");

            echo("<tr>");
                echo("<td>Name</td>");
                echo("<td>Email</td>");
                echo("<td>Interests</td>");
            echo("</tr>");

            while($row = mysqli_fetch_array($result)){
                $arrayResult[] = $row;
                echo("<tr class='members'><td class='members'>" . $row['FirstName'] . " " . $row['LastName'] . "</td>");
                echo("<td class='members'>" . $row['Email'] . "</td>");
                
                $interests = $this->getMemberInterestsFromDB($row['Email']);
                echo("<td class='members'>");
                foreach ($interests as $interest) {
                    echo $interest['InterestDescription'] . "<br/>";
                }
            }

            return($arrayResult);
        }

        private function getMemberInterestsFromDB($MemberEmail){
            $sql = "SELECT
                            interest_type.InterestDescription
                        FROM
                            member, member_interests, interest_type
                        WHERE
                            member.Email = '$MemberEmail'
                        AND
                            member.Email = member_interests.Email
                        AND
                            member_interests.InterestID = interest_type.InterestID";

            $result = mysqli_query($this->Con,$sql);
            $arrayResult = array();
            while($row = mysqli_fetch_array($result)){
                $arrayResult[] = $row;
            }

            return($arrayResult);
        }

        private function getInterestTypesFromDB(){
            $sql = "SELECT
                         InterestID,
                         InterestDescription
                    FROM
                         interest_type";

            $result = mysqli_query($this->Con,$sql);
            $arrayResult = array();
            while($row = mysqli_fetch_array($result)){
                $arrayResult[] = $row;
                echo($row['InterestDescription']);
            }

            return($arrayResult);
        }
    }
?>

