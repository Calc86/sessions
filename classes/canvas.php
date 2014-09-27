<?php
/**
 * Created by PhpStorm.
 * User: calc
 * Date: 27.09.14
 * Time: 3:41
 */

class canvas {
    private $data = array(1,0,5,6,1,4);

    function __construct(IDBSession $db)
    {
        $all = $db->getAll();
        $this->parseData($all);
    }

    protected function parseData($all){
        $users = array();
        print_r($all);
        foreach($all as $line){
            list($id, $uid, $key, $start, $stop) = $line;
            $time = time();
            for($i = $time - 100; $i <= $time; $i = $i + 5) {
                if($i >= $start && $i <= $stop){
                    $users[$i][$uid] = 1;
                }
                else{
                    if(!isset($users[$i]))
                        $users[$i] = null;
                }
            }
        }
        $this->setData($users);
    }

    public function draw(){
        $ret = "";
        $ret.= "<table><tr>";
        foreach($this->data as $time=>$arr){
            $ret.= '<td>'.$time.'</td><td>'.count($this->data[$time]).'</td>'."\n";
        }
        $ret.= "</tr></table>";

        return $ret;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
