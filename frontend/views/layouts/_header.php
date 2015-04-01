<div class="row" id="header-container">
    <div id="header" class="container">
        <div class="col-lg-2">
            <a href="/" title="На главную">
                <img src="/img/main/logo.png" alt="Логотип Федерации хрккея с шайбой ХМАО-Югры" height="117" width="117"></a>
        </div>
        <div class="col-lg-6" id="logo-title">
            <p>Региональная общественная организация</p>
            <p style="padding-left:4px;">Федерация хоккея с шайбой</p>
            <p>Ханты-Мансийского Автономного округа-Югры</p>
        </div>
        <div id="reg" class="col-lg-4">
            <div class="col-lg-8">
                <input type="button" value="Регистрация" class="button" data-type="zoomout-reg" />
            </div>
            <div class="col-lg-4">
                <input type="button" value="Вход" class="button" data-type="zoomout-login" />
            </div>
        </div>
    </div>
    <div id="header-hr-line"></div>
</div>
<div class="overlay-container"></div>
<div class="window-container zoomout-reg">
    <div id="registration"> 
        <legend>Форма регистрации</legend>
        <form action="#" method="POST" role="form">
            <div class="form-reg-login">
                <input type="text" id="name" placeholder="Имя">
                <input type="text" id="email" placeholder="E-mail">
                <input type="text" id="password1" placeholder="Пароль">
                <input type="text" id="login" placeholder="Псевдоним">
                <input type="text" id="sity" placeholder="Город">
                <input id="personal-info" type="checkbox" hidden="" checked="" value="v1">
                <label for="personal-info">Согласен на обработку <ins>персональных данных</ins></label>
            </div>
            <button type="submit" class="form-reg-login-btn">Отправить</button>
        </form>
        <a class="close" title="Закрыть" href="#close">x</a>
    </div>
</div>
<div class="window-container zoomout-login">
    <div id="authorize">
        <legend>Вход</legend>
        <form action="#" method="POST" role="form">
            <div class="form-reg-login">
                <input type="text" id="name-login" placeholder="Имя или E-mail">
                <input type="text" id="password2" placeholder="Пароль">
                <input id="remember-me" type="checkbox" hidden="" checked="" value="v2">
                <label for="remember-me">Запомнить меня</label>
            </div>
            <button type="submit" class="form-reg-login-btn">Войти</button>
        </form>
        <a class="close" title="Закрыть" href="#close">x</a>
    </div>  
</div>