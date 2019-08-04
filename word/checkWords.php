<?php
namespace Word;
session_start();
/** @Author:   Guillermina Gonjon
  * @Date:     July 18th, 2019
  * @App-name: Check word
  * @lisence:  GPL
  * @Stage:    Alpha
  * @version:  0.1
*/
class CreateIntensityLists{
   // Initial string that determines the intensity of prefixes, being 12 the highest rate and -12 the lowest.  This is a extremely short list.  It can be easyly modified and extended.
   
   private $intense_list = 
         "12:ous:great,11:super:top,10:over:execesively,9:prota:priority,8:multi:many,7:ent:full of,6:holic:love,5.5:lov:love,5:hyper:beyound,4:pro:prelude,3:eu:good,2:poli:many,1:en:inside,01:medi:middle,0:semi:partial,-1:an:without,-2:none:absent,-3:hemi:half,-4:acy:being,-5:infra:small,-6:uni:single,-7:exo:out,-8:ex:used to be,-9:dis:negation,-10:itis:desease,-11:under:bellow,-12:less:lack of"; 
		    
		    //private $object;
		    protected $intensity;
		    protected $meaning;
		    private $prefix;
		    
		    function CreateIntensityLists()
		    {         
		          $intense_list = explode(",",$this->intense_list);
		          
		          foreach($intense_list as $key=>$attributes)
		          {
		             $arra_atr = explode(":",$attributes);
		             
		             // Reconfigure array
		             $this->intensity[$arra_atr[1]] = $arra_atr[0];
		             $this->meaning[$arra_atr[1]] = $arra_atr[2];
		             $this->prefix[$arra_atr[0]] = $arra_atr[1];

		          }
            //print_r($this->intensity);
		    }
		    
		    function getIntenseList(){ return $this->intense_list;}
		    function getIntensity(){ return $this->intensity;}
		    function getPrefix(){ return $this->prefix;}
          function getMeaning(){ return $this->meaning;}
		    
}
	
/*class Intensity{
		    private $word_intensity;  
		    private $word_frequency; 
		    private $word_meaning;
}	*/

class CheckWords{
   public $frequency;
   public $word_frequency;
   public $intensity;
   public $meaning;
   private $words;
   private $counter;
   private $checked_word;
   public $time_past;
   public $senses;
   public $list = array('intensity','meaning');
   
   function setList()
   {
      $list = new CreateIntensityLists();
      $list->CreateIntensityLists();
      $this->list['intensity'] = $list->getIntensity();
      $this->list['meaning'] = $list->getMeaning();
      
      return $this->getList();
   }
   
   function checkWord($word,$time_past="",$senses="")
   {
      $this->words[] = $word;
      
      $intensity = $this->checkIntensity($word);
      $frequency = $this->checkFrequency($word)[$word];
      $meaning = $this->checkMeaning($word);
      //$this->time_past[$word] = $this->addTime($word,$time_past);
      //$this->senses[$word] = $this->addSenses($word,$senses);
      
      $check = $intensity.":".$frequency.":".$meaning.":".$time_past.":".$senses;
     
       
      $this->checked_word[$word] = $check;
      print_r($this->getTimePast());
      
   }
   
   function checkFrequency($word)
   {
      // Count how often each word
      $counter = 0;
      $incounter = 0;
      $incount=0;
      $frequency;
      foreach($this->words as $key=>$var)
      {
         if($var == $word)
         { $incounter++;
            if($incount > 0){ $incounter = $incount + 1;}
            $incount = $incounter;
            $this->frequency[$word."_".$key] = $incount; 
            $this->word_frequency[$word] = $incount;
            }
         else{ 
            $incounter = 0;
            $this->frequency[$word] = $incounter;}
            $this->word_frequency[$word] = $incounter;
      }
      
      $this->getFrequency();
      return $this->getWordFrequency();
      
     
      //print_r($frequency);
      //print_r($this->words);
   }
   
