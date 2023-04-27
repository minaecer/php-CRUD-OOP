<?php

class FormSanitizer
{  
    public static function sanitizeFormString($inputText)
    {
        $inputText = strip_tags($inputText);
        $inputText = trim($inputText);
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }
    
   
    public static function sanitizeFormEmail($inputText)
    {
        $inputText = strip_tags($inputText);
        $inputText = trim($inputText);
        return $inputText;
    }
}