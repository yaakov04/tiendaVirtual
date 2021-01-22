<?php require 'views/header.php';?>
<main class="contenedor pagina-lista-pedidos">
        <h2>Query</h2>
        <div class="grid-container productos">

        <?php while($producto=$this->categorias->fetch_assoc()){?>

            <a href="<?php echo URL.'articulo?id='. $producto['id'] ?>" class="producto">
                <img src="<?php echo URL.'public/img/'.$producto['img_producto'] ?>" alt="<?php echo $producto['nombre_producto'] ?>">
                <p><?php echo $producto['nombre_producto'] ?></p>
                <p class="precio">$<?php echo $producto['precio'] ?></p>
            </a>
            <!--./producto-->
          
       <?php } //foreach?>

        </div>

    </main>
<?php require 'views/footer.php';?>