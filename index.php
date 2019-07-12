<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sentence</title>
        <link href="css/style.css" type="text/css" rel="stylesheet" rev="stylesheet" media="all">
    </head>
    <body>
      <h1>Sentence</h1>
      <h2>Add a sentence or group of sentences in the text box to see the parts of your sentences.</h2>
        <form name="sentence" method="get" action="index.php">
        <textarea name="add_sentence" class="sentence" value=""></textarea>
        <input type="submit" name="submit" value="Add">
        </form>
        <!-- Result -->
        <pre>
 
        </pre>
    </body>
</html>
       <?php
        echo '<pre>';
        
        print_r($_GET);
        if(isset($_GET['add_sentence']))
        { 
            $sentence = $_GET['add_sentence'];
        }else{ 
            $sentence = "This is a book, and I love it! Minerba got it for me. Que maravilla! It's the best that could happen to me."; 
            }
        
        // put your code here
        require_once("./Upload.php");
        //require_once("./language/Words.php");
        require_once("./language/SentenceElements.php"); 
        require_once("./language/WordRating.php");
        
        $r = new WordRating();
        $b = new SentenceElements();
        //print_r($b->bindElements($sentence));
        $sentences = $b->brakeParagraph($sentence);
        foreach($sentences as $value)
        {
            print_r($b->sentenceBinder($value));
        }
        $b->parsePunctuation($sentence);
        $r->setWordIntensity();
        $r->findFrequency("love");
        $r->setWordFrequency("love");
        var_dummp($r->getWordFrequency());
        var_dump($r->getWordIntensity());
        echo "<pre>";
$word = new Words();
$alphabet = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
print $word->insertWords();

        //var_dump($r);

        ?>

