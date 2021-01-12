<?php require 'views/header2.php';?>
<main>
        <div class="contenedor">
            <div class="formulario-login-contenedor formulario-registrarse-contenedor">
                <form class="formulario-registrarse" action="">
                    <fieldset>
                        <legend>
                            <h2>Registrate</h2>
                        </legend>
                        <label for="username">Usuario:</label>
                        <input type="text" name="username" id="username">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" id="apellido">
                        <label for="fecha-nac">Fecha de nacimiento:</label>
                        <input class="w-35" type="date" name="fecha-nac" id="fecha-nac">
                        <label for="email">Correo electronico:</label>
                        <input type="email" name="email" id="email">
                    </fieldset>
                    <fieldset>
                        <legend>Direccion de envio</legend>
                        <label for="calle">Calle:</label>
                        <input type="text" name="calle" id="calle">
                        <label for="numero">Numero:</label>
                        <input class="w-35" type="text" name="numero" id="numero">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" name="ciudad" id="ciudad">
                        <label for="pais">Pais:</label>
                        <input type="text" name="pais" id="pais">
                        <label for="cp">C.P:</label>
                        <input class="w-35" type="text" name="cp" id="cp">
                    </fieldset>
                    <div class="submit-contenedor">
                        <input class="btn btn-detalles-cuenta" type="submit" value="Registrarse">
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>