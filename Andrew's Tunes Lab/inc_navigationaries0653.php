<!DOCTYPE html>
<html lang="en">   
<!-- 
Programmer: Andrew Ries
Class ID: aries0653
Lab 3
CIS 2800: Internet Programming
Fall 2015
Due Date: 11/15/15
Date Completed: 11/15/15
***********************************
Program Explanation

Navigation/Footer to include in Lab3


-->

<div class="MainContainer">
</div>  
<div class="MenuContainer">
    <ul id="navigation">
        <li class="x"><a title="Display Songs" href="Lab3aries0653.php" >Display Songs</a></li>
        <li class="x"><a title="Add Songs" href="addaries0653.php" >Add Songs</a></li>
        <li class="x"><a title="Delete Songs" href="deletearies0653.php" >Delete Songs</a></li>
        <li class="x"><a title="Sort Ascending" href="sortAscaries0653.php" >Sort Ascending</a></li>
        <li class="x"><a title="Sort Descending" href="sortDescaries0653.php" >Sort Descending</a></li>
        <li class="x"><a title="Top Songs" href="toparies0653.php" >Top Songs</a></li>
        <li class="x"><a title="Display Backups" href="displayBackupsaries0653.php" >Display Backups</a></li>
    </ul>
</div> 
<!-- PHP Segment to output current user time, date, and copyright -->
<div class="MenuContainer">
<?php date_default_timezone_set("America/Detroit");                   
      $dt = date("l, m/d/Y  h:i:sa T");
      echo ($dt."<br>");?> 
Copyright &copy; Andrew's Tunes  
</div> 

