<?php
namespace words;
require_once("Words.php");


use words\Words;
use PDO;
class InsertWords extends Words{
    function insertWords()
    {
        $alphabet = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        //$alphabet = array("S","T","U","V","W","X","Y","Z");
        $query = null;
		$lines = '';
        
        $word = new Words();
        
        foreach($alphabet as $key=>$value)
        {
        
        
            foreach($word->findChars($value) as $id=>$var){
		$var = str_ireplace("'","\'",$var);
		$query .=  "INSERT into `wordsl`(`id`,`word`,`beginswith`,`type`) VALUES('$value$id','$var','$value','noun');"."\n";
	    }
		
			
        }
        
        return $query;
    }

}

echo "<pre>";
$insertWords = new InsertWords();

//print_r($insertWords->insertWords());
//$array = null;
/*print "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><table border='1' valign='top'><tr>";
foreach($alphabet as $key=>$value)
{
   print "<td valign='top'><h3>"; print $key+1; print ":$value</h3>";
   
    print(${"$$value"} = $word->findChars("$value"));
   print "</td>";
    if($value != $value){ echo '</tr><tr>';}
}
print "</tr><table>";

$dbh = new PDO('mysql:host=localhost;dbname=test', 'root, '');*/

/*
 * Testing class Insert Words
 * It returns a tale of nouns
 */
$dbh = new PDO('mysql:host:localhost;dbname=words','root','');
//foreach($insertWords->insertWords() as $value)
//{
	echo $insertWords->insertWords();
    $dbh->exec($insertWords->insertWords());
//}



