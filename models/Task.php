<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/3/2019
 * Time: 1:42 AM
 */

namespace models;

class Task extends Eloquent
{
    protected $table = 'tasks';

    protected $fillable = [
        'name'
    ];
}