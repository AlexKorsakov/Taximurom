<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Таксисты</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>

<div>
    <h3>Таксисты</h3>
    {foreach from=$users item=user}
        <h2>Имя: {$user.name}</h2>
        К вам приедет {$user.avto_name}<br />
        С номером "{$user.avto_number}"
    {/foreach}
</div>

</body>
</html>