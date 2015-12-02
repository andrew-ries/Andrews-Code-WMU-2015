<!-- 
Programmer: Andrew Ries
Class ID: aries0653
Lab 4  
CIS 2800: Internet Programming
Fall 2015
Due date: 12/01/15
Date completed: 12/01/15
*************************************

Included Functions for Lab 4 


--> 

<?php



/*****************************************************************************/
/**** Function MultiCheck ****************************************************/

//Check for "Title"
function MultiCheck ($Title)
{
//check for letters,whitespace,and "'"
 if (!preg_match_all("/[a-z]+\s*\'*/i",($Title))) {
          
    echo ("<span class = 'warning'>Invalid!</span>"."<br>"
                ."Please use only characters A-Z, spaces, and '''."."<br>");
     die;
     
 }
 
 //Replaces extended spaces, tabs, new lines, with a single space.
 else {
     
     preg_replace('/\s\s+/', ' ',$Title);                                 
       }    
       
}


/*****************************************************************************/
/**** Function NameCheck ****************************************************/
function NameCheck ($name)
{
 //checks for letters   
 if (preg_match("/[a-z]+/i",$name)) {
            
        }
        else {                              
            echo ("<span class = 'warning'>Invalid Name!</span>"."<br>"
                    ."Please use only characters A-Z for the name."."<br>");
            die; 
        }     
}


/*****************************************************************************/
/**** Function ISBNCheck ****************************************************/
function ISBNCheck ($ISBN)
{
//checks for exactly 13 digits 
 if (preg_match("/[0-9]{13}/",$ISBN)) {
            
        }
        else {                              
            echo ("<span class = 'warning'>Invalid ISBN!</span>"."<br>"
                    ."Please use 13 characters [0-9] for the ISBN."."<br>");
            die; 
        }     
}


/*****************************************************************************/
/**** Function PublisherYearCheck ****************************************************/
function PubYearCheck ($pubyear)
{
 //checks for exactly 4 digits    
 if (preg_match("/[0-9]{4}/",$pubyear)) {
            
        }
        else {                              
            echo ("<span class = 'warning'>Invalid Year!</span>"."<br>"
                    ."Please use only characters 0-9 for the Published Year."."<br>");
            die; 
        }     
}

/*****************************************************************************/
/**** Function PriceCheck ****************************************************/
function PriceCheck ($cash)
{
//checks for [NOT] xxx.xx price format    
 if (!preg_match("/[0-9]+\.[0-9]{2}/",$cash)) {
     //checks for [NOT] xxx price format echo respective message      
     if(!preg_match("/[0-9]+/",$cash)) {
         
        echo ("<span class = 'warning'>Invalid Price!</span>"."<br>"
                ."Please use only characters 0-9 and '.' for the Price."."<br>");
        die;      
     }  
    
     else {
        echo ("<span class = 'warning'>Invalid Price!</span>"."<br>"
                ."Please add the decimal amount to the price [2 digits]."."<br>");
        die;
     }       
}       
}

