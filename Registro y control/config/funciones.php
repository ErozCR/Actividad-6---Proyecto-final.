<?php

function getFolderProyect(){
    if ( strpos(__DIR__,'/')!== false){
        $folder = str_replace('C:\\xampporiginal\\\htdocs\\','/',__DIR__);
    }else{
        $folder = str_replace('/opt/lampporiginal/htdocs/','/',__DIR__);
    }

    $folder = str_replace('config','',$folder);
    return $folder;

} 

?>