<?php require 'views/header.php';?>
<main class="contenedor pagina-lista-pedidos">


    <h2>Buscando: <?php echo $this->busqueda; ?></h2>
    
    <?php  echo comprobarResultadosBusqueda(count($this->productos)); ?>
    <div class="grid-container productos">

        <?php foreach ($this->productos as $producto) {?>
        <a href="<?php echo URL.'articulo?id='. $producto['id'] ?>" class="producto">
            <img src="<?php echo URL.'public/img/img_productos/'.$producto['img_producto'] ?>" alt="<?php echo $producto['nombre_producto'] ?>">
            <p><?php echo $producto['nombre_producto'] ?></p>
            <p class="precio">$<?php echo $producto['precio'] ?></p>
        </a>
        <!--./producto-->
        <?php  } //foreach?>

    </div>
    
</main>
<?php require 'views/footer.php';?>