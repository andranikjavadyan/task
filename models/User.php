<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/28/2019
 * Time: 11:06 PM
 */

namespace models;


class User extends Eloquent
{
    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}