<?php

class DivisionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function divides_given_operands() {
        $division = new \App\Calculator\Division;
        $division->setOperands([10, 2]);

        $this->assertEquals(5, $division->calculate());        
 
        $division->setOperands([100, 2, 5]);

        $this->assertEquals(10, $division->calculate());        
    }   

    /** @test */
    public function no_operands_given_throws_exception_when_calculating() {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $division = new \App\Calculator\Division;
        $division->calculate();
    }

    /** @test */
    public function removes_division_by_zero_operands() {
        $division = new \App\Calculator\Division;
        $division->setOperands([0, 0, 0, 0, 0]);

        $this->assertEquals(0, $division->calculate());
    }

}