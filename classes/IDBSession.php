<?php
/**
 * Created by PhpStorm.
 * User: calc
 * Date: 27.09.14
 * Time: 4:05
 */

interface IDBSession {
    public function insert($id, $uid, $key, $start, $stop);
    public function update($id, $uid, $key, $start, $stop);
    public function load($key);
    public function getAll();
} 