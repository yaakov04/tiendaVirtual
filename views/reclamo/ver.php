<?php require 'views/header.php';?>
<main style="min-height:46vh;" class="contenedor">
    <h2>Mensajes del reclamo</h2>

    <?php foreach ($this->mensajes as $mensaje) {?>

<div id="<?php echo 'mensaje_'.$mensaje['id_mensaje'] ?>" class="card ">
    <header>
        <h2 class="card__header">Mensaje #<?php echo $mensaje['id_mensaje'] ?></h2>
    </header>
    <div class="card__content">
        <div class="mensaje">
            <p>Id reclamo: <?php echo $mensaje['reclamo'] ?></p>
            <p>Id venta: <?php echo $mensaje['venta'] ?></p>
            <p>Id pedido: <?php echo $mensaje['pedido'] ?></p>
            <p><?php echo $mensaje['nombre'] ?></p>
            <p><?php echo $mensaje['correo'] ?></p>
            <p><?php echo $mensaje['fecha'] ?></p>
            

            <p class="mensaje__asunto"><?php echo $mensaje['asunto'] ?></p>
            <p><?php echo $mensaje['mensaje'] ?></p>
        </div>
    </div>

    <footer>
        <p class="card__footer">Mensaje</p>
    </footer>
</div>
<!--.card-->
<?php }//foreach ?>
    
</main>
<?php require 'views/footer.php';?>