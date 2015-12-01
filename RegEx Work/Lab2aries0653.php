<!DOCTYPE html>
<html lang="en">
    
<!-- 

Programmer: Andrew Ries
Class ID: aries0653
Lab 2
CIS 2800: Internet Programming
Fall 2015
Due Date: 10/22/15
Date Completed: 10/22/15
***********************************
Program Explanation

Uses Various If Else Statements to take simulated user input and do the following:
    1. Output input back to user with minimal errors and clean formating
    2. Create and Output a new LoginID, Password, sha1 hash, and New Email based on Status
//Directory
    [I.E. 1] - User Name Validation 
    [I.E. 2] - User Phone Number Validation & Formating 
    [I.E. 3] - User Email Validation
    [I.E. 4] - New Email Creation 
    [LoginID] - Variable Set for $loginID Creation 
    [Password & SHA1] - Variable Set and Echo (Echo's LoginID aswell)

 !!Includes files [NROL.jpg], [inc_Lab2DateTime_aries0653] ,[inc_Lab2Footer_aries0653]!! 
-->
    
    <head>
        <!-- CSS displays tab title and a 2 headings---> 
        <title>Lab2</title>
        <meta charset="utf-8">
        <link href="Lab2aries0653.css" rel="stylesheet">
        <!-- Include file DateTime.php to display date & time -->
        <?php include 'inc_Lab2DateTime_aries0653.php';?>      
        
    </head>
    
    <body>
        <!-- Include NROL.jpg  -->
        <img id="nrol" src="NROL.jpg" alt="We are watching you :]" height="100"
             width="100">
        <h1>SAP Security Access Authentication</h1>
        <!--Create Dynamic h2 in future, Access would not be granted on user input error -->
        <h2>WARNING: Level 5 Access Granted!</h2>
      
        
        <?php
        
        /*Simulated User Input for.... 
         * First Name, Middle Name, Last Name, Age, Phone#, Email, Satus
         * 
         * 
         * Trim is included to proceed with code instead of throwing 
         * else echo in [$fullname] ifelse pregmatch [See I.E. 1] 
         *      same idea is applied to other variables
         * 
         * Rather than have the user reenter because of before or after spaces
         * on input, we just fix it for them. 
         */
        // User input variables: F/M/L Name, Age, Phn#, Email, Status -- Trim All
        $strFirstName = trim ("  bUbBA");
        $strMiddleInt = trim (" trollZ");
        $strLastName  = trim (" jonES ");
        $age          = trim ("25 ");
        $phonenbr     = trim (" 1 (269-867-5309  ");
        $email        = trim ("  andrew.ries@gmail.ORG  ");
        $status       = trim ("  sTaFF  ");
        
        
        /*Concats FN MN and LN. Middle Name is changed to Middle Initial
         * (if user did not enter only middle initial) using substr,0,1. 
         * 
         * strtolower is applied to FN and LN. 
         * ucfirst applied to all 3 var
         * 
         * This corrects multiple user input mistakes
         * Example:
         * "bUbbA tRoLL jONES" -> "Bubba T Jones"
         *  
         */
        $fullname = (ucfirst(strtolower($strFirstName))." ".
                (ucfirst(substr($strMiddleInt,0,1)))." ".
                (ucfirst(strtolower($strLastName))));        
                
                
        /* [I.E. 1] - Validate User Name
         * 
         * ifelse statement with pregmatch to check $fullname validity
         * 
         * preg_match looks for [1 or more a-z][space][""a-z][space][""a-z]
         * at variable $fullname
         * 
         * This prevents unwanted spaces inbetween letters and non a-z/i chars
         *                                                    (case insensitive) 
         * If match:        echo username 
         * Else (no match): echo warning, exit code
         * 
         * Example: Bu!ba T J%nes   -> Else Echo, Exit Code
         *          Bu bba T Jon es -> Else Echo, Exit Code
         *          Bubba T Jones   -> If Echo, Output User Name 
         */
        if (preg_match("/^[a-z]+\s[a-z]+\s[a-z]+$/i",$fullname)) {
            echo ("User Name: ".$fullname."<br>");
        }
        else {                              
            echo ("<span class = 'warning'>Invalid User Name!</span>"."<br>"
                    ."Please use only characters A-Z for your name and double check
                    that you have no spaces."."<br>");
            exit; 
        } 
              
       
        /* [I.E. 2] - Validate User Phone Number, Format Phone Number
         * 
         * ifelse statement with pregmatch to check $phonenbr validity 
         * 
         * NOTE: [optional digit "1"] as seen below assumes user will be from USA. 
         * Edit 1 as \d or similar to allow extended number, formating in [2-1]
         * will have to be edited as well. 
         * 
         * preg_match looks for [optional digit 1 & optional space]
         *      [3 matches between 0-9 w/ optional "()" on outside, optional "-" after {3})
         *                                                  NOTE: "-" cannot come before ")"
         *      [3 matches between 0-9 w/ optional "-" after]
         *      [4 matches between 0-9] 
         * 
         * 
         * If match:        See Nested IF 2-1 
         * Else (no match): echo warning, exit code 
         * 
         * ////////////////////////////////////////////////////////////////////
         * [I.E. 2-1 Nested IF] - Format Phone Number 
         * 
         * pregreplace to remove user formating of $phonenbr 
         * unformated number = $pnstrip (phone number strip)
         * 
         * nested ifelse statment with strlen to check either 10 or 11 digits of $pnstrip
         * If == 10:   Format $pnstrip and echo
         * Else == 11: Format $pnstrip and echo
         * 
         * Format is achieved by substr function to achieve grouping like...
         *  (xxx)xxx-xxxx 
         * OR
         * x(xxx)xxx-xxxx
         */
        
        
        if (preg_match("/^(1? ?)(\(?[0-9]{3}\)?\-?)([0-9]{3}\-?)([0-9]{4})$/", $phonenbr)) 
        {
        // Match     
        // Strip Phone of any formating 
         $pnstrip = preg_replace("/\D/","",$phonenbr);
         
            // Nested If Start
            // No Country Code 10 Digits
            if ((strlen($pnstrip)) == 10) {
               echo ("User Phone Number: "
                        ."(".(substr($pnstrip, 0, 3)).")".(substr($pnstrip, 3, 3))
                        ."-".(substr($pnstrip,6))
                        ."<br>");
            }      
            // Country Code 11 Digits 
            elseif ((strlen($pnstrip)) == 11) {
                 echo ("User Phone Number: "
                        .(substr($pnstrip, 0, 1))."(".(substr($pnstrip, 1, 3)).")"
                        .(substr($pnstrip, 4, 3))."-".(substr($pnstrip,7))
                        ."<br>");
            }     
        }   
        // No Match
        else { 
            echo 
            ("<br><span class = 'warning'>Invalid Phone Number! </span><br>"
                    ."Please enter a 10 or 11 digit phone number"."<br>"
                    ."Include area code"."<br>"
                    ."Try formating number as 1(269)867-5309"."<br><br>");
            exit; 
        } 
                
        /* [I.E. 3] - Validate User Email
         * 
         * ifelse statement with pregmatch to check $email validity
         * 
         * preg_match looks for string ending with ["." com net or org]
         * 
         * This prevents unwanted spaces inbetween letters and non a-z/i chars
         *                                                    (case insensitive)
         * If match:        echo email w/ strtolower formating 
         * Else (no match): echo warning, exit code
         * 
         * Example: andrew.ries@mit.edu ->   Else Echo, Exit Code
         *          andrew.ries@gmail.org -> If Echo, Output User Name 
         *          aNdrEw.RIES@gMAIl.ORG -> andrew.ries@gmail.org
         *                                    If Echo, Output User Name
         * 
         * NOTE: Figure out how to eliminate erroneous whitespace input 
         * between letters 
         */ 
       
     
        if (preg_match("/\.(com|net|org)$/i", $email)) 
        {  
            
            echo "Current Email: ".(strtolower($email))."<br>";
        }
        else {
            echo ("<br><span class='warning'>Invalid User Email!</span>"
                    ." Please use .com, .net, or .org"."<br>"
                    ." Be sure to avoid spaces"."<br>");
            exit; 
        }
        
        //////////////////////////////
        //[Welcome Message]
        //ucfirst and strtolower functions for $strFirstName
        // 
        echo ("<br>Welcome to the NSA ".(ucfirst(strtolower($strFirstName))).
              ", Enjoy your new SAP Clearence!"."<br>");
        echo ("<br>");
     
        
        /* [LoginID] - Variable Set for $loginID Creation
         * 
         */
        
         //counts number of characters in each name ~ function strlen counts         
         $intvalueFN = strlen($strFirstName);
         $intvalueLN = strlen($strLastName); 
                   
         //defines sum of characters from both names, LoginID (3/3)
         $Sumofchar = ($intvalueFN + $intvalueLN); 
            
         // defines First Initial of Firstname, LoginID (1/3)
         // fuction substr counts 1st char from start [0]
         $firstInitialFN = strtolower(substr($strFirstName,0,1));
        
         // defines First 3 letters of Lastname, LoginID (2/3)
         // fuction substr counts 3 chars from start [0]
         $first3LN = strtolower(substr($strLastName,0,3));
        
         //LoginID is FirstInitial of FN.First3CharLN.SumofCharValues
        
         $loginID = ($firstInitialFN.$first3LN.$Sumofchar);
        
        
        
        
        
        /* [Password & SHA1] - Variable Set and Echo (Echo's LoginID aswell)
         * 
         */
         
         // reversed last name + binary age all lowercase
         // strrev reverses, $revstr is reversed string with strtolower format
         $revstr = strtolower(strrev($strLastName)); 
         // decbin sets binary value of $age, $binval is this value
         $binval = decbin($age);
         
         // $password is last name reversed . binary value of age
         $password = ($revstr.$binval);
         //$sha1 is sha1 of $password 
         $sha1 = sha1($password);
          
         // Echo LoginID, Password, Sha1 to user 
         echo ("LoginID: ".$loginID)."<br>"; 
         echo ("Password: ".$password."<br>");
         echo ("sha1: ".$sha1."<br>");
         echo "<br>";
        
        
        /* [I.E. 4] (I.EI.E) - Create new email based on status (Staff or Student)
         * 
         * ifelseifelse statement with pregmatch to check $status 
         * 
         * [if]     preg_match looks for [staff]  (case insensitive)
         * [elseif] preg_match looks for [student](case insensitive) 
         *               at variable $status
         *  
         * 
         * If match:       echo new email - Staff Format 
         * Elseif match:   echo new email - Student Format
         * Else (no match):echo warning, exit code
         * 
         * Example: Staff   -> If Echo,     firstname.lastname@wmich.edu
         *          Student -> ElseIf Echo, firstname.mi.lastname@wmich.edu  
         *          Other   -> Else Echo,   Exit Code  
         * 
         * NOTE: strtolower function to format names before parsing email
         *       substr is used for middle intial required for student email 
         */
        
        // Status Check
        // Staff
        if (preg_match("/staff/i", $status)) { 
            echo ("New Staff User Email: ".(strtolower($strFirstName.".".$strLastName)
                ."@wmich.edu"))."<br><br>";
        }
        // Student
        elseif (preg_match("/student/i", $status)){
            echo ("New Student User Email: ".(strtolower($strFirstName."."
                .(strtolower(substr($strMiddleInt,0,1)))."."
                .$strLastName)."@wmich.edu"))."<br><br>";
        }
        // No Match
        else {
            echo ("<span class = 'warning'>Invalid Status!</span>"
                    ." Please enter Student or Staff"."<br><br>");
            exit; 
        }
                    
        ?>
        
    </body>
    <footer>
        <!-- Include file Footer.php to display copyright -->
        <div><?php include 'inc_Lab2Footer_aries0653.php';?></div>
    </footer>     
</html>
