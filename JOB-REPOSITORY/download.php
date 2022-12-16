<?php
session_start();
if(!empty($_GET['file'])){
    $fileName  = basename($_GET['file']);
    $filePath  = "file/".$_SESSION['filename'];
    // echo $filePath;
    // echo $fileName;
    if(!empty($fileName) && file_exists($filePath)){
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=".$_SESSION['name']);
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        //read file
        readfile($filePath);
        exit;
        
    }
    else{
        echo 'File does not exist';
        // header("Cache-Control: public");
        // header("Content-Description: File Transfer");
        // header("Content-Disposition: attachment; filename=$fileName");
        // header("Content-Type: application/zip");
        // header("Content-Transfer-Encoding: binary");
        
        // //read file 
        // readfile($filePath);
        exit;
    }
}
