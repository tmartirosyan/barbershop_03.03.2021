<?php
require "functions.php";
require "../class/MysqlDB.php";

if (isset($_POST['setDateDayChanges'])) {
    $result = setDateDayChanges($_POST['setDateDayChanges']);
    echo 1;

}
if (isset($_POST['getDateDays'])) {
    $result = getDateDays($_POST['getDateDays']);
    echo json_encode($result);
}
if (isset($_POST['confirmOrder'])) {
    $result = confirmOrder($_POST['confirmOrder']);
    echo $result;
}
if (isset($_POST['deleteOrder'])) {
    $result = deleteOrder($_POST['deleteOrder']);
    echo $result;
}
if (isset($_POST['getOrders'])) {
    $result = getOrders();
    echo json_encode($result);
}
if (isset($_POST['removeAllOrders'])) {
    $result = removeAllOrders();
    echo json_encode($result);
}
function removeAllOrders()
{
    $db = new MysqlDB();
    $result = $db->removeAllOrders();

    return $result;
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
function setDateDayChanges()
{
    $db = new MysqlDB();
    $dateDays = $_POST["setDateDayChanges"];
    $db->removeDateDays();
    for ($i = 0; $i < count($dateDays); $i++) {
        $date = date('Y-m-d', strtotime($dateDays[$i]));
        $db->setDateDayChanges($date);
    }
}
function confirmOrder($confirmOrderId)
{
    $db = new MysqlDB();
    $result = $db->confirmOrderById($confirmOrderId);

    return $result;
}
function deleteOrder($deleteOrderId)
{
    $db = new MysqlDB();
    $result = $db->deleteOrderById($deleteOrderId);

    return $result;
}
function getOrders()
{
    $db = new MysqlDB();
    $data = [];
    $pageId = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $limit = ($pageId - 1) * 10;
    $query = $db->getOrdersByLimit($limit);
    while ($result = mysqli_fetch_assoc($query)) {
        $data[] = $result;
    }
    return $data;
}
