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

Included Functions for Lab3 


--> 

<?php
/*****************************************************************************/
/**** Function FileExists ****************************************************/

function FileExists ($array)
{
/* TRY: 
 *  IF: file "tunes.txt" exists, get file "tunes.txt", explode w/ "|" into $array, return $array
 *  
 *  ELSE: file does not exist, throw exception   
 * CATCH: fwrite new "tunes.txt" file into $array w/ placeholder songs
 *      IF/ELSE: Did it work? "Please Refresh"
 */
try {    
  if (file_exists('tunes.txt'))
  {
      $array = explode("|", (file_get_contents('tunes.txt')));
      return $array;
  }
  else
  { 
      throw new Exception ("<h2>"."File does not exist! Creating new file - tunes.txt"."</h2>"
              ."<br><br>"); 
  }     
}
catch (Exception $e) {
    // Throw Exception
    echo'<h2>'.'ERROR: '.'<h2>' .$e->getMessage();
    
    //Creation of tunes.txt file if it is found to not exist
    $array = fopen('tunes.txt', 'w+')
      OR die ("Can't open file\n");
    
    //Placeholder Song Titles writen
     $result = fwrite ($array, "Song1|Song2|Song3|Song4|Song5|Song6|Song7|Song8|Song9|Song10");

     if ($result)
     {  echo "<h2>"."New file created!   Please Refresh The Page."."</h2>"."<br><br>";} 
     
     else 
     {  echo "Data write failed.<br>";}
     
   fclose($array);  
   exit;
}
 
}



/*****************************************************************************/
/**** Function CreateTable ***************************************************/
function CreateTablev2 ($array)
{
/* Create Table:
 *  count given $array as $arrayCount
 *  table_start
 *  for arrayCount > 0, add table elements
 *  table_end
 */   

    $arrayCount = count($array);
    echo '<table>';
    echo '<th colspan="2"> "Andrews Favorite Songs"';
    
    // as long as arraycount > 0, add table elements
    for ($i = 0; $i < $arrayCount; $i++)
    { 
        $value = $array[$i];
        echo '<tr>';
        echo '<td>'.($i+1).'</td>';
        echo '<td>'.$value.'</td>';
        echo '</tr>';
    }
    
    echo '</table>'.'<br>'; 
  }  

  
  
/*****************************************************************************/
/**** Function CreateTable ***************************************************/
function CreateTable ($array)
{


    
    echo '<table>';
    echo '<th colspan="2"> "Andrews Favorite Songs"';
    
    $count =1;
    foreach ($array as $value)
    { 
        echo '<tr>';
        echo '<td>'.$count++.'</td>';
        echo '<td>'.$value.'</td>';
        echo '</tr>';
    }
    
    echo '</table>'.'<br>'; 
  }    
  
  
/******************************************************************************/
/**** Function SpliceArrayADD *************************************************/

function SpliceArrayAdd ($array, $songPosition, $songName) 
{
/* ARRAY_SPLICE: 
* First Line: takes POST user input and adds song to $array using user-defined position
*       $songPosition and name $songName. 0 denotes no deletion on add
* Second Line: Nukes everything after the "10th" element
* Third Line: Return $array for further use
*/  
    
array_splice($array, $songPosition, 0, $songName);
array_splice($array, 10);
return $array;
} 



/******************************************************************************/
/**** Function SpliceArrayDROP ************************************************/

function SpliceArrayDrop ($array, $songPosition, $sNumber) 
{
/* ARRAY_SPLICE: 
*   Takes POST user input and deletes songs from $array using user-defined position
*       $songPosition and number of songs to delete $sNumber.   
*   Return $array for futher use
*/  
    
array_splice($array, $songPosition, $sNumber);
return $array;
} 




/******************************************************************************/
/**** Function SliceArrayTOP **************************************************/

function SliceArrayTop ($array, $tNumber) 
{
/* ARRAY_SLICE: 
*   Takes POST user input and creates a "list of top songs" on $topArray
*       using user-defined number $tNumber. 0 denotes "start top list from #1"
*  IF: If $tNumber isset, continue to IFELSE, otherwise move to return
*  IFELSE:
*   Echo message for user based on $tNumber for grammar (if more than one song 
*       use "s", respectivly)  
*  Return $topArray for futher use 
*  
* NOTE: It is my understanding that because slice does not change values in the array
*   unlike splice, it is nessasary to assign the sliced part of the array to an 
*   additional variable as shown
*/  
    
$topSongs = array_slice($array, 0, $tNumber);


    if (isset($tNumber))
    {    
     if ($tNumber > 1)
     { 
          echo '<h2>'."These Are The Top $tNumber Songs!".'</h2>'; 
      } 
      else
      {
           echo '<h2>'."This Is The Number $tNumber Song!".'</h2>';
      }
    }  
return $topSongs;
}



/*****************************************************************************/
/**** Function SaveMe ***************************************************/

function SaveMe ($array) 
{
/* IMPLODE & SAVE:
 *  First Line: Implodes newly edited array w/ "|", assigns to $newSave
 *  Second Line: Saves newly imploded string to tunes.txt
 *  Third Line: Saves to backups dir w/ microtime stamp
 */  

$newSave = implode("|",$array);
file_put_contents('tunes.txt',$newSave);
file_put_contents("backups/".microtime("tunes.txt"),$newSave);

}  

/*****************************************************************************/
/**** Function DupeChecker ***************************************************/

function DupeChecker ($songName,$songArray)
{
/* Simply checkes each array index value against the POST from the user imput 
 * to see if it is the same song. Echo message if it is
 * 
 */  

if ($songName === $songArray [0]
        OR $songName === $songArray [1]
        OR $songName === $songArray [2]
        OR $songName === $songArray [3]
        OR $songName === $songArray [4]
        OR $songName === $songArray [5]
        OR $songName === $songArray [6]
        OR $songName === $songArray [7]
        OR $songName === $songArray [8]
        OR $songName === $songArray [9]) 
{
echo '<h2>'."No Duplicates You Dope!".'</h2>'; 
echo '<br>'.'<br>';
include 'inc_navigationaries0653.php'; 
die;
}
}