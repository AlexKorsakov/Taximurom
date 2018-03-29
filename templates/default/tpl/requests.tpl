<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Заявки</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
<div>
    {foreach from=$requests item=request}
        <div>

            <h2>Адрес: {$request.adress}</h2>
            Текст: {$request.description}<br />
            Время: {$request.time}
        </div>
{/foreach}
</div>

</body>
</html>