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

Backup Display
Shows all backups when user enters session of add or drop

--> 

<head>
    <title>Lab 3</title>
    <meta charset="utf-8">
    <link href="aries0653CSS.css" rel="stylesheet">
    <style>
        table{ width: 40%;}  
    </style>
</head>
<body>
    <!-- Include Header -->
<div><?php include 'inc_headeraries0653.php';?></div>
    
    
    
<!-- PHP -->    
<?php

// $dir is assigned to "./" - current dir, looks for folder "/backups"
$dir = "./backups";
// if $dir is a directory, echo table headings
// 
if (is_dir($dir)) {
        echo("<table border='1' width='100%'>\n");
        echo("<tr><th>Filename</th><th>File Size</th>
                <th>File Type</th></tr>\n");
        
        
//$direentries is assigned by scandir, scandir lists files and directories inside path         
$dirEntries = scandir($dir);

// Sort: newest backup first
rsort($dirEntries);

/*for each file(backup entry),echo a row, cell, hyperlinked file name, file path, file size, filetype
 *  into corresponding table cell
 */
foreach ($dirEntries as $file) {
    $entry = ($dir . "/" . $file);
     echo("<tr><td>"."<b><div class='butable'><a href='backups/".$file."' target='_blank'>".$file.".txt".
             "</a></div></b></div>"."</td><td>".
     filesize($entry)."</td><td>" .        
     filetype($entry)."</td></tr>\n");
}
 echo("</table>\n");
}
// If directory does not exist.... 
else {
echo("<p>The directory " . htmlentities($dir) . " does not exist.</p>");
}

   
?>

<footer>
<!-- Include Footer [Nav & Date] -->
        <div><?php include 'inc_navigationaries0653.php';?></div>  
</footer>
</body>
</html>