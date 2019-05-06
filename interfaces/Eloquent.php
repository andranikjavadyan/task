<?php

namespace interfaces;

interface Eloquent{

    public function find($id, $column = null);

    public function where();

    public function create($array);

    public function update($id, $array);

    public function delete($id);

    public function orderBY($column, $order);

    public static function get();

    public static function last();

    public static function first();

}