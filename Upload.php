<?php
//namespace Sentence\Source\Files;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author ggonjon
 */
class Upload {
    //put your code here
    public $filename;
    
    function Load($filename)
    {
        $this->filename = $filename;
        
        if(file_exists($this->filename))
        {
            require_once($this->filename);
        }else{ die("File $this->filename does not exist");}
  
    }
}

