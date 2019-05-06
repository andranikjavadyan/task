<?php
/**
 * Created by PhpStorm.
 * User: mkhit
 * Date: 4/3/2019
 * Time: 1:20 AM
 */
namespace models;

use database\Connect;
use modules\SqlManager;

class Eloquent implements \interfaces\Eloquent
{
    use SqlManager;

    protected $table;

    protected $fillable = [];

    protected $orginal_attributes = [];

    protected static $collection = [];

    private static $this_event;

    protected static $static_table;

    public function __construct()
    {
        self::$connection = global_connection('mysql');

        self::$this_event = 'selectColumnNames';

        self::$this_query = $this->selectColumnNames($this->table);

        $this->selectQuery(self::$connection, $this->selectColumnNames($this->table), true);

        $this->orginal_attributes =  $this->getTable();

        self::$static_table = $this->table;
    }

    public function orginal_attributes_query_control($orginal_attributes)
    {
        $this->orginal_attributes_query_implode = implode(', ', $orginal_attributes);
    }

    public static function append_orginal_attributes()
    {
        self::$collection = self::getTable();
    }

    public static function get($column = null, $order = null)
    {
        // TODO: Implement get() method.
        self::$this_event = (__FUNCTION__);

        self::$this_query = self::modelGetQuery(self::$static_table, $column, $order);

//        dd(self::$this_query);
        self::append_orginal_attributes();

        self::selectQuery(self::$connection, self::$this_query, true);
        return self::$collection;
    }

    public static function first()
    {
        // TODO: Implement first() method.
        self::$this_event = (__FUNCTION__);

        self::$this_query = self::modelGetQuery(self::$static_table);

        self::append_orginal_attributes();

        return reset(self::$collection);
    }

    public static function last()
    {
        // TODO: Implement last() method.
        self::$this_event = (__FUNCTION__);

        self::$this_query = self::modelGetQuery(self::$static_table);

        self::append_orginal_attributes();

        return end(self::$collection);
    }

    public function create($array)
    {
        // TODO: Implement create() method.
        self::$this_event = (__FUNCTION__);
        $this->eventsControl(false, false, false, false, $array, __FUNCTION__);
        $this->selectQuery(self::$connection, self::$this_query, false);
    }

    public function update($id, $array)
    {
        // TODO: Implement update() method.
        self::$this_event = (__FUNCTION__);
        $this->eventsControl($id, false, false, false, $array, __FUNCTION__);
        $this->selectQuery(self::$connection, self::$this_query, false);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        self::$this_event = (__FUNCTION__);
        $this->eventsControl( $id, false,false,false,false,  __FUNCTION__);
        $this->selectQuery(self::$connection, self::$this_query, false);
    }

    public function find($id, $column = null)
    {
        // TODO: Implement find() method.
        self::$this_event = (__FUNCTION__);
        static::eventsControl($id, $column, false,false,false,__FUNCTION__);
        self::append_orginal_attributes();
        self::selectQuery(self::$connection, self::$this_query, true);
        return self::$collection;
    }

    public function where()
    {
        // TODO: Implement where() method.
        self::$this_event = (__FUNCTION__);
        static::eventsControl( false, false, false, false,false,__FUNCTION__);
    }

    public function orderBY($column, $order)
    {
        // TODO: Implement orderBY() method.
        self::$this_event = (__FUNCTION__);
        return $this;
    }
}

