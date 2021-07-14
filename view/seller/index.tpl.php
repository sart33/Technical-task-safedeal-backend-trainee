
<div class='wrapper'>
    <main class='main' id='main'>
        <div class="container"><div class="heading heading-center mb-3">
                <h2 class="title">
                    <?='<br>'?>

                    <?=array_shift($vars);?>
                </h2></div>
            <div class="row">
                <br>
                <br>
                <br>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Товар</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Стоимость</th>
                        <th scope="col">Время доставки</th>
                        <th scope="col">Статус</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($vars[0] as $items): ?>

                   <tr>
                     <?php foreach ($items as $key => $item): ?>
                     <?php $idItem = $items['id'];?>
                        <?php if($key === 'id'): ?>
                             <th scope="row">
                                 <a href="/seller/id/<?=$item?>"><?=$item?></a>
                        </th>
                         <?php elseif ($key === 'status'): ?>
                                <?php if ($item == '1'): ?>
                                 <th scope="row">
                                     <a href="/seller/id/<?=$item?>">На складе</a>
                                 </th>
                                <?php elseif ($item == '2'): ?>
                                 <th scope="row">
                                     <a href="/seller/id/<?=$item?>">В пути</a>
                                 </th>
                                <?php elseif ($item == '3'): ?>
                                <th scope="row">
                                 <a href="/seller/id/<?=$item?>">Доставлен</a>
                                </th>
                             <?php endif; ?>

                        <?php else: ?>
                        <td><a href="/seller/id/<?=$idItem?>"><?=$item?></a></td>

                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

                <br>
                <br>
                <br>




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