<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/27/2019
 * Time: 12:23 AM
 */

namespace request;


class Request
{
    public static function give($get, $post)
    {
        return $get ? $get :$post;
    }

    public function get()
    {
    }
}