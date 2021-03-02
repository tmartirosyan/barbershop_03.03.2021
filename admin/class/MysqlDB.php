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
    public function adminLogIn()
    {
        $db = $this->db;
        $login = $db->real_escape_string($_POST['email']);
        $password = $db->real_escape_string($_POST['password']);
        $sql = "SELECT * FROM `hairdressers` WHERE `email` = '" . $login . "' AND `password` = '" . $password . "'";
        $result = $db->query($sql);
        return $result;
    }
    public function setLastLogin($user)
    {
        $db = $this->db;
        $sql = " UPDATE `hairdressers` SET last_login = NOW() WHERE id=" . $user['id'];
        $result = $db->query($sql);
        return $result;
    }
    public function getOrdersByLimit($limit)
    {
        $sql = "SELECT * FROM `orders`  ORDER BY `checked`,`this_date` DESC LIMIT " . $limit . ",10";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
    public function removeAllOrders()
    {
        $sql = "DELETE FROM `orders` ";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
    public function getOrdersCount()
    {
        $sql = "SELECT COUNT(`name`) AS 'count' FROM `orders`  ";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }


    public function confirmOrderById($id)
    {
        $sql = "UPDATE `orders` SET `checked`=1 WHERE `id` = " . $id;
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function deleteOrderById($id)
    {
        $sql = "DELETE FROM `orders` WHERE `id` = " . $id;
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getAgeById($id)
    {
        $sql = "SELECT `age` FROM `age` WHERE `id`=" . $id;
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function getDateById($id)
    {
        $sql = "SELECT `date` FROM `date` WHERE `id`=" . $id;
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function setDateDayChanges($data)
    {
        $sql = "INSERT INTO `not_work_days`( `days`) VALUES ('" . $data . "')";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }

    public function getDateDays()
    {
        $sql = "SELECT `days` FROM `not_work_days` ";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }
    public function removeDateDays()
    {
        $sql = "DELETE FROM `not_work_days` ";
        $query = mysqli_query($this->db, $sql);
        return $query;
    }

    public function orderToDb(Order $order)
    {
        $name = filterInput($order->name);
        $age = filterInput($order->age);
        $number = filterInput($order->number);
        $date = filterInput($order->date);
        $hairdress = filterInput($order->hairdress);
        $price = filterInput($order->price);
        $hairCut = filterInput($order->hairCut);
        $checked = filterInput($order->checked);
        $sql = "INSERT INTO `orders`( `name`, `age`, `number`, `date`,`hairdress`, `hairCut`, `price`, `checked`) 
  VALUES ('$name ',$age,'$number',$date,$hairdress,'$hairCut',$price,$checked);";
        if (mysqli_query($this->db, $sql))
            return true;
        else
            return false;
    }
}
