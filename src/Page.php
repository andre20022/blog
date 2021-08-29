<?php

namespace creative;
use Rain\Tpl;

class Page
{

  private $page;

  public function __construct()
  {

    $config = array(
        "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/res/views/",
        "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/res/views-cache/",
        "debug"         => false, 
    );
    
    Tpl::configure( $config );
    

    $this->page = new Tpl;
    $this->page->draw("header");

  }

  private function FunctionName(Array $data)
  {
      
     foreach($data as $key => $value){

        $this->page->assign($key, $value);

     }

  }
  public function setPage(String $page, Array $data = null)
  {

    if(!empty($data))
    {

        $this->readData($data);

    }

    return $this->page->draw($page);

  }

  public function __destruct()
  {

    $this->page->draw("footer");

  }

}


?>