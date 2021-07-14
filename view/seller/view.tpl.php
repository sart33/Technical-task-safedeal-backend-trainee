<?php
?>
<div class='wrapper'>
    <main class='main' id='main'>
        <div class="container"><div class="heading heading-center mb-3">

                <a href="/seller">К списку заказов</a>
                <h2 class="title">
                    <?='<br>'?>

<!--                    "ALTER TABLE `order` ADD `status` TINYINT(2) NOT NULL DEFAULT '0' AUTO_INCREMENT ;"-->
                    <?php
                   echo 'Id: ' . $vars['id'] . ' ' . $vars[0]['product_name'];
//                   unset($vars['id']);
                    ?>
                </h2></div>
            <a class="row">
                <br>
                <br>
                <br>


<!--                        <th scope="col">id</th>-->
<!--                        <th scope="col">Товар</th>-->
<!--                        <th scope="col">Вес</th>-->
<!--                        <th scope="col">Количество</th>-->
<!--                        <th scope="col">Стоимость</th>-->
<!--                        <th scope="col">Адресс доставки</th>-->
<!--                        <th scope="col">Время заказа</th>-->
<!--                        <th scope="col">Время доставки</th>-->
<!--                        <th scope="col">Статус</th>-->



                 <?php foreach ($vars[0] as $key => $item): ?>

                 <?php if($key === 'status'): ?>
                <?php if($item == 1): ?>
                <?=" $key : На складе<br>"?>
                <?php elseif ($item == 2): ?>
                <?=" $key : В пути<br>"?>
                <?php elseif ($item == 3): ?>
                <?=" $key : Доставлен<br>"?>
                <?php endif; ?>
                 <?php else: ?>
                 <?=" $key : $item<br>"?>
                 <?php endif; ?>
                 <?php endforeach; ?>
                <br>
                <br>
                <br>
                <a href="/seller/edit/<?=$vars['id']?>">Изменить статус</a>






            </div></div>


<!--<div class='table'>-->
<!--    <div class='tale-wrapper'>-->
<!--        <div class='table-title'>Войти в панель администратора</div>-->
<!--        <div class='table-content'>-->
<!--            <form method='post' id='login-form' class='login-form'>-->
<!--                <input type='text' placeholder='Логин' class='input'-->
<!--                       name='login' required><br>-->
<!--                <input type='password' placeholder='Пароль' class='input'-->
<!--                       name='password' required><br>-->
<!--                <input type='submit' value='Войти' class='button'>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</main>
</div>