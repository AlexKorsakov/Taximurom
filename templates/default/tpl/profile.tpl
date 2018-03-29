{include file='header.html'}
<body>

<div data-role="page" id="one">
    <div data-role="header">
        <a href="#" onClick="history.back()" data-icon="back">Назад</a>
        <h1>Taxi-Murom</h1>
    </div>
    <!-- /header -->

    <div data-role="content">
        {if $Status=='Read'}
            <div>

                {foreach from=$TaxiDriver item=taxist}

                    {if $taxist.user_type_id!='3' && $taxist.user_type_id!='4'}
                        <h3>Вы не таксист</h3>
                    {elseif $taxist.user_type_id=='4'}
                        <h3>Вы пока не таксист</h3>
                    {/if}
                    <br/>
                    {if $taxist.name!=null}
                        Имя: {$taxist.name}
                    {/if}
                    <br/>
                    {if $taxist.phone_number!=null}
                        Номер: {$taxist.phone_number}
                    {/if}
                    <br/>
                    {if $taxist.user_type_id!=null}
                        Тип: {$taxist.user_type_id}
                    {/if}
                    <br/>
                    {if $taxist.avto_name!=null}
                        Название машины: {$taxist.avto_name}
                    {/if}
                    <br/>
                    {if $taxist.avto_number!=null}
                        Номер авто: {$taxist.avto_number}
                    {/if}
                    <br/>
                    {if $taxist.avto_foto!=null}
                        Ссыль на фото: {$taxist.avto_foto}
                    {/if}
                {/foreach}
                <form action="/profile" method="get">
                    <input type="hidden" value="{$taxist.name}" name="Name">
                    <input type="hidden" value="{$taxist.user_type_id}" name="Type">
                    <input type="hidden" value="{$taxist.avto_name}" name="AvtoName">
                    <input type="hidden" value="{$taxist.avto_number}" name="AvtoNumber">
                    <input type="hidden" value="{$taxist.avto_foto}" name="Foto">
                    <input type="submit" value="Редактировать информацию" name="ReeWrite">
                </form>
            </div>
        {/if}

        {if $Status=='Write'}
            <div>
                <form action="/profile" method="POST" enctype="multipart/form-data">
                    Введите ФИО: <input type="text" name="UserName"         value="{php}echo $_GET['Name'] {/php}">
                    Название авто: <input type="text" name="Avto"           value="{php}echo $_GET['AvtoName'] {/php}">
                    Регистрационный номер: <input type="text" name="RegNumb"     value="{php}echo $_GET['AvtoNumber'] {/php}">
                    Фотография: <input type="file" name="Foto"       value="{php}echo $_GET['Foto'] {/php}">
                    {if $UserStatus!='4' && $UserStatus!='3'}
                        Хочу стать таксистом!
                        <input type="checkbox" name="MakeTaxiDriver">
                    {elseif $UserStatus=='4'}
                        Ваша заявка на должность таксиста на рассмотрении
                    {/if}
                    <input type="submit" name="SendData" value="Отправить">
                </form>
            </div>
            <form action="/profile" method="get">
                <input type="submit" value="Вернуться" name="Forward">
            </form>
        {/if}
    </div>
</div>

</body>
</html>