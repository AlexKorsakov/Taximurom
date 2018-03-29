{include file='header.html'}
<body>
<div data-role="page" id="one">

    <div data-role="header">
        <h1>Taxi-Murom</h1>
        <a href="/menu" data-icon="gear"  class="ui-btn-right">&nbsp;</a>
    </div><!-- /header -->
    {if $Status_zayavki == 0}
        <table>
            {foreach from=$requests item=request}
                <tr>
                    <th>{$request.description}</th>
                    <td>{$request.adress}</td>
                    <td>{$request.time}</td>
                    <td>
                        <form method="post" action="/driver_interface" name="{$request.id}">
                            <input type="hidden"  name="id" value="{$request.id}" />
                            <input type="submit" value="Принять" name="Accept" />
                        </form>
                    </td>
                </tr>
            {/foreach}
        </table>
    {/if}
    {if $Status_zayavki == 1}
        <table>
            {foreach from=$PerformRequest item=request}
                <tr>
                    <th>{$request.id}</th>
                    <td>{$request.description}</td>
                    <td>{$request.adress}</td>
                    <td>{$request.time}</td>
                    <td>
                        <form method="post" action="/driver_interface" name="Done">
                            <input type="hidden"  name="id" value="{$request.id}" />
                            <input type="submit" value="Выполнено" name="Perform" />
                        </form>
                    </td>
                </tr>
            {/foreach}
        </table>
    {/if}
    {if $Status_zayavki == 2}
        <div>{$warn}</div>
    {/if}

</div>

</body>
</html>