<?php
/**
 * @author:   Guillermina Gonjon
 * @contact:  ggonjon@gmail.com
 * @name:     Sentence builder 
 * @date:     August 3, 2019
 */   

class SentenceBuilder{
 private $sentence;

  private $subject;
  private $predicative;
  
  function __tostring()
  {
    $this->defineSubject($article='',$noun='',$adjective='',$pronoun='');
    $this->definePredicative($verb='',$helping_verb='',$adverb='',$object_pronoun='',$reflexive_pronoun, $adverbial_preposition='');
    $this->buildSentence();
  }
  
    static function 
defineSubjects ($article='',$noun='',$adjective='',$pronoun='')
  {
    $subject = '';
    
    if(isset($pronoun)){ $subject = "$article $adjective $noun "; }
    elseif(isset($noun)){ $subject = "$article $adjective $pronoun "; }
    elseif((isset($pronoun))&&(isset($article))){ $subject = "$adjective 
$noun "; }
    elseif((isset($noun))&&(isset($article))&&(isset($adjective))){ 
$subject = "$pronoun "; }
    elseif(isset($noun)){ $subject = "$article $adjective $pronoun "; 
    
    }
    
    return $subject;
  
  }
   
  function defineSubject($article='',$noun='',$adjective='',$pronoun='')
  {
    if(isset($pronoun)){ $this->subject = "$article $adjective $noun "; }
    elseif(isset($noun)){ $this->subject = "$article $adjective $pronoun "; }
    elseif((isset($pronoun))&&(isset($article))){ $this->subject = "$adjective $noun "; }
    elseif((isset($noun))&&(isset($article))&&(isset($adjective))){ $this->subject = "$pronoun "; }
    elseif(isset($noun)){ $this->subject = "$article $adjective $pronoun "; }
  
  }
  
   function definePredicative($verb='',$helping_verb='',$adverb='',$object_pronoun='',$reflexive_pronoun, $adverbial_preposition='')
  {
    if(isset($helping_verb))
    { 
      $this->predicative = "$verb $adverb $object_pronoun $adverbial_preposition 
$reflexive_pronoun "; 
    }
    elseif((isset($helping_verb))&&(isset($object_pronoun)))
    { 
      $this->predicative = "$verb $adverb $object_pronoun  
$adverbial_preposition $reflexive_pronoun"; 
    }
    elseif((isset($helping_verb))&&(isset($object_pronoun))&&(isset($reflexive_pronoun)))
    { 
      $this->predicative = "$verb $adverb $object_pronoun  
$adverbial_preposition $reflexive_pronoun"; 
    }
    elseif((isset($adverbial_preposition))&&(isset($adverb))&&(isset($helping_verb))&&(isset($reflexive_pronoun)))
    {$this->predicative = "$verb"; }
    
  }
  
  function buildSentence()
  {
    $this->sentence = $this->getSubject() . $this->getPredicative() ."<br>";
    

  }
  
  function buildQuestion($question_word='',$verb='',$subject=''){
  
  }
  
  // Getters
  function getSubject(){ return $this->subject; }
  function getPredicative(){ return $this->predicative; }
  function getSentence(){ return $this->sentence; }
  
  

}

$sentence = new SentenceBuilder();
print_r($sentence);

echo "\n<br/>static function: ";
print Sentence::defineSubjects('a','home','beautiful','it');

