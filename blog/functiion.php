<?php
    function isUserAuth(){
        return empty($_SESSION['user_id']);
    }