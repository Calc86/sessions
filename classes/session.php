<?php
/**
 * Created by PhpStorm.
 * User: calc
 * Date: 27.09.14
 * Time: 3:46
 */

class session {
    protected $id = 0;
    protected $uid = null;
    protected $key = null;
    protected $start = null;
    protected $stop = null;
    const UID = 'uid';
    const START = 'start';
    const STOP = 'stop';
    const ID = 'id';

    /**
     * @var IDBSession
     */
    protected $db = null;

    const KEY = 'key';
    const TIME = 'time';
    const TIMEOUT = 5;

    function __construct(IDBSession $db)
    {
        $vars = $this->getSessionVars();
        $this->key = $vars['key'];
        $this->db = $db;
        $this->load();
    }

    protected function generateKey(){
        return md5(time() + rand());
    }

    protected function getTime(){
        return time();
    }

    protected function start(){
        $this->key = $this->generateKey();
        $this->start = $this->getTime();
        $this->stop = $this->getTime();
        $this->save($this->db);
        $this->setSessionVars();
    }

    protected function update(){
        $this->stop = $this->getTime();
        $this->save($this->db);
        $this->setSessionVars();
    }

    protected function setSessionVars(){
        $_SESSION[self::KEY] = $this->key;
        $_SESSION[self::TIME] = $this->stop;
    }

    protected function getSessionVars(){
        $ret = array(self::KEY => null, self::TIME => null);
        if(isset($_SESSION[self::KEY])) $ret[self::KEY] = $_SESSION[self::KEY];
        if(isset($_SESSION[self::TIME])) $ret[self::TIME] = $_SESSION[self::TIME];
        return $ret;
    }

    public function work(){
        $vars = $this->getSessionVars();
        if($vars[self::KEY] == null){
            $this->start();
        }
        else if(time() - $vars[self::TIME] > self::TIMEOUT){
            $this->start();
        }
        else{
            $this->update();
        }
    }

    protected function save(){
        if($this->id != null) $this->db->update($this->id, $this->uid, $this->key, $this->start, $this->stop);
        else $this->db->insert($this->id, $this->uid, $this->key, $this->start, $this->stop);
    }

    protected function load(){
        if($this->key == null) return;
        $array = $this->db->load($this->key);
        $this->id = $array(self::ID);
        $this->key = $array(self::KEY);
        $this->uid = $array[self::UID];
        $this->start = $array[self::START];
        $this->stop = $array[self::STOP];
    }
}
