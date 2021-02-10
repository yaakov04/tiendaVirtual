<?php require 'views/header.php';
$datos_envio=$this->datos_envio;
$articulos_pagar = $this->articulos_pagar;
?>

<main class="contenedor pagina-checkout pagina-detalles-pedido">
        <h2>Detalles de compra</h2>
        <div class="detalles-contenedor-checkout contenedor-flex">
            <form class="form-checkout" action="">
                <fieldset>
                    <legend id="confirma_direccion">Confirma la direccion de envio</legend>
                    <div class="row">
                        <div class="input">
                            <label for="destinatario">Destinatario:</label>
                            <input type="text" name="destinatario" id="destinatario" value="<?php echo $datos_envio['nombre'].' '.$datos_envio['apellido'] ;?>">
                        </div>

                    </div>


                    <div class="row">
                        <div class="input">
                            <label for="calle">Calle:</label>
                            <input type="text" name="calle" id="calle" value="<?php echo $datos_envio['calle'] ;?>">
                        </div>

                        <div class="input">
                            <label for="numero">Numero:</label>
                            <input class="w-35" type="text" name="numero" id="numero" value="<?php echo $datos_envio['numero'] ;?>">
                        </div>


                    </div>
                    <div class="row">
                        <div class="input">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" name="ciudad" id="ciudad" value="<?php echo $datos_envio['ciudad'] ;?>">
                        </div>

                        <div class="input">
                            <label for="pais">Pais:</label>
                            <input type="text" name="pais" id="pais" value="<?php echo $datos_envio['pais'] ;?>">
                        </div>

                    </div>

                    <div class="row">
                        <div class="input">
                            <label for="cp">C.P:</label>
                            <input class="w-35" type="text" name="cp" id="cp" value="<?php echo $datos_envio['cp'] ;?>">
                        </div>
                    </div>

                </fieldset>
                <div class="contenedor-btn btn-checkout"><a id="confirmar" class="btn" href="#resumen-compra">Confirmar</a></div>
            </form>


        </div>
        <div class="lista-productos">
        <?php foreach ($articulos_pagar as $producto) {?>
            <div class="producto contenedor-flex">
                <div class="img"><img src="<?php echo URL.'public/img/img_productos/'.$producto['img'] ?>" alt="<?php echo $producto['nombre'] ?>"></div>
                <div class="detalles-producto detalles-producto-checkout">
                    <div class="encabezado contenedor-flex detalles-encabezado encabezado-checkout">
                        <div class="contenedor-txt">
                            <h3><?php echo $producto['nombre'] ?></h3>
                        </div>
                        <div class="contenedor-txt">
                            <p class="text-strong ">X<?php echo $producto['cantidad'] ?></p>
                            <input type="hidden" data-id-articulo="<?php echo $producto['id'] ?>" name="precio" value="<?php echo $producto['precio'] ?>">
                        </div>

                    </div>

                </div>
            </div>
            <!--./producto-->
        <?php }//foreach?>
       
        </div><!--./lista-productos-->



    </main>

    <div class="resumen-contenedor" id="resumen-compra">
        <div class="contenedor resumen">
            <div class="total">
                <table>
                    <tr>
                        <td>Sub-total:</td>
                        <td class="text-left">$ <span id="sub-total">0.00</span></td>
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
                <button id="btn-pagar-checkout" data-accion="<?php echo comprobarPagarCarritoOItem($_GET['accion']) ?>" class="btn">Pagar</button>
            </div>
        </div>
    </div>

<?php require 'views/footer.php';?>