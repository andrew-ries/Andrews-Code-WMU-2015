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
Allows a user to change the price of a book by entering its ISBN. After
the change display the books in a Web table sorted by price from most to least 
expensive. 

-->
  




<head>
	<title>Andrew's Library</title>
	<meta charset="utf-8">

<!--*** External CSS Link ***-->
<link href="style_aries0653.css" rel="stylesheet">
</head>
<body>
  
  
<!--*** Header ***-->    
<div><?php include 'inc_header_aries0653.php';?></div>
   
   
   
     
<!--*** H tags ***-->        
    <h1>Change Price</h1>    
   
    

<!--*** Form Start ***-->    
    <form method="post" name="Lab4Form" id="Lab4Form" 
          action="price_aries0653.php">
        <fieldset>
            <legend>Change Book Price</legend>
            
            <!-- Form Fields [All Required] -->       
            
            <!-- ISBN13 -->
            <label for="ISBN">ISBN13: </label> 
            <input type="text" name="ISBN" id="ISBN" size="20" 
                                 maxlength="13" placeholder= "0000000000000" 
                                 required="required"><br><br>   
            
             <!-- Price -->
            <label for="price">New Price: </label> 
            <input type="text" name="price" id="price" size="20" 
                                 maxlength="10" placeholder= "100.00" 
                                 required="required"><br><br>
            
            <!--Submit/Reset Buttons -->    
            <input type="submit" value="Submit" name="submitbtn" id="submit">
            <input type="reset">
        </fieldset>
    </form>
    


<?php
//require_once functions
require_once ("inc_functions_aries0653.php");
//require_once connect to db, selects db 
require_once("conn_aries0653.php");


//filter_input from post, manipulate input, RegEx Check
$is = (filter_input(INPUT_POST, 'ISBN'));
$p = (filter_input(INPUT_POST, 'price'));
$isbn      = (trim($is));  
$price     = (trim($p)); 
//if submitbutton is not clicked, die
if (!isset($_POST['submitbtn'])){die;}
ISBNCheck ($isbn);
PriceCheck ($price); 



//Checks if connected to database successfully
$dbConnection = new mysqli($sn, $un, $pw, $dbName);

if ($dbConnection->connect_error)
{
    die ("Connection Failed: ".$dbConnection->connect_error);
}



//Declares the sort and SQL string
$sort = "price";

//SQL: Update table price with user input price, where ISBN = user input isbn
$sqlQuery = 
"UPDATE $tableName SET price='$price' WHERE ISBN='$isbn'"; 

//SQL: Select all from table, sort descending
$sqlQuery2 = 
"SELECT * FROM $tableName GROUP BY $sort DESC";        



//run query
$changeresult = $dbConnection->query($sqlQuery);
$result = $dbConnection->query($sqlQuery2);


//check if there is any data
if ($result-> num_rows > 0)
{
    //Prints the table head which are the fields of the table
    $totalRecords = $result-> num_rows;
    print("<table border=\"1\"<tr><header><h1>Book Inventory</h1></header></tr>".
            "<tr><th>Book Title</th>".
            "<th>Author's First Name</th>".
            "<th>Author's Last Name</th>".
            "<th>Genre</th>".
            "<th>ISBN13</th>".
            "<th>Publisher</th>".
            "<th>Copyright Year</th>".
            "<th>Price</th></tr>");
    
    while($record = $result->fetch_assoc())
    {
        
     //Loops through the table to retrieve all the records of the given fields
        print("<tr><td>{$record['title']}</td>");
        print("<td>{$record['author_firstName']}</td>");
        print("<td>{$record['author_lastName']}</td>");
        print("<td>{$record['genre']}</td>");
        print("<td>{$record['ISBN']}</td>");
        print("<td>{$record['publisher']}</td>");
        print("<td>{$record['yearPublished']}</td>");
        //format price to have 2 decinmal places and a "$" sign
        print("<td class=\"number\">"."$".number_format("{$record['price']}",2)."</td></tr>\n");
        
}       //Tell user how many records are returned
        print("<tr><td colspan=8 class=message>Your query returned ".
                $totalRecords." books.</td></tr>");
        print("</table>\n");
} else {
            print("No books for you!");
            die;
       }
       

       
//Close db connection
$dbConnection -> close();       

?>

<!--*** Footer ***-->
    <hr>
    <footer>
        <!-- Include Footer [Nav & Date] -->
        <div><?php include 'inc_navigation_aries0653.php';?></div> 
    </footer>   
</body>
</html>





