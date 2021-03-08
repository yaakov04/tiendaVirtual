<?php require 'views/header.php';
        $detallesVenta=$this->detallesVenta;
?>
<main class="contenedor pagina-detalles-pedido">
        <h2>Detalles de la venta</h2>
        <div class="detalles-contenedor contenedor-flex">
            <div class="detalles">
                <p><span class="text-strong">Fecha de compra:</span> <?php echo $detallesVenta['fecha'] ?></p>
                <p><span class="text-strong">Numero de venta:</span> <?php echo $detallesVenta['venta_id'] ?></p>
                <p><span class="text-strong">Estatus de la venta:</span> <?php echo $detallesVenta['estatus'] ?></p>
                <h3><span class="text-strong">Direccion de envio</span></h3>
                <p><span class="text-strong">Destinatario:</span> <?php echo $detallesVenta['destinatario'] ?></p>
                <p><span class="text-strong">Direccion:</span> <?php echo $detallesVenta['direccion'] ?></p>
                
            </div>
            <div class="total">
                <h3>Resumen de la compra</h3>
                <table class="table-detalles">
                    <tr>
                        <td>Sub-total:</td>
                        <td  class="text-left">$ <span id="sub-total">0.00</span></td>
                    </tr>
                    <tr>
                        <td>Envio:</td>
                        <td  class="text-left">$ <span id="envio">0.00</span></td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td class="text-left">$ <span id="total">0.00</span></td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="contenedor-flex flex-align-items flex-column detallesProducto-productos">

        <?php foreach ($detallesVenta['pedidos']as $pedido) { ?>
            
            <div class="producto contenedor-flex width-700 detallesProducto-producto">
                <div class="img"><img src="<?php echo URL.'public/img/img_productos/'. $pedido['img_producto'] ?>" alt="joystick"></div>
                <div class="detalles-producto">
                    <div class="encabezado contenedor-flex detalles-encabezado">
                        <div class="contenedor-txt">
                            <h3><?php echo $pedido['nombre_producto'] ?></h3>
                        </div>
                        <div class="contenedor-txt">
                        <p class="text-strong ">Numero de pedido:<?php echo $pedido['pedido_id'] ?></p>
                            <p class="text-strong ">x<?php echo $pedido['cantidad_producto'] ?></p>
                            <input type="hidden" name="cantidad_producto" class="cantidad_producto" value="<?php echo $pedido['cantidad_producto'] ?>">
                            <input type="hidden" name="precio_producto" class="precio_producto" value="<?php echo $pedido['precio_producto'] ?>">
                        </div>

                    </div>
                
                </div>
            </div>
            <!--./producto-->
        <?php }//foreach?>
           
        </div>

    </main>
<?php require 'views/footer.php';?>