<?php
class Order
{
    public $name,
        $age,
        $number,
        $date,
        $dateDay,
        $price,
        $hairdress,
        $hairCut,
        $checked;
    public function __construct($data)
    {
        $this->name = $data->name;
        $this->age = $data->age;
        $this->number = $data->number;
        $this->date = $data->date;
        $this->dateDay = $data->dateDay;
        $this->hairdress = $data->hairdress;
        $this->price = $data->price;
        $this->hairCut = $data->hairCut;
        $this->checked = 0;
    }

}
