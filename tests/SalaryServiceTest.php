<?php

use PHPUnit\Framework\TestCase;

class SalaryServiceTest extends TestCase
{
    public function testAddSalary()
    {
        $bonus = new AddSalary;
        $this->assertEquals(100 + 7, $bonus->getSalary(100));
    }

    public function testDeductCar()
    {
        $deduction = new DeductCar;
        $this->assertEquals(1000 - 500, $deduction->getSalary(1000));
    }

    public function testDecreaseTax()
    {
        $tax = new DecreaseTax;
        $this->assertEquals(100 - (20 - 2), $tax->getSalary(100));
    }

    public function testCountryTax()
    {
        $tax = new CountryTax;
        $this->assertEquals(100 - 20, $tax->getSalary(100));
    }

    public function testGetSalary()
    {
        $alice = new Employees('Alice', 26, 2, 0, 6000);
        $bob = new Employees('Bob', 52, 0, 1, 4000);
        $charlie = new Employees('Charlie', 36, 3, 1, 5000);
        $hanh = new Employees('Hanh', 35, 2, 0, 4000);
        $salaryService = new SalaryService;
        $this->assertEquals(['CountryTax'], $salaryService->calculate($alice));
        $this->assertEquals(4800, $salaryService->getSalary($alice));
        $this->assertEquals(['AddSalary', 'DeductCar', 'CountryTax'], $salaryService->calculate($bob));
        $this->assertEquals(3024, $salaryService->getSalary($bob));
        $this->assertEquals(['DeductCar', 'DecreaseTax'], $salaryService->calculate($charlie));
        $this->assertEquals(3690, $salaryService->getSalary($charlie));
        $this->assertEquals(['CountryTax'], $salaryService->calculate($hanh));
        $this->assertEquals(3200, $salaryService->getSalary($hanh));
    }
}
