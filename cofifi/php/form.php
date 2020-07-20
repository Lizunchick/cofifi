<?php
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root', 'users');//подключ к бд

if (mb_strlen($name) > 30) {
    echo "Недопустимая длина логина";
    exit;
} else if (mb_strlen($email) > 250) {
    echo "Недопустимая длина E-Mail";
    exit;
} else if (mb_strlen($phone) > 250) {
    echo "Недопустимый номер";
    exit;
}
else {

    $result = $mysql->query("SELECT * FROM `registr` where `phone`='$phone' or `email`='$email'");
    if (count($result->fetch_assoc()) > 0) {
        echo "Такой пользователь уже существует";
        exit;
    }


}

$mysql->query("INSERT INTO `registr` (`name`, `phone`, `email`) VALUES('$name', '$phone', '$email')");
$mysql->close();
print ("
                <script language=javascript>
                window.alert('Вы записаны на наш курс!');
                window.location = '../pages/index.html'
                </script>
            ");
exit;
