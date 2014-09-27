<?php
/**
 * Created by PhpStorm.
 * User: calc
 * Date: 27.09.14
 * Time: 3:45
 */

class user {
    protected $name = 'noname';

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

} 