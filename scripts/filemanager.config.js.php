<?php
session_start();

    if(!isset($_SESSION['loginname']))
        return false;

    $usr = $_SESSION['loginname'];
    
    $text = str_ireplace('_USER',$usr, file_get_contents("filemanager.config.js"));

    $config = json_decode($text, true);
    
    if(!$config) {
        error_log("Error parsing the settings file! Please check your JSON syntax.",0);
    }
    
    if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$config['options']['fileRoot'])) {
        if(!mkdir($_SERVER['DOCUMENT_ROOT'].'/'.$config['options']['fileRoot'], 0777, true))
            error_log('Error creating directory ['.$_SERVER['DOCUMENT_ROOT'].'/'.$config['options']['fileRoot'].']', 0);
    }
echo $text;