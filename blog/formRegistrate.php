<?php
session_start();

    if(isUserAuth()){
        echo <<<HTML
            <

        HTML;
    }

    ?>

    <form action="regist.php" method="post">
        <label for="1">email</label><input type="email" name="email" id="1">
        <label for="2">Password</label><input type="password" name="password" id="2">
        <input type="submit" value="register">
    </form>