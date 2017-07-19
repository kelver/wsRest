<?php
function api_response($content = '', $status = 200, $headers = [])
{
    $factory = new \App\Http\ResponseFactory();

    if(func_num_args() === 0){
        return $factory;
    }

    return $factory->make($content, $status, $headers);
}