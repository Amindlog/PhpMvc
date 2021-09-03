<?php
    session_start();
    if (isUserAuth()) {
        header("location:formRegistrate.php"); die;    
    }

    // $_SESSION['user_id'] = 12312;//записываем индификатор