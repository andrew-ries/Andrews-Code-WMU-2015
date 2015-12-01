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

**Revision Date: 11/29/15**
*Notepad.txt.
*************************************
Program Explanation

Processing Script/Index Page for:
    Andrew's PHP Tunes Application 

This collection of .php files shows array manipulation and form processing
to display a list of up to 10 songs in various formats, and manipulate that data. 


Features Include:
    Display Songs [Creates new file if none exists]
    Adding A Song
    Deleting Songs
    Sorting Ascending
    Sorting Descending
    Top Song Selection
    Backups
    
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
*       creates new one if it doesn't. ![See inc_func.php] 
*/
$emptyArray = []; 
$songArray = FileExists ($emptyArray);

// CreateTable Creates a table out of $songArray. ![See inc_func.php]
CreateTable ($songArray);   
?>


<footer>
<!-- Include Footer [Nav & Date] -->
        <div><?php include 'inc_navigationaries0653.php';?></div>  
</footer>
</body>
</html>