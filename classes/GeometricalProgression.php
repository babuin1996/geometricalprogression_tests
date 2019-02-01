<?php

namespace App\Classes;

class GeometricalProgression
{
    public $array;

    public $ratio;

    public $isGeometricalProgression;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function check($output = null)
    {
        if (sizeof($this->array) <= 1)
            return True;

        $this->ratio = $this->array[1]/$this->array[0];


        for($i=1; $i<sizeof($this->array); $i++)
        {
            if (($this->array[$i]/($this->array[$i-1])) != $this->ratio)
            {
                $this->isGeometricalProgression = false;
            }
        }
        $this->isGeometricalProgression = true;

        if($output === true){
            return ("This is a geometrical progression with ratio = $this->ratio");
        }
    }
}