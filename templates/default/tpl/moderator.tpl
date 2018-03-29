<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Taxi-Murom</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
</head>
</html>
{include file='header.html'}
<body>
<!-- START PAGE SOURCE -->

<div data-role="page">

    <div data-role="header">
        <h1>Админ-панель</h1>
        <a href="/setting" data-icon="gear" class="ui-btn-right">&nbsp;</a>
    </div>
    <!-- /header -->
    <div class="content">
        <div class="ui-grid-solo">
            <table width="90%">
                <tr style="padding: 30px;">
                    <td align="center">
                        <div class="ui-block-a col">
                            <h2>Заявки в ожидании</h2>

                            {foreach from=$requests item=request}
                                <div class="post">
                                    <h4>Адрес: {$request.adress}</h4>
                                    Текст: {$request.description}<br/>
                                    Время: {$request.time}
                                </div>
                            {/foreach}

                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <h2>Таксисты</h2>
                            {foreach from=$drivers item=driver}
                                <div class="post">
                                    <h4>Имя: {$driver.name}</h4>
                                    ID: {$driver.id}<br/>
                                    Название машины: {$driver.avto_name}<br/>
                                    Гос номер: "{$driver.avto_number}"

                                </div>
                            {/foreach}
                        </div>
                    </td>
                    <td>
                        <div class="col col-last">
                            <h2>Юзеры</h2>
                            {foreach from=$users item=user}
                                <div class="post">
                                    <h4>Телефон: {$user.phone_number}</h4>

                                    <form method="post" action="/moderator" id="{$user.id}">
                                        <input type="hidden" name="ID" id="{$user.id}">
                                        <input type="submit" name="MakeDriver" value="Сделать таксистом"/>
                                    </form>
                                </div>
                            {/foreach}

                        </div>
                    </td>
                    <div class="cl">&nbsp;</div>
                    <div class="cl">&nbsp;</div>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="footer">
    <div class="shell">
        <div style="clear:both;"></div>
    </div>
</div>
<!-- END PAGE SOURCE -->
</body>
</html>