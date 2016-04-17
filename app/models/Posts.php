<?php

Class Posts extends \Phalcon\MVC\Model{
    
    public function initialize(){
        
        $this->setSource('posts');
        
    }
    
}

?>