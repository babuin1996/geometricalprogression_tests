<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 01.02.2019
 * Time: 20:08
 */

use PHPUnit\Framework\TestCase;
use App\Classes\GeometricalProgression;

class GeometricalProgressionTest extends TestCase
{
    public function testProgressionYes()
    {
        $progression = [1,2,4,8,16];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue($obj->isGeometricalProgression);
    }

    public function testProgressionNot()
    {
        $progression = [1,3,2,6,11];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue(!$obj->isGeometricalProgression);
    }

    public function testCheckRatio(){
        $progression = [1,3,9,27,81];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertEquals($obj->ratio, 3);
    }

    public function testCheckNegativeValue(){
        $progression = [-2,4,-8,16,-32];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue($obj->isGeometricalProgression);
    }

    public function testCheckZeroValueInteger(){
        $progression = [2,0,4,0,8];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue(!$obj->isGeometricalProgression);
    }

    public function testCheckZeroValueFloat(){
        $progression = [2,0.0,4,8];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue(!$obj->isGeometricalProgression);
    }

    public function testCheckZeroValueString(){
        $progression = [2,'0',4,8];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue(!$obj->isGeometricalProgression);
    }

    public function testArrayWithString(){
        $progression = [2,'string',4,8];
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue(!$obj->isGeometricalProgression);
    }

    public function testArrayWithBoolean(){
        $progression = [2,true,4,8];;
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue(!$obj->isGeometricalProgression);
    }
    public function testArrayWithArray(){
        $progression = [2,[1,2,4],4,8];;
        $obj = new GeometricalProgression($progression);
        $obj->check();
        $this->assertTrue(!$obj->isGeometricalProgression);
    }
}