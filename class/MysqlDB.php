<?php
class MysqlDB
{
    private $db;

    public function __construct()
    {
        $this->db = $this->dbConnect();
    }
    public function dbConnect()
    {
        $db = mysqli_connect('localhost', 'root', 'usbw', 'Barbershop');
        mysqli_set_charset($db, "utf8");
        return $db;
    }


    public function getHairdressMailById($id)
    {
        $sql = "SELECT `email` FROM `hairdressers` WHERE `id`=" . $id;
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getDateById($id)
    {
        $sql = "SELECT `date` FROM `date` WHERE `id`=" . $id;
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getHairdress()
    {
        $sql = "SELECT * FROM `hairdressers`";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getHairCuts()
    {
        $sql = "SELECT * FROM `haircuts`";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getHairCutsByAge($age)
    {
        $sql = "SELECT `name` FROM `haircuts` WHERE `age` in (2," . $age . ")";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getDateByHairdress($hairdress,$dateDay)
    {
        $sql = "SELECT `date` FROM `orders` WHERE `checked`=1 AND `hairdress` =" . $hairdress ." AND `dateDay` ='".$dateDay."'";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getDateDays()
    {
        $sql = "SELECT `days` FROM `not_work_days` ";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getAge()
    {
        $sql = "SELECT * FROM `age`";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getDate()
    {
        $sql = "SELECT * FROM `date`";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function orderToDb(Order $order)
    {
        $name = filterInput($order->name);
        $age = filterInput($order->age);
        $number = filterInput($order->number);
        $date = filterInput($order->date);
        $dateDay = filterInput($order->dateDay);
        $dateDay = date('Y-m-d', strtotime($dateDay));
        $hairdress = filterInput($order->hairdress);
        $price = filterInput($order->price);
        $hairCut = filterInput($order->hairCut);
        $checked = filterInput($order->checked);
        $sql = "INSERT INTO `orders`( `name`, `age`, `number`, `date`,`dateDay`,`hairdress`, `hairCut`, `price`, `checked`) 
  VALUES ('$name ',$age,'$number',$date,'$dateDay',$hairdress,'$hairCut',$price,$checked);";
        if (mysqli_query($this->db, $sql))
            return true;
        else
            return false;
    }
}
