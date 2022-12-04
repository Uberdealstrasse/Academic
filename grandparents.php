<?php

class Person
{
    // инкапсуляция
    private $name;
    private $lastname;
    private $age;
    private $hp;
    private $mother;
    private $father;

    function __construct($name, $lastname, $age, $mother = null, $father = null)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->mother = $mother;
        $this->father = $father;
        $this->hp = 100;
    }
    function sayHi($name)
    {
        return "Hi, $name, I'm " . $this->name;
    }
    function setHp($hp)
    {
        if ($this->hp + $hp >= 100) $this->hp = 100;
        else $this->hp = $this->hp + $hp;
    }

    function getHp()
    {
        return $this->hp;
    }
    function getName()
    {
        return $this->name;
    }
    function getLastname()
    {
        return $this->lastname;
    }
    function getMother()
    {
        return $this->mother;
    }
    function getFather()
    {
        return $this->father;
    }
    function getInfo()
    {
        return "
    <h2>A few words about myself.</h2><br>
    " . "My name: " . $this->getName() . " " . $this->getLastname() .
            "<br><hr> My father: " . $this->getFather()->getName() . " " . $this->getFather()->getLastname() .
            "<br> My mother: " . $this->getMother()->getName() . " " . $this->getMother()->getLastname() .
            "<br><hr> My paternal grandfather: " . $this->getFather()->getFather()->getName() . " " . $this->getFather()->getFather()->getLastname() .
            "<br> My paternal grandmother: " . $this->getFather()->getMother()->getName() . " " . $this->getFather()->getMother()->getLastname() .
            "<br><hr> My maternal grandfather: " . $this->getMother()->getFather()->getName() . " " . $this->getMother()->getFather()->getLastname() .
            "<br> My maternal grandmother: " . $this->getMother()->getMother()->getName() . " " . $this->getMother()->getMother()->getLastname() . "<hr>";
    }
}

// ! Здоровье человека не может быть более 100 единиц
// родители матери
$vasiliy = new Person("Vasiliy", "Ilyichev", 68);
$zoya = new Person("Zoya", "Ilyicheva", 60);
// родители отца
$nikolai = new Person("Nikolai", "Tsarev", 75);
$alexandra = new Person("Alexandra", "Tsareva", 70);
// родители
$michail = new Person("Michail", "Tsarev", 42, $alexandra, $nikolai);
$larisa = new Person("Larisa", "Tsareva", 42, $zoya, $vasiliy);
$igor = new Person("Igor", "Tsarev", 15, $larisa, $michail);


echo $igor->getInfo();