   function checkIntensity($word)
   {
      $this->getList();
      $fr;$match;
      foreach($this->list['intensity'] as $key=>$var)
      {
         if(preg_match_all("/$key/",$word, $match))
         {  //print_r($match);echo "$var $word\n";
            $this->intensity = $var;
         }else{ $fr = "no matches found<br>";}
         
      }
     return $this->getIntensity();
   }
   function checkMeaning($word)
   {
      $this->getList();
      foreach($this->list['meaning'] as $key=>$var)
      {
         if(preg_match_all("/$key/",$word, $match))
         {
            $this->meaning = $var;
            
         }//else{ $this->meaning = "<font color='red'>not found</font>";}
      }
      
      return $this->getMeaning();
   }
   /*
   // Add how long since you perceived a word
   function addSenses($word,$senses)
   {
      $this->{"$senses_counter"}++;
      $this->senses[$word."_".$this->{"$senses_counter"}] = $senses;
      //return $senses;
   }
   
   function addTime($word,$time_past)
   {
      $this->{"$time_counter"}++;
      $this->time_past[$word."_".$this->{"$time_counter"}] = $time_past;
      //return $time_past;
   }
   */
   function getCounter(){ return $this->counter++;}
   function getFrequency(){return $this->frequency;}
   function getWordFrequency(){return $this->word_frequency;}
   function getIntensity(){return $this->intensity;}
   function getMeaning(){return $this->meaning;}
   function getWords(){return $this->words;}
   function getCheckedWord(){return $this->checked_word;}
   function getList(){return $this->list;}
   function getTimePast(){ return $this->time_past;}
   function getSenses(){ return $this->senses;}
   
}
echo '<pre>';    
//$list = new CreateIntensityLists();
//print_r($list);
/*
$checkword = new CheckWords();
$checkword->checkWord('love');
$checkword->checkWord('love');
$checkword->checkWord('love');
$checkword->checkWord('love');
$checkword->checkWord('extreme');
$checkword->checkWord('love');
$checkword->checkWord('temper');
$checkword->checkWord('super');
$checkword->checkWord('superman');
$checkword->checkWord('temper');

//print_r($checkword);
*/
class MemoryRate extends CheckWords{
/*
   Memory-rate          = MR
   Frequency of Fact    = F
   Intensity of Fact    = I
   Particip Senses      = P
   Numb Clues           = C
   Time Past (days)     = TP
*/

   private $clues;      // clues to help remember
   public $senses;     
                        // Senses participation (Audio, visual, direct contact)
   private $impact;     // Impat associated
   public $time_past;  // Time past
   //public $frequency;   // Repetitions reinforces memory 
   public $intensity;   // Intensity ( Intensity of words could 
                        // depend on individual personality, culture or 
                        // social bacground)
   public $list = array('intensity','prefix','meaning');
                        // lists
   public $meaning;
   
   function checkWord($word,$var="",$var2="")
   {
      // parent::checkIntensity($word);
      parent::checkMeaning($word)[$word];
      return parent::checkWord($word,$var,$var2);
   }
   
   function checkWords($arg)
   {
      $n_args = func_num_args();
      $arguments = func_get_args();
      for($i=0;$i<$n_args;$i++)
      {
         parent::checkMeaning($arguments[$i])[$arguments[$i]];
         print_r(parent::checkWord($arguments[$i]));
      }
      
   }
   
   function getSensesInvolved(){ return $this->senses_involved;}
   function getClues(){ return $this->clues;}
   function getImpact(){ return $this->impact;}
   function getTimePast(){ return parent::getTimePast();}
   function getSenses(){ return parent::getSenses();}
   function getFrequency(){ return parent::getFrequency();}
   function getIntensity(){ return parent::getIntensity();}
   function getMeaning(){ return parent::getMeaning();}
   //function getList(){ return parent::list;}

}
// Testing classes
$memory_rate = new MemoryRate();
$memory_rate->setList();
/*$memory_rate->checkWord('love',3,2);*/
$memory_rate->checkWord($_GET['word'],$_GET['time'],$_GET['senses']);
$memo = $memory_rate;
$_SESSION['memory_rate'] = $memo;
//$memory_rate->addTime("love",3);
//$memory_rate->addSenses("medieval",1);

/*$memory_rate->checkWords(
                        'maria','american','morena',
                        'azul','lozeta','love','superman',
                        'superman','bionic'
                        );*/


?>
<!DOCTYPE html>
<html>
   <head>
      <title>Determine Word Frequency and Intensity</title>
      <style type="text/css">
       label,input, textarea { font-size: 1.2em; line-height: 1.4em;
                               padding: 4px 12px;
                             }
       input, textarea       { background-color: #eee; 
                               border: 2px solid #ccc; 
                               border-radius: 8px 8px 10px;
                               color:#999;
                             }   
       pre                   { font-family: "Arial, helvetic, sanserif";}  
       h1                    { color: #69f; margin: 0; }
       input.submit          { background-color: #336; color:#fff; font-weight: bold;}            
      </style>
   </head>
   <body>
      <h1>Determine Frequency, Intensity and meaning of Words</h1>
      <form name="words_value" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label>Check Word: </label>
      <input type="text" name="word" value="<?php echo $_GET['word'];?>"/>
      <!--<label>Find Word Frequency: </label>
      <input type="text" name="frequency"/>
      <label>Find Word Meaning: </label>
      <input type="text" name="meaning"/>-->
      <label>Add time past since word was used: </label>
      <input type="text" name="time" value="<?php echo $_GET['time'];?>"/>
      <label>Add senses involved while using word: </label>
      <input type="text" name="senses" value="<?php echo $_GET['senses'];?>"/>
      
       <label>Find Word Value: </label>
      <textarea name="word_value" cols="80" rows="8" value=""><?php print_r($_SESSION['memory_rate']);?></textarea>
      <input class="submit" type="submit" name="submit" value="Submit Word"/>
      </form>
   </body>
</html>
