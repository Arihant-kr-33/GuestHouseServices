<?php

function get_id($cnt)
{
    $cnt++;
    $str = (string)($cnt);
    while(strlen($str)<4)
    {
        $str = "0".$str;
    }
    return $str;
}