<?php

// Есть счет, в котором указана сумма с НДС, есть дата счета и все прочие атрибуты.
// Напишите класс, в нем метод - в который на вход поступает информация о счете, 
// на выходе - стоимость без НДС (страна - Российская Федерация)


class Check
{
    public $date;
    public $price_with_VAT;
    public $other_data;

    private $price_without_VAT;
    private $VAT = 20;

    function __construct($date, $price_with_VAT, $other_data){
        $this->date = $date;
        $this->price_with_VAT = $price_with_VAT;
        $this->other_data = $other_data;
        $this->set_price_without_VAT();
    }

    private function set_price_without_VAT(){
        $price = $this->price_with_VAT;
        $percent = $price / 100 * $this->VAT;
        $price_subtraction_percent = $price - $percent;
        
        $this->price_without_VAT = $price_subtraction_percent;
    }

    function get_price_without_VAT(){
        return $this->price_without_VAT;
    }
}


$check = new Check('123123131', '200', 'other');
echo $check->get_price_without_VAT();