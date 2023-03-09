<?php
class Log
{
    public static function write($data)
    {
        file_put_contents('./log_'.date("d-m-Y").'.log', "\n".$data, FILE_APPEND);
    }
}
class Request
{
    public static function ip_address()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
    
    public static function current_url()
    {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }
    
    public static function post()
    {
        return $_POST;
    }
    
    public static function get()
    {
        return $_GET;
    }
}

class Main
{
    public static function request()
    {
        $data = array(
            'time'=>date('Y-m-d h:s:a'),
            'ip_address'=>Request::ip_address(),
            'visted_url'=>Request::current_url(),
            'post_data'=>Request::post(),
            'get_data'=>Request::get()
            );
        Log::write(json_encode($data));
    }
}
Main::request();
?>
