<?php

class Pronoun{
	
	  public $pronouns = '&I,you,he:she:it,we,you,they
						 &me,you,him:her:it,us,you,them
						 &mine,yours,his:hers:its,ours,yours,theirs
						 &myself,yourself,himself:herself:itself,ourselve,yourselve,themselve';
  
}

class pronounDecoder{
  
  static function pronounDecode($pronoun)
  {
    /**
     * s -> single
       p -> plural
	   1 -> first
	   2 -> second
	   3 -> third
       u -> undefined
       f -> female
	   m -> male
       N -> neutral
	   O -> object pronoun
	   P -> posessive_pronoun
	   R -> reflexive_pronoun
     */
	$id;
    switch($pronoun){
      case 'I':
	$id = 's1N';
	break;
      case 'you':
	$id = 's2N';
	break;
      case 'he':
	$id = 's3Nm';
	break;
      case 'she':
	$id = 's3Nf';
	break;
      case 'it':
	$id = 's3Nu';
	break;
      case 'we':
	$id = 'p1N';
 	break;
      case 'you':
	$id = 'p2N';
	break;
      case 'they':
	$id = 'p3N';
	break;
// ------------------------	  
      case 'me':
	$id = 's1O';
      break;
      case 'you':
	$id = 's2O';
      break;
      case 'him':
	$id = 's3Om';
      break;
      case 'her':
	$id = 's3Of';
      break;
      case 'it':
	$id = 's3Ou';
      break;
      case 'us':
	$id = 'p1O';
      break;
      case 'you':
	$id = 'p2O';
      break;
      case 'them':
	$id = 'p3O';
      break;
	  
// ------------------------	
	  
      case 'mine':
	$id = 's1P';
      break;
      case 'yours':
	$id = 's2P';
      break;
      case 'his':
	$id = 's3Pm';
      break;
      case 'hers':
	$id = 's3Pf';
      break;
      case 'its':
	$id = 's3Pu';
      break;
      case 'ours':
	$id = 'p1P';
      break;
      case 'yours':
	$id = 'p2P';
      break;
      case 'theirs':
	$id = 'p3P';
      break;
// ------------------------	

      case 'myself':
	$id = 's1R';
      break;
      case 'yourself':
	$id = 's2R';
      break;
      case 'himself':
	$id = 's3Rm';
      break;
      case 'herself':
	$id = 's3Rf';
      break;
      case 'itself':
	$id = 's3Ru';
      break;
      case 'ourselve':
	$id = 'p1R';
      break;
      case 'yourselve':
	$id = 'p2R';
      break;
      case 'themselve':
	$id = 'p3R';
      break;
    }
	
	return $id;
	
  }


     
  static function pronounEncode($code)
  {
    /**
     * s -> single
       p -> plural
	   1 -> first
	   2 -> second
	   3 -> third
       u -> undefined
       f -> female
	   m -> male
       N -> neutral
	   O -> object pronoun
	   P -> posessive_pronoun
	   R -> reflexive_pronoun
     */
	$pronoun;
	
    switch($code){
      case 's1N':
	$pronoun = 'I';
      break;
      case 's2N':
	$pronoun = 'you';
      break;
      case 's3Nm':
	$pronoun = 'he';
      break;
      case 's3Nf':
	$pronoun = 'she';
      break;
      case 's3Nu':
	$pronoun = 'it';
      break;
      case 'p1N':
	$pronoun = 'we';
      break;
      case 'p2N':
	$pronoun = 'you';
      break;
      case 'p3N':
	$pronoun = 'they';
      break;
// ------------------------	  
      case 's1O':
	$pronoun = 'me';
      break;
      case 's2O':
	$pronoun = 'you';
      break;
      case 's3Om':
	$pronoun = 'him';
      break;
      case 's3Of':
	$pronoun = 'her';
      break;
      case 's3Ou':
	$pronoun = 'it';
      break;
      case 'p1O':
	$pronoun = 'us';
      break;
      case 'p2O':
	$pronoun = 'you';
      break;
      case 'p3O':
	$pronoun = 'them';
      break;
  //-----------------------
  
      case 's1P':
	$pronoun = 'mine';
      break;
      case 's2P':
	$pronoun = 'yours';
      break;
      case 's3Pm':
	$pronoun = 'his';
      break;
      case 's3Pf':
	$pronoun = 'hers';
      break;
      case 's3Pu':
	$pronoun = 'its';
      break;
      case 'p1P':
	$pronoun = 'ours';
      break;
      case 'p2P':
	$pronoun = 'yours';
      break;
      case 'p3P':
	$pronoun = 'theirs';
      break;
// ------------------------	

      case 's1R':
	$pronoun = 'myself';
      break;
      case 's2R':
	$pronoun = 'yourself';
      break;
      case 's3Rm':
	$pronoun = 'himself';
      break;
      case 's3Rf':
	$pronoun = 'helself';
      break;
      case 's3Ru':
	$pronoun = 'itself';
      break;
      case 'p1R':
	$pronoun = 'ourselves';
      break;
      case 'p2R':
	$pronoun = 'yourselves';
      break;
      case 'p3R':
	$pronoun = 'themselves';
      break;
    }
	
	return $pronoun;
	
  }

}

$encoded = pronounDecoder::pronounEncode("p3R");
$decoded = pronounDecoder::pronounDecode("she");

echo "given p3P, write the pronoun: <font color='red'>$encoded</font>" ; 
echo "<br/> given she, write the code: <font color='red'>$decoded</font>" ;



