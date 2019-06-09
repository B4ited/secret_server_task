<?php 
class Upload 
 {

  public $dir;
  public $file;
  public $tmp;
  public $type;


  function __construct()
  {
    $this->dir="secret/";
    $this->file=$_FILES["file"]["name"];
    $this->tmp=$_FILES["file"]["tmp_name"];
    $this->type=pathinfo($this->file,PATHINFO_EXTENSION);
    
  }
 	
 	

 	public function secret()
 	{

    if(empty($this->file))
      return "Nincs jelölve kép!";
    if(file_exists($this->dir.$this->file))
      return "A kép már foglalt!";
    if($this->type!="json" && $this->type!="xml")
      return "Csak jpg tölthető fel!";
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $this->dir.$this->file))
      return $this->dir.$this->file;
 		 
            
  } 




    }





      
 

 ?>