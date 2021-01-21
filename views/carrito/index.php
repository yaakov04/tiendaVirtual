<?php require 'views/header.php';
var_dump($_SESSION['wishlist']);
?>
<main class="contenedor pagina-wishlist">
        <h2>Carrito</h2>
        <div class="lista-productos">
<?php   
        echo checkCarritoItems();
        foreach ($_SESSION['carrito'] as $producto) {?>
    
            <div class="producto contenedor-flex">
                <div class="img"><img src="<?php echo URL.'public/img/'.$producto['img'] ?>" alt="joystick"></div>
                <div class="detalles-producto">
                    <div class="encabezado contenedor-flex">
                        <div class="contenedor-txt">
                            <h3><?php echo $producto['nombre'] ?></h3>
                            <p>X<?php echo $producto['cantidad'] ?></p>
                        </div>
                        <div class="contenedor-txt">
                            <p class="precio">$<?php echo $producto['precio'] ?></p>
                        </div>

                    </div>
                    <div class="acciones contenedor-flex">
                        <div class="contenedor-flex">
                            <a href="#" data-accion="eliminar" data-id-articulo="<?php echo $producto['id'] ?>" >Eliminar</a>
                            <a href="#" data-accion="mover-wishlist" data-id-articulo="<?php echo $producto['id'] ?>">Mover al whislist</a>
                        </div>
                        <div class="acciones-button">
                            <button class="btn">Comprar</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--./producto-->

       <?php }//foreach?>

            

        </div>
        <!--./lista-productos-->

    </main>

    <div class="resumen-contenedor">
        <div class="contenedor resumen">
            <div class="total">
                <table>
                    <tr>
                        <td>Sub-total:</td>
                        <td  class="text-left">$ <span id="sub-total">0.00</span></td>
                    </tr>
                    <tr>
                        <td>Envio:</td>
                        <td class="text-left">$ <span id="envio">0.00</span></td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td class="text-left">$ <span id="total">0.00</span></td>
                    </tr>
                </table>
            </div>
            <div class="pagar-btn-container">
                <button class="btn">Pagar</button>
            </div>
        </div>
    </div>
<?php require 'views/footer.php';?>