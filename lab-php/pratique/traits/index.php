<?php
declare(strict_types=1);

trait GreetingTrait
{
    public function greet(): string
    {
        return "Bonjour, {$this->name}";
    }
}

class Student
{
    use GreetingTrait;

    public string $name = 'Amina';
}

class Teacher
{
    use GreetingTrait;

    public string $name = 'Yassine';
}

echo (new Student())->greet() . PHP_EOL;
echo (new Teacher())->greet() . PHP_EOL;
