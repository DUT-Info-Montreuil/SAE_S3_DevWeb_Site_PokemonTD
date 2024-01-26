<?php

abstract class VueMenu
{
    protected $containt;

    public function calculMenu()
    {
        echo $this->menuModule();

    }

    abstract protected function menuModule();

    public function getContaint()
    {
        return $this->containt;
    }


}

?>