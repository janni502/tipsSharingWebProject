<?php
    include_once('include_fns.php');
    
    $handle = db_connect();
    
    $now = time();
    
    $story = $_REQUEST['story'];
    if(check_permission($_SESSION['auth_user'],$story)){
        $query = "update stories set published = $now
                    where id = $story";
        $result = mysqli_query($handle,$query);
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);
?>