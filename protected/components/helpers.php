<?php


function modelname()
  {
    return Yii::app()->controller->id;
  }


function activate($option)
{
   if($option == modelname()) {
      if ($option = 'site') 
      {
         return 'class = "active"';
      }
      else{
        return 'class = "dropdown active"';
      }

   } else {
    return NULL;
}
     }



 function checkRemoteFile($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(curl_exec($ch)!==FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}    
?>
