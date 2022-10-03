<?php

interface PizzaInterface
{
    /**
     * @return float
     */
    public function getCost(): float;

    /**
     * @return array
     */
    public function getIngredients(): array;

    /**
     * @return string
     */
    public function getTitle(): string;
}

abstract class Pizza implements PizzaInterface
{
    public $price;
    public $ingredients;
    public function getCost(): float
    {
        return $this->price;
    }
    public function getIngredients(): array
    {
        return $this->ingredients;
    }
    public function getTitle(): string
    {
        return get_class($this);
    }
}

class ChickenGrill extends Pizza
{
    public function __construct()
    {
        $this->price = 194;
        $this->ingredients =
            [
                'Cheese sauce',
                'chicken thigh',
                'fried mushrooms',
                'cherries',
                'fried onions',
                'Mozzarella cheese',
                'Parmesan cheese'
            ];
    }
}

class Mexicana extends Pizza
{
    public function __construct()
    {
        $this->price = 175;
        $this->ingredients =
            [
            'Cream cheese sauce',
            'chicken thigh',
            'Mozzarella cheese',
            'pineapple and corn salsa',
            'Guacamole',
            'Nachos chips',
            'green chili pepper',
            'cilantro'
            ];
    }
}

class Munich extends Pizza
{
    public function __construct()
    {
        $this->price = 285;
        $this->ingredients =
            [
                'Munich and Bavarian sausages',
                'pepperoni',
                'cherry tomatoes',
                'pickles',
                'onions',
                'hot chili peppers',
                'Mozzarella cheese',
                'Emmental cheese',
                'pilatti sauce'
            ];
    }
}

class PizzaCalculator
{
    private $order = [];
    public function add(Pizza $pizza)
    {
        array_push($this->order, $pizza);
    }
    public function ingredients()
    {
        $allIngredients =[];
        foreach ($this->order as $pizza)
        {
            $allIngredients = array_merge($allIngredients, $pizza->getIngredients());
        }
        return array_unique($allIngredients);
    }
    public function price()
    {
        $total= 0;
        foreach ($this->order as $pizza)
        {
            $total += $pizza->price;
        }
        return $total;
    }
}

$a = new Munich();
$b = new Mexicana();
$calc = new PizzaCalculator();
$calc->add($b);
$calc->add($a);
//print_r($calc->ingredients());
echo $calc->price();