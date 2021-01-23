<?php require 'views/header.php';
        $datos=$this->datos_usuario;
?>
<main class="contenedor pagina-cuenta">

<section>
    <h2>Detalles de la cuenta</h2>
    <div class="contenedor-flex detalles-cuenta">
        <?php require 'sidebar.php' ?>
        <form class="formulario-cuenta" action="">
            <fieldset>
                <label for="username">Nombre de usuario:</label>
                <input type="text" name="username" id="username" value="<?php echo $datos['usuario'] ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $datos['nombre'] ?>">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $datos['apellido'] ?>">
                <label for="fecha-nac">Fecha de nacimiento:</label>
                <input class="w-35" type="date" name="fecha-nac" id="fecha-nac" value="<?php echo $datos['fecha_nacimiento'] ?>">
                <label for="email">Correo electronico:</label>
                <input type="email" name="email" id="email" value="<?php echo $datos['email'] ?>">
            </fieldset>
            <fieldset>
                <legend>Direccion de envio</legend>
                <label for="calle">Calle:</label>
                <input class="w-35" type="text" name="calle" id="calle" value="<?php echo $datos['calle'] ?>">
                <label for="numero">Numero:</label>
                <input class="w-15" type="text" name="numero" id="numero" value="<?php echo $datos['numero'] ?>">
                <label for="ciudad">Ciudad:</label>
                <input class="w-35" type="text" name="ciudad" id="ciudad" value="<?php echo $datos['ciudad'] ?>">
                <label for="pais">Pais:</label>
                <input class="w-35" type="text" name="pais" id="pais" value="<?php echo $datos['pais'] ?>">
                <label for="cp">C.P:</label>
                <input class="w-15" type="text" name="cp" id="cp" value="<?php echo $datos['cp'] ?>">
            </fieldset>
            <div class="submit-contenedor">
                <input id="btn-cuenta" class="btn btn-detalles-cuenta" type="submit" value="Actualizar datos">
            </div>

        </form>
    </div>
</section>

</main>
<?php require 'views/footer.php';?>