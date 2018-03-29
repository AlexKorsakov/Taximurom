{include file='header.html'}
    <body>
    <div data-role="page" id="one">
        <div data-role="header">
            <h1>Taxi-Murom</h1>
        </div><!-- /header -->
        <div data-role="content" >
            <div class="ui-grid-solo">
                <div class="ui-block-a">
                {if $form_pass == 0}
                    <form action="/registration" method="post">
                        <input type="text" name="PhoneNumber" maxlength="10" placeholder="(9**)-***-**-**" >
                        <input type="submit" name="Submit" data-theme="e" value="Продолжить">
                    </form>
                    <form hidden="true">
                        <input type="submit" />
                    </form>
                {/if}
                {if $form_pass == 1}
                    <form action="/registration" method="post">
                        <input type="text" name="Password" maxlength="5" placeholder="Введите ключ:">
                        <input type="submit" name="PassSubmit" data-theme="e" value="Зарегистрироваться">
                    </form>

                {/if}
                {if $form_pass == 2}
                    <script type="text/javascript">
                        window.location.href = "/interface";
                    </script>
                {/if}
                {if $form_pass == 3}
                    <script type="text/javascript">
                        window.location.href = "/registration";
                    </script>
                {/if}
                </div>   
            </div>
        </div><!-- /content -->
    </div><!-- /page one -->
    </body>
</html>