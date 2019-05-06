<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/27/2019
 * Time: 12:08 AM
 */

namespace routes;

use controllers\AdminController;
use request\Request;

class Route
{
    protected $notFoundRoute = 'Not Found Route';
    protected $controllerPath = 'controllers\\';

    protected $arg;
    protected $url;
    protected $push;
    protected $fullUrl;
    protected $requestUrl;
    protected $controller;

    public function __construct()
    {
        $this->loadUrls();
        if ($this->requestUrl === '/task/' || $this->requestUrl === '') {
            header('Location: admin/task/index');
        }
        
        Request::give($_GET, $_POST);
    }

    public function get($url, $controller, $action, $name)
    {
        $hasInt = preg_match('/[0-9]+/', $this->requestUrl());
        if (self::hasRouter(preg_match("~$url~", $this->requestUrl) && !$hasInt)) {
            $this->returnController($controller, $action, $url);
        } elseif ($hasInt && preg_match("~$url~", $this->requestUrl)) {
            $e = explode('/', $this->requestUrl);
            $arg = end($e);
            $this->returnController($controller, $action, $url, $arg);
        }
        return true;
    }

    public function post($url, $controller, $action, $name)
    {
        if (self::hasRouter($url)) {
            $this->returnController($controller, $action, $url);
        }
        return $this;
    }

    protected function hasRouter($url)
    {
        if ($this->requestUrl == $url) {
            return true;
        }
    }

    public function returnController($controller, $action, $url, $arg = null)
    {
        if (!is_null($arg)) {
            return (new $controller)->$action($arg);
        } else {
            return (new $controller)->$action();
        }
    }

    protected function routeArg($url)
    {

    }

    public function url($url = null)
    {
        return $url ? $this->push = $this->url . '/' . $url : $this->url;
    }

    public function requestUrl()
    {
        return $this->requestUrl;
    }

    public function loadUrls()
    {
        $this->url = (string)$_SERVER['HTTP_HOST'];
        $this->requestUrl = (string)$_SERVER['REQUEST_URI'];
        $this->fullUrl = $this->url . $this->requestUrl;
    }

    public function hasPost()
    {
        return [
            'task-add'
        ];
    }
}