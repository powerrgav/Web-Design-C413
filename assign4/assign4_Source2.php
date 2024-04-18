<?php
   if(isset($_POST['submit'])){
    
        //take the user back to the register screen instead of loading new page
        echo("<script type='text/javascript'>");
            echo("window.location.href='assign4.php?SelectedLink=register'");
        echo("</script>");
        
        //access the file and write into it
        $filename = "Assign4_Membership.txt";
        $fp = fopen($filename, "a");

        $fname=$_POST['firstText'];
        $lname=$_POST['lastText'];
        $email=$_POST['email'];
        $sex=$_POST['gender'];
        $interests=$_POST['interests'];


        fwrite($fp,"<firstText>" . "\n");
             fwrite($fp, $fname . "\n");
        fwrite($fp,"</firstText>" . "\n");

        fwrite($fp,"<lastText>" . "\n");
             fwrite($fp, $lname . "\n");
        fwrite($fp,"</lastText>" . "\n");
        
        fwrite($fp,"<email>" . "\n");
             fwrite($fp, $email . "\n");
        fwrite($fp,"</email>" . "\n");

        fwrite($fp,"<sex>" . "\n");
             fwrite($fp, $sex . "\n");
        fwrite($fp,"</sex>" . "\n");

        fwrite($fp,"<interests>" . "\n");

        foreach($interests as $interest){
            fwrite($fp, $interest . "\n");
        }

        fwrite($fp,"</interests>" . "\n");

   }else{
    echo("it didn't work");
   }
?>