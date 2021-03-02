<?php include "tplAdmin/header.php"; ?>
<?php
// check if user is logged
$error = '';
if (isset($_POST['is_login'])) {
    $error = loginCheck();
}

// action when logout is pressed
if (isset($_GET['ac']) && $_GET['ac'] == 'logout') {
    userLogOut();
}

if ($error !== '' &&  !is_null($error)) {
    setError($error);
}

?>
<?php
// logged in info
if (isset($_SESSION['user_info']) && is_array($_SESSION['user_info'])) { ?>
    <meta http-equiv="refresh" content="60">
<?php
    include "tplAdmin/adminPage.php";
} else {
    include "tplAdmin/loginForm.php";
} ?>
</div>


<?php include "tplAdmin/footer.php"; ?>