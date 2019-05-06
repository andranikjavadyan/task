<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/5/2019
 * Time: 9:06 PM
 */

namespace modules;

trait QueryManager
{
    private static $sql_att = [
        'information_schema' => 'information_schema','table_schema' => 'table_schema','table_name' => 'table_name',
        'column_name' => 'column_name', 'constraint' => 'constraint', 'procedure' => 'procedure','coalesce' => 'coalesce',
        'truncate' => 'truncate','database' => 'database','identity' => 'identity','columns' => 'columns','between' => 'between',
        'primary' => 'primary','foreign' => 'foreign','percent' => 'percent','default' => 'default','backup' => 'backup',
        'column' => 'column','unique' => 'unique','modify' => 'modify','update' => 'update','delete' => 'delete',
        'values' => 'values','insert' => 'insert','having' => 'having','select' => 'select','table' => 'table','index' => 'index',
        'alert' => 'alert','alter' => 'alter','check' => 'check','exist' => 'exist','group' => 'group','where' => 'where',
        'limit' => 'limit','order' => 'order','count' => 'count','inner' => 'inner','right' => 'right','union' => 'union',
        'disk' => 'disk','exec' => 'exec','drop' => 'drop','from' => 'from','join' => 'join','left' => 'left','full' => 'full',
        'into' => 'into','like' => 'like','desc' => 'desc','case' => 'case','when' => 'when','null' => 'null','then' => 'then',
        'else' => 'else','key' => 'key','space' => ' ','asc' => 'asc','all' => 'all','not' => 'not','and' => 'and','any' => 'any',
        'set' => 'set','top' => 'top','end' => 'end','to' => 'to','by' => 'by','in' => 'in','is' => 'is','or' => 'or','as' => 'as',
        '<>' => '<>','>=' => '>=','<=' => '<=','on' => 'on','%' => '%','?' => '?','[' => '[',']' => ']','!' => '!','-' => '-',
        '#' => '#','_' => '_','^' => '^','*' => '*','=' => '=','<' => '<','>' => '>','.' => '.', '(' => '(', ')' => ')', '"' => '"',
    ];

    private function selectColumnNames($model)
    {
        return self::$sql_att['select'].self::$sql_att['space'].self::$sql_att['column_name'].self::$sql_att['space'].
            self::$sql_att['from'].self::$sql_att['space'].self::$sql_att['information_schema'].self::$sql_att['.'].
            self::$sql_att['columns'].self::$sql_att['space']. self::$sql_att['where']. self::$sql_att['space'].
            self::$sql_att['table_schema'].self::$sql_att['space'].self::$sql_att['='].self::$sql_att['space']."'book_store'".
            self::$sql_att['space'].self::$sql_att['and'].self::$sql_att['space'].self::$sql_att['table_name'].
            self::$sql_att['space']. self::$sql_att['='].self::$sql_att['space']."'$model'";
    }

    private function createQuery($model, $request)
    {
        return self::$sql_att['insert'].self::$sql_att['space'].self::$sql_att['into'].self::$sql_att['space'].$model.
            self::$sql_att['('].$this->orginal_attributes_query_implode.self::$sql_att[')'].self::$sql_att['space'].
            self::$sql_att['values'].self::$sql_att['space'].self::$sql_att['('].$request.self::$sql_att[')'];
    }

    private static function modelGetQuery($model, $column, $order)
    {
        return self::$sql_att['select'].self::$sql_att['space'].self::$sql_att['*'].
            self::$sql_att['space'].self::$sql_att['from'].self::$sql_att['space'].$model.=
            $column ? self::$sql_att['space'].self::$sql_att['order'].self::$sql_att['space'].self::$sql_att['by'].self::$sql_att['space'].
            $column.self::$sql_att['space'].$order : '';
    }

    private function updateQuery($model, $id, $request)
    {
        return self::$sql_att['update'].self::$sql_att['space'].$model.self::$sql_att['space'].
            self::$sql_att['set'].self::$sql_att['space'].$request.self::$sql_att['space'].
            self::$sql_att['where'].self::$sql_att['space'].'id'.self::$sql_att['='].
            self::$sql_att['"'].$id.self::$sql_att['"'];
    }

    protected function deleteQuery($model, $id)
    {
        return self::$sql_att['delete'].self::$sql_att['space'].self::$sql_att['from'].self::$sql_att['space'].
            $model.self::$sql_att['space'].self::$sql_att['where'].self::$sql_att['space'].'id'.self::$sql_att['='].
            self::$sql_att['"'].$id.self::$sql_att['"'];

    }

    protected function findQuery($model, $id, $column = null)
    {
        $column = !is_null($column) ? $column : 'id';

        return $sql = self::$sql_att['select'].self::$sql_att['space'].self::$sql_att['*'].
            self::$sql_att['space'].self::$sql_att['from'].self::$sql_att['space'].$model.
            self::$sql_att['space'].self::$sql_att['where'].self::$sql_att['space'].
            $column.self::$sql_att['space'].self::$sql_att['='].self::$sql_att['space'].
            self::$sql_att['"'].$id.self::$sql_att['"'];
    }

    protected function whereQuery($model, $operator){}

    protected function orderBYQuery($model, $order){}

}