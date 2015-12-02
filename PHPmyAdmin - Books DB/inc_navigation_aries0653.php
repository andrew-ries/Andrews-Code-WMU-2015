<!DOCTYPE html>
<html lang="en">   
<!--
Programmer: Andrew Ries
Class ID: aries0653
Lab 4  
CIS 2800: Internet Programming
Fall 2015
Due date: 12/01/15
Date completed: 12/01/15
*************************************
Navigation/Footer to include in Lab 4


-->

<div class="MainContainer">
</div>  
<div class="MenuContainer">
    <ul id="navigation">
        <li class="x"><a title="Book Inventory" href="lab4_aries0653.php" >Add Book</a></li>
        <li class="x"><a title="Select by Genre" href="genre_aries0653.php" >Select by Genre</a></li>
        <li class="x"><a title="Select by Year" href="year_aries0653.php" >Select by Year</a></li>
        <li class="x"><a title="Delete Book by ISBN" href="delete_aries0653.php" >Delete a Book</a></li>
        <li class="x"><a title="Change Book Price" href="price_aries0653.php" >Change Book Price</a></li>
    </ul>
</div> 
<!-- PHP Segment to output current user time, date, and copyright -->
<div class="MenuContainer">
<?php date_default_timezone_set("America/Detroit");                   
      $dt = date("l, m/d/Y  h:i:sa T");
      echo ($dt."<br>");?> 
Copyright &copy; Andrew's Library  
</div> 

