<!-- Задача #3.2

        + Скачайте верстку сайта “Бургерная”

        + Внизу вы найдете форму заказа, напишите скрипт, обрабатывающий эту форму. Скрипт должен:

        +Проверить, существует ли уже пользователь с таким email, если нет - создать его, если да - увеличить число заказов по этому email. Двух пользователей с одинаковым email быть не может.

        Сохранить данные заказа - id пользователя, сделавшего заказ, дату заказа, полный адрес клиента.

        Скрипт должен вывести пользователю:

        Спасибо, ваш заказ будет доставлен по адресу: “тут адрес клиента”
        Номер вашего заказа: #ID
        Это ваш n-й заказ!
        Где ID - уникальный идентификатор только что созданного заказа n - общий кол-во заказов, который сделал пользователь с этим email включая текущий

        Оформление не требуется, достаточно текста на белом фоне, отбитого переходами строк. -->


<?php
function connect()
{
    try {

        $user = "alibaba";
        $pass = "281942Aa";
        $connect =  new PDO('mysql:host=194.147.34.65;dbname=CRM_VODA_DB', $user, $pass);
        return $connect;
    } catch (PDOException $e) {

        return $e->getMessage();
    }
}

function getUser() //true or false 
{
    $smt = connect()->prepare("SELECT * FROM user WHERE `user_email` = ?");
    $smt->execute([$_POST['email']]);
    $result = $smt->fetch(PDO::FETCH_OBJ);
    if (!empty($result->user_email)) {
        return true;
    }
    return false;
}

function addUser()
{
    $sql = "INSERT INTO user (
                            `user_name`,
                            `user_phone`,
                            `user_email`,
                            `user_street`,
                            `user_home`,
                            `user_casing`,
                            `user_flat`,
                            `user_floor`) 
                    VALUES (:name,
                            :phone,
                            :email,
                            :street,
                            :home,
                            :casing,
                            :flat,
                            :floor
                            )";
    connect()->prepare($sql)->execute([
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'street' => $_POST['street'],
        'home' => $_POST['home'],
        'casing' => $_POST['part'],
        'flat' => $_POST['appt'],
        'floor' => $_POST['floor']
    ]);
}

function addOrder()
{
    if (!isset($_POST['callback'])) {
        $_POST['callback'] = 'off';
    }
    $sql = "INSERT INTO `order` (
                    `order_comment`,
                    `order_pay_to_card`,
                    `order_callback`,
                    `user_id`) 
            VALUES (
                    :comment,
                    :payment,
                    :callback,
                    :user_id)";

    connect()->prepare($sql)->execute(
        [
            'comment' => $_POST['comment'],
            'payment' => $_POST['payment'],
            'callback' => $_POST['callback'],
            'user_id' => connect()->query("SELECT `user_id`, `user_email` FROM `user` WHERE `user_email` = '" . $_POST['email'] . "'")->fetch(PDO::FETCH_ASSOC)['user_id']
        ]
    );
}

function sandMessage()
{
    $sql = "SELECT count(*),user_street, user_home, user_casing, user_flat, user_floor
                    FROM `user`,`order` WHERE `user`.user_id = `order`.user_id AND user.user_email = ?";

    $query = connect()->prepare($sql);
    $query->execute([$_POST['email']]);

    $count = $query->fetch(PDO::FETCH_ASSOC);

    $str = "ул. " . $count['user_street'] . ", Дом: " . $count['user_home'];

    if (!empty($count['user_casing'])) {
        $str .= " Корпус: {$count['user_casing']} ";
    }

    $str .= ", Этаж: {$count['user_flat']}, Квартра: {$count['user_floor']} <br>";

    echo "Спасибо, ваш заказ будет доставлен по адресу: {$str}";
    echo "Номер вашего заказа: " . connect()->lastInsertId() . "<br>";
    echo "Это ваш {$count['count(*)']}-й заказ!";
}

//проверяем существует ли пользователь 
if (!getUser()) {
    addUser();
    addOrder();
    sandMessage();
} else {
    addOrder();
    sandMessage();
}
