<?php require 'views/header.php';?>
<main class="contenedor pagina-wishlist">
        <h2>Wish list</h2>
        <div class="lista-productos">
           
        <?php   
        echo checkWishlistItems();
        foreach ($_SESSION['wishlist'] as $producto) {?>
    
            <div class="producto contenedor-flex">
                <div class="img"><img src="<?php echo URL.'public/img/'.$producto['img'] ?>" alt="joystick"></div>
                <div class="detalles-producto">
                    <div class="encabezado contenedor-flex">
                        <div class="contenedor-txt">
                            <h3><?php echo $producto['nombre'] ?></h3>
                            <p>X<?php echo $producto['cantidad'] ?></p>
                        </div>
                        <div class="contenedor-txt precio-wishlist contenedor-flex">
                            <p class="precio">$<?php echo $producto['precio'] ?></p>
                        </div>

                    </div>
                    <div class="acciones contenedor-flex">
                        <div class="contenedor-flex">
                            <a href="#" data-accion="eliminar-wishlist" data-id-articulo="<?php echo $producto['id'] ?>" >Eliminar</a>
                            <a href="#" data-accion="mover-carrito" data-id-articulo="<?php echo $producto['id'] ?>">Mover al carrito</a>
                        </div>
                        

                    </div>
                </div>
            </div>
            <!--./producto-->

       <?php }//foreach?>

        </div>
        <!--./lista-productos-->

    </main>
<?php require 'views/footer.php';?>