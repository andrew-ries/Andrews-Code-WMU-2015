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

DateTime to include in Lab2aries0653.php

Sets timezone to America/Detroit (EST/EDT Timezone)
$dt = date function with formating [current day spelled out][month 2 digits] 
                                   [day 2 digits] [year 4 digits] 
                                   [hours/minutes/seconds 2 digits each] 
                                   [Timezone abbreviation]
echo Today is... 
 
-->
    
<?php
        
        date_default_timezone_set("America/Detroit");                   
        $dt = date("l, m/d/Y  h:i:sa T");
        echo ("Today is ".$dt."<br>")."<br><br>"; 
     
?>
   