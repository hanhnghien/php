<?php

interface SalaryInterface
{
    public function getSalary($salary);
}

class AddSalary implements SalaryInterface
{
    public function getSalary($salary)
    {
        $salary += 0.07 * $salary;

        return $salary;
    }
}

class DeductCar implements SalaryInterface
{
    public function getSalary($salary)
    {
        $salary -= 500;

        return $salary;
    }
}

class DecreaseTax implements SalaryInterface
{
    public function getSalary($salary)
    {
        $salary -= 0.18 * $salary;

        return $salary;
    }
}

class CountryTax implements SalaryInterface
{
    public function getSalary($salary)
    {
        $salary -= 0.20 * $salary;

        return $salary;
    }
}

class SalaryService
{
    public function getSalary($employee)
    {
        $salary = $employee->salary;
        $decorators = $this->calculate($employee);
        foreach ($decorators as $decorator) {
            $class = new $decorator;
            $function = 'getSalary';
            $salary = $class->$function($salary);
        }

        return $salary;
    }

    public function calculate($employee)
    {
        if ($employee->age > 50) {
            $decorators[] = 'AddSalary';
        }
        if ($employee->car > 0) {
            $decorators[] = 'DeductCar';
        }
        $decorators[] = $employee->kid > 2 ? 'DecreaseTax' : 'CountryTax';

        return $decorators;
    }
}
