<html>

<body>


<div id="body">
    <div id="header">
        <form name="Filter">

        </form>
    </div>
    <div id="main">
        <table border="1" width="100%">
            <tr id="1" valign="top">
                <td id="left_col" width="30%" >
                    <h3>Заявки</h3><br>

                    {foreach from=$requests item=request}
                        ID: "{$request.id}"
                        Адрес: {$request.adress}
                        <br>
                        {$request.time}
                        <br>
                        {if $request.status_id == 1}Ожидание{/if}{if $request.status_id == 2}Выполняется{/if}{if $request.status_id == 3}Завершено{/if}
                        <br><br>
                    {/foreach}


                </td>
                <td id="center" width="30%">
                    <h3>Пользователи</h3><br>

                    {foreach from=$Users item=user}
                        ID: {$user.id}

                        Имя: {$user.name}
                        <br>
                        Телефон: {$user.phone_number}
                        <br>
                        {if $user.status_id == 1}Ожидание{/if}{if $user.status_id == 2}Выполняется{/if}{if $user.status_id == 3}Завершено{/if}
                        <br>
                    {/foreach}<br>
                    <h3>Они захотели стать таксистами:</h3><br>
                    {foreach from=$Not_yet_driver item=n_drv}
                        ID: {$n_drv.id} | Имя: {$n_drv.name} | Номер телефона: {$n_drv.phone_number}
                        <br>
                        Название авто: {$n_drv.avto_name} |  Номер авто: {$n_drv.avto_number}
                        <br>
                        Фото{$n_drv.avto_foto}

                        <form action="admin.php" method="POST">
                            <input type="hidden" name="not_yet_driver_id" value="{$n_drv.id}">
                            <input type="submit" name="confirm" value="Принять заявку">
                        </form>
                        <br>
                    {/foreach}

                </td>
                <td id="right_col" width="30%">
                    <h3>Таксисты</h3><br>
                    {foreach from=$Drivers item=taxist}
                        <div>
                            ID: {$taxist.id} | Имя: {$taxist.name} | Номер телефона: {$taxist.phone_number}
                            <br>
                            Название авто: {$taxist.avto_name} |  Номер авто: {$taxist.avto_number}
                            <br>
                            Фото{$taxist.avto_foto}

                            <form action="admin.php" method="POST">
                                <input type="hidden" name="drv_id" value="{$taxist.id}">
                                <input type="submit" name="EditDriver" value="Принять заявку">
                            </form>
                            <br>
                        </div>
                    {/foreach}
                </td>
            </tr>
            <tr id="2"  valign="top">
                <td id="left_col" width="30%">
                    fd
                </td>
                <td id="center" width="30%">
                    df
                </td>
                <td id="right_col" width="30%">

                </td>
            </tr>
        </table>
    </div>
    <div id="footer"></div>
</div>


</body>
</html>