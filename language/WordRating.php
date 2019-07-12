<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//namespace Sentence\language\WordRating;

/**
 * Description of WordRating
 *
 * @author ggonjon
 * Emotions direct our learning capacity
 * We are wonderful machines invented and sustained by the Creator
 */
class WordRating {
    //put your code here
    /**
     * Primary emotions and feelings
     * By Jaak Panksepp at TEDxRAinier
     * /////////////////////////////
     * seeking -> enthusiastic
     * rage     -> pissed-off
     * fear     -> anxious
     * lust     -> horny
     * care     -> tender & loving
     * panic    -> lonely & sad
     * play     -> joyous
     * pain     -> depression
     */
    private $word;
    private $motivation = "confidence, competence, experience, trust, depresion, frustration, mistrust, inexperience, fear";
    private $character = "wonderful, excellent, very good, nice, kind, shallow, patetic, jerk, mean, evil, hateful";
    private $subject = "I, we, you, he, she, they, it, them, her, him, you, us, me";
    private $character_intensity;
    private $excellent;
    private $neutral;
    private $poor;
    public  $dictionary = "";
    
    private $intensity = "+5, +4, +3, +2, +1, 0, -1, -2, -3, -4, -5"; // Raiting system where 0 is neutral.
    
    private $word_sum;
    private $word_average;
    private $word_median;
    private $word_frequency;    // How many times a word had been called.  Type array();
    private $myword;
    
    function getWordIntensity()
    {
        return $this->character_intensity;
    }
    function setWordIntensity()
    {
        /**
         * @charcter_intensity
         * @return Array Description
         */
        $this->character = explode(", ", $this->character);
        $this->intensity = explode(", ", $this->intensity);
        $this->character_intensity;
                
        for($s=1;$s<count($this->character);$s++)
        {
            $this->character_intensity = $this->intensity = $this->character;
        }
        
        //return $this->character_intensity();
    }
    /*
    function setWordFrequency($word)
    {
        $frequency = $frequency + 1;
        $this->word_frequency = array_push($word,$frequency);
        
        return $this->word_frequency;
    }
    
    function setWordFrequency2($word)
    /**
     * @word
     * @return integer Description
     
    {
        if($this->word_frequency == null){ $this->word_frequency = 1; }
        else{ $this->word_frequency++; }
        
        if(is_array($this->myword,$words))
        { 
            $this->myword = in_array($myword, $words);
            echo $this->myword;
            
            foreach ($words as $word)
            {
                $this->word_frequency++;
            }
        }else{
                $this->word_frequency++;
        }
        
    }
    
    function getWordFrequency()
    {
        return $this->word_frequency;
        
    }*/
    

  
}
