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

Sort Songs Ascending 


--> 

<head>
    <title>Lab 3</title>
    <meta charset="utf-8">
    <link href="aries0653CSS.css" rel="stylesheet">
   
</head>

<body>
    <!-- Include Header -->
<div><?php include 'inc_headeraries0653.php';?></div>
     
    
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


//Sorts Array by value [Ascending] 
asort($songArray);
//print_r($songArray);

//Creates table [See inc_func.php]
CreateTable ($songArray); 
 
?>
<h2>Songs In Ascending Order</h2>


<footer>
<!-- Include Footer [Nav & Date] -->
        <div><?php include 'inc_navigationaries0653.php';?></div>    
</footer>
</body>
</html>