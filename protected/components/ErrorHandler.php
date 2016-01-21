<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ErrorHandler 
{
    public static function handleException (CExceptionEvent $event)
    {
        $exception = $event->exception;
        var_dump($exception);
        var_dump(get_class($exception));
        $event->handled = true;
    }
    
    public static function handleError (CErrorEvent $event)
    {
        $exception = $event->file;     
        var_dump($event);        
        $event->handled = true;
    }
}