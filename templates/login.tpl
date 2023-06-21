{include file="header.tpl"}

{if !$logged}
    <div id="container-forms">
        <div>
            <form id="form-register" action="verifyRegister" method="POST">
                <h1>Registrarse</h1>
                <input type="text" name="usernameRegister" minlength="8" maxlength="15" required>
                <input type="password" name="passwordRegister" minlength="5" maxlength="15" required>
                <input type="submit" value="REGISTRARSE">
            </form>
        </div>
        <div>
            <form id="form-login" action="verifyLogin" method="POST">
                <h1>Iniciar Sesion</h1>
                <input type="text" name="usernameLogin" minlength="8" maxlength="15" required>
                <input type="password" name="passwordLogin" minlength="8" maxlength="15" required>
                <input type="submit" value="INGRESAR">
            </form>
        </div>
    </div>
    <section>
        <div class = "container-alert">
            <h3>{$error}</h3>
        </div>
    </section>
{/if}

{if $logged}
    <section>
    <div class = "container-alert">
        <h3>Le notificamos que ya ha iniciado sesión previamente. No es posible realizar un inicio de sesión adicional en este momento.</h3>
    </div>
    </section>
{/if}