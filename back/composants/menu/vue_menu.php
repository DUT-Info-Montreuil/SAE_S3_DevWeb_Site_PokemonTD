<?php

abstract class VueMenu
{
    protected $containt;

    abstract protected function menuModule();

    public function calculMenu()
    {
        echo $this->menuModule();

    }

    public function getContaint()
    {
        return $this->containt;
    }


}

?>