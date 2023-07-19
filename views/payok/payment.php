<?php

// Занесение параметров в массив
$array = array (

    $amount = 100.5,
    $payment = 10000,
    $shop = 1,
    $currency = 'RUB',
    $desc = 'Тестовый товар',
    $secret = 'SECRET KEY' //Узнайте свой секретный ключ в личном кабинете

);

// Соединение массива в строку и хеширование функцией md5
$sign = md5 ( implode ( '|', $array ) );

?>

<form action='https://payok.io/pay' method= 'POST'>

    <input type='hidden' name= 'amount' value= "<?php echo $amount; ?>">
    <input type='hidden' name= 'payment' value= "<?php echo $payment; ?>">
    <input type='hidden' name= 'shop' value= "<?php echo $shop; ?>">
    <input type='hidden' name= 'currency' value= "<?php echo $currency; ?>">
    <input type='hidden' name= 'desc' value= "<?php echo $desc; ?>">
    <input type='hidden' name= 'email' value= 'test@payok.io' >
    <input type='hidden' name= 'method' value= 'cd' >
    <input type='hidden' name= 'sign' value= "<?php echo $sign; ?>">

    <!-- Можете вставить нужные вам параметры, они будет переданы в уведомлении -->
    <input type='hidden' name= 'myparam' value= 'Параметр 1' > <!-- Необязательно -->
    <input type='hidden' name= 'anotherparam' value= 'Параметр 2' > <!-- Необязательно -->

    <input type='submit' value='Купить'>
</form>
