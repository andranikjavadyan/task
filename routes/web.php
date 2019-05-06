<?php

use routes\Route;

(new Route)->get('task/home', '\controllers\AdminController', 'index', 'home');
(new Route)->get('task/admin/task/index', '\controllers\TaskController', 'all','task-index');
(new Route)->get('task/admin/task/create', '\controllers\TaskController', 'create', 'task-create');
(new Route)->get('task/admin/task/add', '\controllers\TaskController', 'add', 'task-add');
(new Route)->get('task/admin/task/update', '\controllers\TaskController', 'update', 'task-update');
(new Route)->get('task/admin/task/edit', '\controllers\TaskController', 'edit', 'task-edit');
(new Route)->get('task/admin/task/destroy', '\controllers\TaskController', 'destroy', 'task-destroy');

(new Route)->get('task/admin/task/done', '\controllers\TaskController', 'done', 'done');
(new Route)->get('task/admin/task/incomplete', '\controllers\TaskController', 'incomplete', 'incomplete');

// Auth routes
(new Route)->get('task/admin/login', '\controllers\AuthController', 'login', 'login');
(new Route)->get('task/admin/logout', '\controllers\AuthController', 'logout', 'logout');
(new Route)->get('task/admin/login/post', '\controllers\AuthController', 'loginPost', 'loginPost');

