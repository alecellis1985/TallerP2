<?php

class MessageHandler
{
    //Error Msgs
    const DbErrorMsg = 'Error: Could not connect with the server, please refresh your browser';
             
    /*
     * params: $message , $data
     * 
     * returns json encoded containing an array with success, msg, data = Array()
     */
    public static function getSuccessResponse($message,$data)
    {
        return json_encode(Array('success'=>true,'msg'=>$message,'data'=>$data == null ? Array() : $data));
    }
    
    public static function getDBErrorResponse()
    {
        return json_encode(Array('success'=>false,'msg'=>self::DbErrorMsg,'data'=>Array()));
    }
}