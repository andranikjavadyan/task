<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/26/2019
 * Time: 11:59 PM
 */

namespace controllers;

use models\Task;
use request\Request;
use routes\Route;

class TaskController extends controllers
{
    public static $data = [
        'task_title' => 'Task',
        'task_description' => 'Task',
        'task_icon' => 'Task',
    ];

    public function index()
    {
        $task = Task::get();
    }

    public function all()
    {
        $tasks = new Task;
        self::$data['path'] = 'admin.partials.crud.index';
        self::$data['child_datas'] = $tasks::get('id', 'DESC');
//        dd(self::$data['child_datas']);
        return view('admin.layout.app', self::$data['child_datas'], self::$data);
    }

    public function create()
    {
        self::$data['path'] = 'admin.partials.crud.create';
        self::$data['child_datas'] = [];
        return view('admin.layout.app', self::$data['child_datas'], self::$data);
    }

    public function add()
    {
        $request = $_POST;
        $task = new Task;
        
        $task->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'task' => $request['task'],
            'created_at' => date('Y-m-d'),
        ]);

        return header('Location: /task/');

    }

    public function update($id)
    {
        $task = new Task;
        self::$data['child_datas'] = $task->find($id)[0];
        self::$data['path'] = 'admin.partials.crud.create';
        return view('admin.layout.app', self::$data['child_datas'], self::$data);
    }

    public function edit($id)
    {
        $request = $_POST;
        $task = new Task;
        $task->update($id, [
            'name' => $request['name'],
            'email' => $request['email'],
            'task' => $request['task'],
        ]);

        return header('Location: /task/');
    }

    public function destroy($id)
    {
        $task = new Task;
        $task->delete($id);
        return header('Location: /task/');
    }

    public function done($id)
    {
        if(isset($_SESSION['user']) && $id) {
            (new Task())->update($id, ['done' => 1]);
        }
        return header('Location: /task/');
    }

    public function incomplete($id)
    {
        if(isset($_SESSION['user']) && $id) {
            (new Task())->update($id, ['done' => 0]);
        }
        return header('Location: /task/');
    }
}
