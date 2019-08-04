<?php
/**
 * @author:    Guillermina Gonjon
 * @name:      Article Decoder (Sentence Element)
 * @license:   GPL
 * @date:      August 3rd, 2019
 */
class ArticleDecoder{
  // Defined and Undefined
  // CONST ARTICLES = 'a,an,the,that,those,this,these,them';

  static function articleEncode($article)
  {
    /**
     * s -> single
       p -> plural
       u -> undefined
       d -> defined
       a -> aprochable
       D -> distant
      -v -> followed by vowel
       N -> neutral
     */
     
    switch($article){
      case 'a':
	$id = 'suD';
      break;
      case 'an':
	$id = 'suD-v';
      break;
      case 'the':
	$id = 'sdN';
      break;
      case 'that':
	$id = 'sUD';
      break;
      case 'this':
	$id = 'sua';
      break;
      case 'some';
      case 'those':
	$id = 'pUD';
      break;
      case 'these':
	$id = 'pda';
      break;
    }
	
	return $id;
	
  }

    static function articleDecode($id)
	{
    /**
     * s -> single
       p -> plural
       u -> undefined
       d -> defined
       a -> aprochable
       D -> distant
      -v -> followed by vowel
       N -> neutral
     */
	$article;
	
    switch($id){
      case 'suD':
	$article = 'a';
      break;
      case 'suD-v':
	$article = 'an';
      break;
      case 'sdN':
	$article = 'the';
      break;
      case 'sUD':
	$article = 'that';
      break;
      case 'sua':
	$article = 'this';
      break;
      case 'pUD':
	$article = 'those';
      break;
      case 'pda':
	$article = 'these';
      break;
    }
	
	return $article;
  }
	
}
print "Given the: " . ArticleDecoder::articleEncode("the");
print "<br/>Given sua: " . ArticleDecoder::articleDecode("sua");
