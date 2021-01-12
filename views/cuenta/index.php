<?php require 'views/header.php';?>
<main class="contenedor pagina-cuenta">

<section>
    <h2>Detalles de la cuenta</h2>
    <div class="contenedor-flex detalles-cuenta">
        <aside>
            <div class="profile-img">
                <img src="<?php echo URL; ?>public/img/avatar-1577909_640.png" alt="">
            </div>
            <nav class="nav-cuenta">
                <a href="#">Ver pedidos</a>
                <a href="#">Ver wish list</a>
                <a href="#">Cambiar contraseña</a>
            </nav>
        </aside>
        <form class="formulario-cuenta" action="">
            <fieldset>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="Jacob">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" value="de Canterbury">
                <label for="fecha-nac">Fecha de nacimiento:</label>
                <input class="w-35" type="date" name="fecha-nac" id="fecha-nac">
                <label for="email">Correo electronico:</label>
                <input type="email" name="email" id="email" value="BANOBACOA.J@FAKEMAIL.COM">
            </fieldset>
            <fieldset>
                <legend>Direccion de envio</legend>
                <label for="calle">Calle:</label>
                <input class="w-35" type="text" name="calle" id="calle" value="BAKER STREET">
                <label for="numero">Numero:</label>
                <input class="w-15" type="text" name="numero" id="numero" value="221-B">
                <label for="ciudad">Ciudad:</label>
                <input class="w-35" type="text" name="ciudad" id="ciudad" value="LONDON">
                <label for="pais">Pais:</label>
                <input class="w-35" type="text" name="pais" id="pais" value="Inglaterra">
                <label for="cp">C.P:</label>
                <input class="w-15" type="text" name="cp" id="cp" value="1200">
            </fieldset>
            <div class="submit-contenedor">
                <input class="btn btn-detalles-cuenta" type="submit" value="Actualizar datos">
            </div>

        </form>
    </div>
</section>

</main>
<?php require 'views/footer.php';?>