<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/27/2019
 * Time: 12:14 AM
 */

namespace controllers;

class AdminController extends controllers
{
    protected $view = [];

    public static $data = [
        'admin_title' => 'Title',
        'admin_description' => 'Description',
        'admin_icon' => 'path'
    ];

    public function index()
    {
        self::$data['path'] = 'admin.home';
        self::$data['child_datas'] = [];
        view('admin.layout.app', null, self::$data);
    }
}