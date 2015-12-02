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
Form Page for Lab 4. 
Displays:
    Main Form

Main Page for adding a book and displaying book inventory

Forms length is set to corresponding length in PHPmyadmin
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
    <h1>Inventory Addition Form</h1>    
   
    
  
  
<!--*** Form Start ***-->    
    <form method="post" name="Lab4Form" id="Lab4Form" 
          action="lab4_aries0653.php">
        <fieldset>
            <legend>Add a Book</legend>
            
            
            
            <!-- Form Fields [All Required] -->
            
             <!-- Book Title -->
            <label for="title">Book Title: </label>
            <input type="text" name="title" id="title" size="50" 
                                 maxlength="50" placeholder= "Wealth of Nations" 
                                 required="required"><br><br>
            
             <!-- Author's first name -->
            <label for="author_firstName">Author's First Name: </label> 
            <input type="text" name="author_firstName" id="author_firstName" 
                                 size="50" 
                                 maxlength="40" placeholder= "Adam" 
                                 required="required"><br><br>   
            
            <!-- Author's last name -->
            <label for="author_lastName">Author's Last Name: </label> 
            <input type="text" name="author_lastName" id="author_lastName" 
                                 size="50" 
                                 maxlength="40" placeholder= "Smith" 
                                 required="required"><br><br>   
            
            <!-- Genre -->
            <label for="genre">Genre: </label> 
            <input type="text" name="genre" id="genre" size="50" 
                                 maxlength="35" placeholder= "Freedom" 
                                 required="required"><br><br>   
            
            <!-- ISBN13 -->
            <label for="ISBN">ISBN13: </label> 
            <input type="text" name="ISBN" id="ISBN" size="20" 
                                 maxlength="13" placeholder= "0000000000000" 
                                 required="required"><br><br>   
           
            <!-- Publisher -->
            <label for="publisher">Publisher: </label> 
            <input type="text" name="publisher" id="publisher" size="50" 
                                 maxlength="40" placeholder= "Franklin Printing" 
                                 required="required"><br><br>   
            
            <!-- Copyright Year -->
            <label for="yearPublished">Copyright Year: </label> 
            <input type="text" name="yearPublished" id="yearPublished" size="20" 
                                 maxlength="4" placeholder= "1776" 
                                 required="required"><br><br>   
            
            
            <!-- Price -->
            <label for="price">Price: </label> 
            <input type="text" name="price" id="price" size="20" 
                                 maxlength="10" placeholder= "100.00" 
                                 required="required"><br><br>   
            
            
            <!--Submit/Reset Buttons -->    
            <input type="submit" value="Submit" name="submitbtn" id="submit"> 
            <input type="reset">
        </fieldset>
    </form>

<!-- PHP -->  
<?php
//require_once functions
require_once ("inc_functions_aries0653.php");
//require_once connect to db, selects db 
require_once("conn_aries0653.php");

//filter_input from POST form
$t = (filter_input(INPUT_POST, 'title'));
$fn = (filter_input(INPUT_POST, 'author_firstName'));
$ln = (filter_input(INPUT_POST, 'author_lastName'));
$gn = (filter_input(INPUT_POST, 'genre'));
$is = (filter_input(INPUT_POST, 'ISBN'));
$pb = (filter_input(INPUT_POST, 'publisher'));
$yp = (filter_input(INPUT_POST, 'yearPublished'));
$p = (filter_input(INPUT_POST, 'price'));

//manipulating user form input for less errors/security
$title = (ucwords(strtolower(trim($t)))); 
$firstName = (ucfirst(strtolower(trim($fn))));
$lastName  = (ucfirst(strtolower(trim($ln))));
$genre     = (ucwords(strtolower(trim($gn))));
$isbn      = (trim($is)); 
$pub       = (ucwords(strtolower(trim($pb))));
$yPub      = (trim($yp)); 
$price     = (trim($p)); 


//if submitbutton is not clicked, die
if (!isset($_POST['submitbtn'])){die;}

//RegEx Functions Run on each input field, see [inc_functions_aries0653]
// Grouped by function, not order
MultiCheck ($title);
MultiCheck ($genre);
MultiCheck ($pub);
NameCheck ($firstName);
NameCheck ($lastName);
ISBNCheck ($isbn);
PubYearCheck ($yPub); 
PriceCheck ($price); 
        


//Checks if connected to database successfully
$dbConnection = new mysqli($sn, $un, $pw, $dbName);

if ($dbConnection->connect_error)
{
    die ("Connection Failed: ".$dbConnection->connect_error);
}


//Declares the sort and SQL string
$sort = "author_lastName";

//SQL: Insert post data into corresponding column in sql, $tableName defines table
$sqlQuery2 = 
"INSERT INTO $tableName (title, author_firstName, author_lastName, 
    genre, ISBN, publisher, yearPublished, price)
    
VALUES ('$title','$firstName','$lastName','$genre','$isbn','$pub', '$yPub', '$price')"; 

//SQL: Display all, sort
$sqlQuery = "SELECT * FROM $tableName ORDER BY $sort";




//run queries
$insresult = $dbConnection->query($sqlQuery2);
$result = $dbConnection->query($sqlQuery);

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
        
}
        //Tell user how many records are returned
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





