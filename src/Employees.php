<?php

class Employees
{
    protected $name = '';
    protected $age = 0;
    protected $kid = 0;
    protected $car = 0;
    protected $salary = 0;

    function __construct($name, $age, $kid, $car, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->kid = $kid;
        $this->car = $car;
        $this->salary = $salary;
    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;

        return $this;
    }
}
