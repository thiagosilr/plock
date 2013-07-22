<?php
App::uses('AppHelper', 'View/Helper');

class LinkHelper extends AppHelper 
{
    public $helpers = array('Html');


    public function external($title, $url, $options = array()) 
    {
        !preg_match("/^([a-zA Z]){1,}:\/\//", $url)
            ? $url = '//'.$url
            : null;
        
        return  '<a href="'.$url.'" target="_blank">'.$title.'</a>';
    }
}
