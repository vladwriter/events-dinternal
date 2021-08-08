<?php
    require ("connect.php");
    if(isset($_POST['sign_in'])){

        //Check form
        $firstname = trim(htmlspecialchars($_POST['f_name']));
        $firstname = str_replace("'", "&apos;", $firstname);
        $firstname = str_replace('"', "&quot;", $firstname);
        $lastname = trim(htmlspecialchars($_POST['l_name']));
        $lastname = str_replace("'", "&apos;", $lastname);
        $lastname = str_replace('"', "&quot;", $lastname);

        $email = trim(htmlspecialchars($_POST['email']));
        $phone = $_POST['phone'];
        $total = $_POST['total'];
        $event_id = $_POST['event_id'];
        $event_list = $_POST['event_list'];
        $payment=0;

        date_default_timezone_set('Europe/Kiev');
        $date_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO users (f_name, l_name, email, phone, event_list, event_id, total, payment, date_time) VALUES ('$firstname','$lastname', '$email','$phone', '$event_list', '$event_id','$total', '$payment', '$date_time')";
         if($conn->query($sql)){
            echo "New user was created!";
        } else{
             echo "Something is wrong!";
        };
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оплата</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/css/uikit.min.css" />
</head>
<body>
    <div style="margin-left:40%">
       <p>Вітаємо!<br>
        Перш ніж перейти до оплати, перевірте свої дані</p>
        <ul style="text-align: left">
        <li>Імя й Прізвище <?php echo "$firstname"." "."$lastname"?></li>
        <li>Email  <?php echo "$email"?></li>
        <li>Телефон <?php echo "$phone"?></li>
        <li>Обрані курси <?php echo "$event_list"?></li>
    </ul>
    <div>
        <button class="uk-button uk-button-primary">Надіслати рахунок на email</button>
        <button style="margin-left: 30px" class="uk-button uk-button-primary">Сплатити онлайн</button>
    </div>
    </div>
    
</body>
</html>