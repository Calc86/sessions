<?php
/**
 * Created by PhpStorm.
 * User: calc
 * Date: 27.09.14
 * Time: 4:06
 */

class CSV_DB implements  IDBSession {
    private $file = 'db.csv';
    public function insert($id, $uid, $key, $start, $stop)
    {
        // TODO: Implement method.
    }

    public function update($id, $uid, $key, $start, $stop)
    {
        // TODO: Implement method.
    }

    public function load($key)
    {
        // TODO: Implement method.
    }

    public function getAll()
    {
        return array(
            array(1, 1, 111, time()-100, time()-90),
            array(1, 5, 111, time()-100, time()-90),
            array(1, 2, 111, time()-70, time()-60),
            array(1, 3, 111, time()-30, time()-20),
            array(1, 4, 111, time()-10, time()-0),
            array(1, 5, 111, time()-10, time()-0),
        );
    }
} 