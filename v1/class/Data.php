<?php 
class Data 
 {


 



      public function create($hash,$secret,$viewes,$after){

               $data = array(

                     'hash' =>  $hash,
                     'secretText' =>  $secret,
                     'createdAt' => date('Y. m. d. H:i:s', time()),
                     'expiresAt' => $after,
                     'remainingViews' => $viewes
                );  
                $array_data[] = $data;  
                $final_data = json_encode($array_data);  
                file_put_contents("secret/".$hash.".json", $final_data);
               // rename("secret/".$secret,"secret/".$hash);

      } 



    public  function fileOut($hash){
      $items = json_decode(file_get_contents("secret/".$hash.".json"), true);
      return $items;
    }




 public function Change($hash,$secret,$createdAt,$expiresAt,$viewes)
{
  
   $data = array(

                     'hash' =>  $hash,
                     'secretText' =>  $secret,
                     'createdAt' => $createdAt,
                     'expiresAt' => $expiresAt,
                     'remainingViews' => $viewes
                );  
                $array_data[] = $data;  
                $final_data = json_encode($array_data);  
                file_put_contents("secret/".$hash.".json", $final_data);
                

}

}

?>