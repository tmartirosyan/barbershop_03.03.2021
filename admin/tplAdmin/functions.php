<?php 
function pre($arg)
{
	echo "<pre>";
	print_r($arg);
	echo "</pre>";
}
function loginCheck(){
    $db = new MysqlDB();
    $result = $db->adminLogIn();
    if ($result) {

        $user = $result->fetch_assoc();
        $result->free();
        if (!empty($user)) {
            $_SESSION['user_info'] = $user;
            $db = new MysqlDB();
            $result = $db->setLastLogin($user);
           
        } else {
            $error = 'Wrong email or password.';
        }
    } 
    if(isset($error)){
        return $error;
    }
}

function userLogOut(){
    $_SESSION['user_info'] = null;
    unset($_SESSION['user_info']);
}
function setError($error){
    ?>
<div class="alert alert-danger">
<strong>Error</strong> <?php echo $error; ?>
</div>
<?php }