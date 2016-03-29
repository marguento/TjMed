<?php

  function getUserLanguage() {  
    $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
    return $idioma;  
  } 

  $user_language=getUserLanguage();

  if($user_language=='en'){ 
        $gandalf = url('en');
         header("Location: " . $gandalf);
         exit;
        //echo url('en');
    } 
    elseif($user_language=='es'){ 
         $gandalf = url('es');
         header("Location: " . $gandalf);
         exit;
    }  

?>   