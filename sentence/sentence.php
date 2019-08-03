<?php
/** @author: Guillermina Gonjon
  * @name:   Sentence Elements Finder
  * @date:   August 2nd, 2019
  */
namespace sentence;

class sentence{
   private $sentence;
   private $sentence_id;
   
   function __CONSTRUCT($sentence)
   {
      foreach($this->replacePunctuation($sentence) as $key=>$word)
      {
         $this->getSentenceId();
         $this->word($word);
      }
      
   }
   
   function word($word)
   {
      /** 
       * This is the heart of this class. 
       * @returns an array of words, one word at the time
       * Shouldn't be call directly.  It should work from the 
       * constructor 
       */
       
      // List of Elements of a sentence
       $elements = array( 
       "article"=>file_get_contents("language_data/article.txt"),
       "adjective"=>file_get_contents("language_data/adjective.txt"),
       "name"=>file_get_contents("language_data/names.txt"),
       "noun"=>file_get_contents("language_data/nouns.txt"),
       "pronoun"=>file_get_contents("language_data/pronoun.txt"),
       "verb"=>file_get_contents("language_data/verb.txt"),
       "helping_verb"=>file_get_contents("language_data/helping_verb.txt"),
       "interjection"=>file_get_contents("language_data/interjection.txt"),
       "conjunction"=>file_get_contents("language_data/conjunction.txt"),
       "question"=>" what, when, where, how, how, much, which, who, whom, why, ",
       "preposition"=>" in, out, at, on, over, under, but, to, too, for, of, up, down, beside, also, so, ",
        "plural"=>"s, es",
        "negation"=>"no, not, neither, none, nore",
        "punctuation"=>" ., ?, !, :, ;, ', ,, "
      );
      
      // This function does most of the work
      foreach($elements as $key=>$element)
      { 
         $word = strtolower($word);
         if(strstr("ing", "$word, "))
         { $element = str_replace("ing",'', $word);}
         if(strstr($element," $word, "))
         { $this->word[ $this->sentence_id ] 
         = "[ $key ] $word"; }else{}
         
      }
   }
   
   // Simpy check for punctuation to separate sentences in
   // case of paragraphs
   function replacePunctuation($sentence)
   {
      $new_sentence = str_replace('.', " .",$sentence);
      $sentence = str_replace(',', " ,",$new_sentence);
      $new_sentence = str_replace(':', " :",$sentence);
      $sentence = str_replace('?', " ?",$new_sentence);
      $new_sentence = str_replace('!', " !",$sentence);
      $sentence = str_replace(';', " ;",$new_sentence);
      //echo $sentence;
         $mysentence = explode(" ", $sentence);
         //echo '<pre>';print_r($mysentence);echo '</pre>';
         return $mysentence;
      
   }
   
   function getSentence(){ return $this->sentence;}
   function getSentenceId(){ return $this->sentence_id++;}

}

$sentence = new sentence($_GET['sentence']);
//echo '<pre>';print_r($sentence);echo '</pre>';
?>
