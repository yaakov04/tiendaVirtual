<?php require 'views/header2.php';?>
    <main>
        <div class="contenedor">
            <div class="formulario-login-contenedor">
                <form action="">
                    <fieldset>
                        <legend>
                            <h2>Inicia Sesión</h2>
                        </legend>
                        <div class="input">
                            <label for="username">Introduzca su nombre de usuario:</label>
                            <input type="text" name="username" id="username" placeholder="Nombre de usuario">
                        </div>
                        <div class="input">
                            <label for="password">Introduzca su contraseña</label>
                            <input type="password" name="password" id="password">
                        </div>
                    </fieldset>
                    <input class="btn btn-login" type="submit" value="Iniciar sesíon">
                </form>
            </div>
        </div>
    </main>
</body>

</html>