{include file='header.html'}
    <body>
    <div data-role="page" id="one">

        <div data-role="header">
            <h1>Taxi-Murom</h1>
            <a href="/menu" data-icon="gear"  class="ui-btn-right">&nbsp;</a>
        </div><!-- /header -->

        <div data-role="content" >
            <div class="ui-grid-solo">
                <div class="ui-block-a">
                    <span>Список заявок.</span>
                    <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
                        <thead>
                        
                        <tr>
                            <th style="width: 50px;" data-priority="1">№</th>
                            <th data-priority="2">Адрес</th>
                            <th data-priority="3">Дата</th>
                            <th data-priority="4">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach from=$requests item=request}
                            <tr>
                                <th>{$request.id}</th>
                                <td>{$request.adress}</td>
                                <td>{$request.time}</td>
                                <td>{if $request.status_id == 1}Ожидание{/if}{if $request.status_id == 2}Выполняется{/if}{if $request.status_id == 3}Завершено{/if}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    <br/><br/>
                </div>
                <div class="ui-block-a"><a href="#add_request" data-role="button" data-rel="popup" data-position-to="window"  data-theme="e">Заказать такси</a></div>
                <div data-role="popup" id="add_request" data-theme="a" data-overlay-theme="a" class="ui-corner-all">
                    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <form action="/interface" method="post">
                        <div style="padding: 20px;">
                            <h3>Укажите свой адрес:</h3>                            
                            <input type="text" name="address" id="text-6" value="" placeholder="Ваш адрес:">
                            <input type="text" name="description" id="text-6" value="" placeholder="Комментарий:">
                            <!-- <select name="select-choice-a"  data-native-menu="false">
                                <option disabled selected>Город</option>
                                <option value="#">Муром</option>
                                <option value="#">Навашино</option>
                            </select>
                            <select name="select-choice-a"  data-native-menu="false">
                                <option disabled selected>Улица</option>
                                <option value="#">Дзержинского</option>
                                <option value="#">Московская</option>
                            </select>
                            <select name="select-choice-a"  data-native-menu="false">
                                <option disabled selected>Дом</option>
                                <option value="#">20</option>
                                <option value="#">74</option>
                            </select> !-->
                            <br/><br/>
                            <input type="submit" name="ins" data-theme="e" value="Отправить заявку">
                            <input type="reset" data-theme="b" value="Очистить">
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /content -->
    </div><!-- /page one -->
    </body>
</html>

<!--<iframe src="http://taximurom.ru/" frameborder="0" border="0" cellspacing="0" style="border-style: none;width: 100%; height: 100%;" id="iframe"></iframe>-->