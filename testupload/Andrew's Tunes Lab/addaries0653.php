<!DOCTYPE html>
<html lang="en">  
<!-- 

Programmer: Andrew Ries
Class ID: aries0653
Lab 3
CIS 2800: Internet Programming
Fall 2015
Due date: 11/18/15
Date completed: 11/18/15
*************************************
Program Explanation

Add Form: Adds a song based on 
    1) Song Name
    2) Position To Enter Song
post data stays here, runs through functions


--> 

<head>
    <title>Lab 3</title>
    <meta charset="utf-8">
    <link href="aries0653CSS.css" rel="stylesheet">
   
</head>
<body>
     <!-- Include Header -->
<div><?php include 'inc_headeraries0653.php';?></div>
    
    
<!-- FORM START -->    
<form method="post" name="AddForm" id="AddForm" 
          action="addaries0653.php">
        <fieldset>
            <legend>Add Song</legend>
            
            <!-- Form Fields -->
            <!-- Song Name -->
            <label>Song Name: <input type="text" name="songName" id="songName" size="30" 
                                 maxlength="40" required="required"></label><br><br>
            
            <!-- 1-10 Number Selector: Song Position -->
            <label for="songPosition">Song Position:</label><br>
            <input type="number" name="songPosition" id="songPosition" min="1" max="10" required="required" >
            <br><br>
            
            
       
            <!--Submit/Reset Buttons -->    
            <input type="submit" value="Submit" id="submit"> 
            <input type="reset">
        </fieldset>
    </form>    

<!-- PHP -->
<?php
// See file for extended definitions of included functions
require 'inc_functionsaries0653.php';     

  
/**** INVOKE FUNCTIONS HERE  **************************************************/  
/* $emptyArray: placeholder array for proceeding functions
*  FileExists:  Checks if tunes.txt file exists, gets contents & explodes if it does
*       creates new one if it doesn't. ![See inc_func.php] 
*/
$emptyArray = []; 
$songArray = FileExists ($emptyArray);


// Gathers post data from current form, Filter_input to optionally validate post input
    // FILTER SET TO: FILTER_DEFAULT (NONE) 
    // -1 to make computer 0 a human "1"

//$songPosition denotes where to insert song
$songPosition = ((filter_input(INPUT_POST, 'songPosition'))-1);
//$songName denotes name of song
$songName = (filter_input(INPUT_POST, 'songName'));

//Checks for duplicate songs ![See inc_func.php]
DupeChecker($songName,$songArray);
//SpliceArrayADD: Adds Song, Splices Array to 10, Returns ![See inc_func.php]
$addSong = SpliceArrayAdd($songArray,$songPosition,$songName);


//Saves new array [See inc_func.php] 
SaveMe ($addSong); 
//Creates table [See inc_func.php]
CreateTable ($addSong); 

?>


<footer>
<!-- Include Footer [Nav & Date] -->
        <div><?php include 'inc_navigationaries0653.php';?></div>  
</footer>
</body>
</html>