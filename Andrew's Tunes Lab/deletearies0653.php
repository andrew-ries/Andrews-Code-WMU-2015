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

Drop Form: Deletes songs based on
    1) Amount of songs to delete
    2) Position to start deleting songs
    [1,x] where x is position can be used to delete a singular song, respectively
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
<form method="post" name="DropForm" id="DropForm" 
          action="deletearies0653.php">
        <fieldset>
            <legend>Delete Songs</legend>
            
            <!-- Form Fields -->
            <!-- 1-10 Number Selector: Number of Songs -->
            <h3>How Many Songs Would You Like To Delete?</h3>
            <label for="songPosition">Number of Songs:</label><br>
            <input type="number" name="sNumber" id="sNumber" min="1" max="10" required="required" >
            <br><br>
            
            <!-- 1-10 Number Selector: Song Position -->
            <h3>At What Rank Would You Like To Start Deleting Songs?</h3>
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
    
//$songPosition denotes where to start deletion 
$songPosition = ((filter_input(INPUT_POST, 'songPosition'))-1);
//$sNumber denotes number of songs user wishes to delete
$sNumber = filter_input(INPUT_POST, 'sNumber');


//SpliceArrayDROP: Deletes Song(s), Returns ! [See inc_func.php]
$dropSong = SpliceArrayDrop($songArray,$songPosition,$sNumber);       
        

//Saves new array [See inc_func.php] 
SaveMe ($dropSong); 
//Creates table [See inc_func.php]
CreateTable ($dropSong); 
   
?>


<footer>
<!-- Include Footer [Nav & Date] -->
        <div><?php include 'inc_navigationaries0653.php';?></div> 
</footer>
</body>
</html>