<?php




?>
<div class='wrapper'>
    <main class='main' id='main'>
        <div class="container">
            <form class="vg-wrap vg-element vg-ninteen-of-twenty" method="post" action="/seller/edit/<?php echo $vars['id']; ?>"


            <a href="/seller">К списку заказов</a>
                <h2 class="title">
                    <?='<br>'?>

<!--                    "ALTER TABLE `order` ADD `status` TINYINT(2) NOT NULL DEFAULT '0' AUTO_INCREMENT ;"-->
                    <?php
                   echo 'Id: ' . $vars['id'] . ' ' . $vars[0]['product_name'];
//                   unset($vars['id']);
                    ?>
                </h2></div>
            <div class="row">
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



                <?php $keySt = 0 ?>
                 <?php foreach ($vars[0] as $key => $item): ?>

                 <?php if($key === 'status'): ?>
                 <?php if($item == 1): ?>
                 <?=" $key : На складе<br>"?>
                             <?php $keySt = 1 ?>
                 <?php elseif ($item == 2): ?>
                 <?=" $key : В пути<br>"?>
                 <?php $keySt = 2 ?>

                 <?php elseif ($item == 3): ?>
                 <?=" $key : Доставлен<br>"?>

                 <?php $keySt = 3 ?>
                 <?php endif; ?>
                 <?php else: ?>
                 <?=" $key : $item<br>"?>
                 <?php endif; ?>
                 <?php endforeach; ?>
                <br>
                <br>
                <br>
                <a href="/seler/edit/<?=$vars['id']?>">Изменить статус</a>

                <?php if($keySt === 1): ?>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">На складе</span>
                    <input type="radio" name="status" class="vg-input vg-half" <?="checked"?> value="1">
                </label><br>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">В пути</span>
                    <input type="radio" name="status" class="vg-input vg-half" value="2">
                </label><br>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">Доставлен</span>
                    <input type="radio" name="status" class="vg-input vg-half" value="3">
                </label><br>
                <?php elseif($keySt === 2): ?>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">На складе</span>
                    <input type="radio" name="status" class="vg-input vg-half" value="1">
                </label><br>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">В пути</span>
                    <input type="radio" name="status" class="vg-input vg-half" <?="checked"?> value="2">
                </label><br>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">Доставлен</span>
                    <input type="radio" name="status" class="vg-input vg-half" value="3">
                </label><br>
                <?php elseif($keySt === 3): ?>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">На складе</span>
                    <input type="radio" name="status" class="vg-input vg-half" value="1">
                </label><br>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">В пути</span>
                    <input type="radio" name="status" class="vg-input vg-half" value="2">
                </label><br>
                <label class="vg-element vg-full vg-center vg-left vg-space-between">
                    <span class="vg-text vg-half">Доставлен</span>
                    <input type="radio" name="status" class="vg-input vg-half" <?="checked"?> value="3">
                </label><br>
                <?php endif; ?>

                <input type="submit"
                       class="vg-text vg-firm-color1 vg-firm-background-color4 vg-input vg-button"
                       value="Сохранить">

</form>

            </div>


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