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

Top Song Form: User can select and show a top number of songs

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
<form method="post" name="TopForm" id="TopForm" 
          action="toparies0653.php">
        <fieldset>
            <legend>Select Top Songs!</legend>
            
            <!-- Form Fields -->
            <!-- 1-10 Number Selector: Number of Songs -->
            <h3>How Many Songs Would You Like To Include?</h3>
            <label for="songPosition">Number of Songs:</label><br>
            <input type="number" name="tNumber" id="tNumber" min="1" max="10" required="required" >
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
*       creates new one if it doesn't. ! see inc_func.php 
*/
$emptyArray = []; 
$songArray = FileExists ($emptyArray);


// Gathers post data from current form, Filter_input to optionally validate post input
    // FILTER SET TO: FILTER_DEFAULT (NONE)
    // -1 to make computer 0 a human "1"

// $tNumber denotes number of songs to put in "list of top songs"
$tNumber = filter_input(INPUT_POST, 'tNumber');


//SliceArrayTop: "List of top songs" as denoted by user input ![See inc_func.php]
$topSongs = SliceArrayTop($songArray,$tNumber);
//$a = array_slice($songArray, 0, $tNumber);

//Creates table [See inc_func.php]
CreateTable ($topSongs); 

 
?>


<footer>
<!-- Include Footer [Nav & Date] -->
        <div><?php include 'inc_navigationaries0653.php';?></div>   
</footer>
</body>
</html>