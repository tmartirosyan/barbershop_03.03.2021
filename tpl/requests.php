<?php
require "functions.php";
require "../class/Order.php";
require "../class/MysqlDB.php";

if (isset($_POST['getDateDays'])) {
    $result = getDateDays($_POST['getDateDays']);
    echo json_encode($result);
}
if (isset($_POST['addOrder'])) {
    $result = addOrder();
    echo $result;
}
if (isset($_POST['getHairCutsByAge'])) {
    $result = getHairCutsByAge();
    echo json_encode($result);
}
if (isset($_POST['getDateByHairdress'])) {
    $result = getDateByHairdress();
    echo json_encode($result);
}
if (isset($_POST['sendMail'])) {
    $result = sendMail();
    echo json_encode($result);
}
function getDateDays()
{
    $db = new MysqlDB();
    $query = $db->getDateDays();
    while ($result = mysqli_fetch_assoc($query)) {
        $data[] = $result;
    }
    return $data;
}
function getHairCutsByAge()
{
    $hairCutsArr = [];
    $age = $_POST['getHairCutsByAge'];
    $db = new MysqlDB();
    $query = $db->getHairCutsByAge($age);
    while ($result = mysqli_fetch_assoc($query)) {
        $hairCutsArr[] = $result;
    }
    return $hairCutsArr;
}
function getDateByHairdress()
{
    $dateArr = [];
    $hairdress = $_POST['getDateByHairdress'][0];
    $dateDay = date('Y-m-d', strtotime($_POST['getDateByHairdress'][1]));
    $db = new MysqlDB();
    $query = $db->getDateByHairdress($hairdress,$dateDay);
    while ($result = mysqli_fetch_assoc($query)) {
        $id = $db->getDateById($result['date']);
        $dateArr[] = mysqli_fetch_assoc($id);
    }
    return $dateArr;
}
function addOrder()
{
    $data = json_decode($_POST['addOrder']);
    $order = new Order($data);
    $db = new MysqlDB();
    $result = $db->orderToDb($order);
    return $result;
}
function sendMail()
{
    $id = json_decode($_POST['sendMail'][0]);
    $data = $_POST['sendMail'][1];

    $db = new MysqlDB();
    $result = $db->getHairdressMailById($id);

    $to = mysqli_fetch_assoc($result)['email'];
    $hairdressLink = $_SERVER["HTTP_ORIGIN"]."/admin/index.php";
    $subject = "nor Patver ".date("h:i:s Y-m-d");
    $msg = "<ul>";
    $msg .= "<li><h3>duq uneq nor patver</h3></li>";
    $msg .="<li>name :". $data['name']."</li>";
    $msg .="<li>age :". $data['age']."</li>";
    $msg .="<li>number :". $data['number']."</li>";
    $msg .="<li>date :". $data['date']."</li>";
    $msg .="<li>hairdress :". $data['hairdress']."</li>";
    $msg .="<li>hairCut :". $data['hairCut']."</li>";
    $msg .="<li>price :". $data['price']."</li>";
    $msg .= "</ul>";
    $msg    = '
    <div style="text-align:left;color:blue;">
    <h2>' . $subject . '</h2>
    ' . $msg . '
    <h4>hastatelu hamar anceq ays <a href="'.$hairdressLink.'"> hxumov` </a></h4>
    

    </div>';

    $from = "patver@barbershop.am";
    $headers = "MIME-Version: 1.0 " . "\r\n";
    $headers .= "From: $from  " . "\r\n";
    $headers .= "Content-type: text/html;charset=utf-8 " . "\r\n";
    $headers .= "X-Priority: 3" . "\r\n";
    $headers .= "X-Mailer: smail-PHP " . phpversion() . "";
    mail($to, $subject, $msg, $headers);
}
