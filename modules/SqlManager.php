<?php

namespace modules;

use models\Eloquent;

trait SqlManager
{
    use QueryManager;

    protected static $connection;
    protected static $table_data = [];
    protected static $table_columns = [];
    protected static $this_query;

    protected $event_create = 'create';
    protected $event_update = 'update';
    protected $event_delete = 'delete';
    protected $event_find = 'find';
    protected $event_where = 'where';
    protected $event_orderBY = 'orderBY';

    protected static $events_control_id;
    protected $events_control_operator;
    protected $events_control_order;
    protected $events_control_request;

    protected $orginal_attributes_query = [];
    protected $orginal_attributes_query_implode;

    //request control methods properties
    protected $request_control_attributes = [
        ',' => ','
    ];

    protected $request_control_result = [];

    public function __construct()
    {
        self::$connection = global_connection('mysql');
    }

    protected static function getTable()
    {
        return self::selectQuery(self::$connection, self::$this_query, true);
    }

    private static function selectQuery($connect, $query, $append)
    {
        $ready = mysqli_query($connect, $query);

        self::sqlLog($connect);

        if($append){
            $has = self::$this_event != 'selectColumnNames' ? self::$table_data : self::$table_columns;

            foreach ($ready as $r){
                array_push($has, self::$this_event != 'selectColumnNames' ? $r : $r['column_name']);
            }

            return $has;
        }
    }

    protected static function sqlLog($connect)
    {
        if($connect->connect_error){
            dd($connect->connect_error);
        }
        elseif($connect->error){
            dd($connect->error);
        }
        elseif (mysqli_errno($connect)){
            dd(mysqli_errno($connect));
        }
    }

    public function eventsControl($id = false, $column = null, $operator = false, $order = false, $request = false, $event)
    {
        $this->requestControl($id, $operator, $order, $request);

        switch ($event){
            case $this->event_create:
                self::$this_query = $this->createQuery($this->table, $this->events_control_request);
                    break;
            case $this->event_update:
                self::$this_query = $this->updateQuery($this->table, $id, $this->updateControl($request));
                    break;
            case $this->event_delete:
                self::$this_query = $this->deleteQuery($this->table, self::$events_control_id);
                    break;
            case $this->event_find:
                self::$this_query = $this->findQuery($this->table, self::$events_control_id, $column);
                    break;
            case $this->event_where:
                $this->whereQuery($this->table, $this->events_control_operator);
                    break;
            case $this->event_orderBY:
                $this->orderBYQuery($this->table, $this->events_control_order);
                    break;
            default:
                return dd('Not Found Event Query');
        }
    }

    public function requestControl($id, $operator, $order, $request)
    {
        $this->idManager($id)
            ->operatorManager($operator)
            ->orderManager($order)
            ->requestManager($request);
    }

    protected function idManager($id)
    {
        if($id)
            self::$events_control_id = $id;
        return $this;
    }

    protected function operatorManager($operator)
    {
        if($operator)
//            $this->events_control_request;
            return    dd($operator);
        return $this;
    }

    protected function orderManager($order)
    {
        if($order)
//        $this->events_control_request;
            return    dd($order);
        return $this;

    }

    protected function requestManager($request)
    {
        if ($request) {
            $ar = [];

            foreach($request as $k => $r){
                array_push($ar, "'" . $r . "'");
                array_push($this->orginal_attributes_query, $k);
            }

            $this->events_control_request = implode(', ', $ar);

            $this->orginal_attributes_query_control($this->orginal_attributes_query);

        } else return $this;

    }

    public function updateControl($request)
    {
        $sql = [];
        foreach ($request as $k => $r){
            array_push($sql, $k.'='."'".$r."'");
        }
        return implode(', ', $sql);
    }
}
