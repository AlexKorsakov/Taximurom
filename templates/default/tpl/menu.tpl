{include file='header.html'}
    <body>
    <div data-role="page" id="one">

        <div data-role="header">
            <a href="#" onClick="history.back()" data-icon="back">Назад</a>
            <h1>Taxi-Murom</h1>
        </div><!-- /header -->

        <div data-role="content" >
            <div class="ui-grid-solo">
                <div class="ui-block-a"><a href="#about_app" data-role="button" data-rel="popup" data-position-to="window">О программе</a></div>
                <div class="ui-block-a"><a href="#" onclick='javascript: location.href = "/profile"' data-role="button" data-rel="popup" data-position-to="window">Интерфейс таксиста</a></div>
                <div class="ui-block-a"><a href="#add_report" data-role="button" data-rel="popup" data-position-to="window">Пожаловаться</a></div>
                <div class="ui-block-a"><a href="#" onclick='javascript: location.href = "/index";var date = new Date(0);document.cookie="PhoneNumber=; path=/modules; expires="+date.toUTCString();' data-role="button" class="reset_button">Выход</a></div>
            </div>
            <div data-role="popup" id="about_app" class="ui-content" data-theme="d">
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                <p>Какой-то текст о проге.</p>
            </div>
            <div data-role="popup" id="singup_taxidriver" data-theme="a" class="ui-corner-all">
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                <form>
                    <div style="padding:10px 20px;">
                        <h3>Для того что бы войти как таксист введите</h3>
                        <label for="un" class="ui-hidden-accessible">Логин:</label>
                        <input type="text" name="user" id="un" value="" placeholder="логин" data-theme="a">
                        <label for="pw" class="ui-hidden-accessible">Пароль:</label>
                        <input type="password" name="pass" id="pw" value="" placeholder="пароль" data-theme="a">
                        <button type="submit" data-theme="b" data-icon="check">Войти</button>
                    </div>
                </form>
            </div>
            <div data-role="popup" id="add_report" data-theme="a" class="ui-corner-all">
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                <form>
                    <div style="padding:10px 20px;">
                        <h3>Введите текст жалобы</h3>
                        <textarea cols="40" rows="20" name="textarea-1" id="textarea-1"></textarea>
                        <button type="submit" data-theme="b" data-icon="check">Отправить</button>
                        <h3>Номер тех поддержки.</h3>
                    </div>
                </form>
            </div>
        </div><!-- /content -->

    </div><!-- /page one -->

    </body>
</html>

<!--<iframe src="http://taximurom.ru/" frameborder="0" border="0" cellspacing="0" style="border-style: none;width: 100%; height: 100%;" id="iframe"></iframe>-->