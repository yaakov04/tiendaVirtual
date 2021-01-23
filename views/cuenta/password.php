<?php require 'views/header.php';
?>
<main class="contenedor pagina-cuenta">

<section>
    <h2>Detalles de la cuenta</h2>
    <div class="contenedor-flex detalles-cuenta">
        <?php require 'sidebar.php' ?>
        <form class="formulario-password formulario-cuenta" action="">
            <fieldset>
                
            <label for="new-password">Escriba su nueva contraseña:</label>
            <input type="password" name="new-password" id="new-password">
            <label for="confirm-password">Confirme su nueva contraseña</label>
            <input type="password" name="confirm-password" id="confirm-password">

            </fieldset>
            
            <div class="submit-contenedor contenedor-btn-password">
                <input id="btn-password" class="btn btn-detalles-cuenta" type="submit" value="Actualizar contraseña">
            </div>

        </form>
    </div>
</section>

</main>
<?php require 'views/footer.php';?>