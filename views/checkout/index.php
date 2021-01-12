<?php require 'views/header.php';?>

<main class="contenedor pagina-checkout pagina-detalles-pedido">
        <h2>Detalles de compra</h2>
        <div class="detalles-contenedor-checkout contenedor-flex">
            <form class="form-checkout" action="">
                <fieldset>
                    <legend id="confirma_direccion">Confirma la direccion de envio</legend>
                    <div class="row">
                        <div class="input">
                            <label for="destinatario">Destinatario:</label>
                            <input type="text" name="destinatario" id="destinatario" value="Jacob de Canterbury">
                        </div>

                    </div>


                    <div class="row">
                        <div class="input">
                            <label for="calle">Calle:</label>
                            <input type="text" name="calle" id="calle" value="BAKER STREET">
                        </div>

                        <div class="input">
                            <label for="numero">Numero:</label>
                            <input class="w-35" type="text" name="numero" id="numero" value="221-B">
                        </div>


                    </div>
                    <div class="row">
                        <div class="input">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" name="ciudad" id="ciudad" value="LONDON">
                        </div>

                        <div class="input">
                            <label for="pais">Pais:</label>
                            <input type="text" name="pais" id="pais" value="Inglaterra">
                        </div>

                    </div>

                    <div class="row">
                        <div class="input">
                            <label for="cp">C.P:</label>
                            <input class="w-35" type="text" name="cp" id="cp" value="1200">
                        </div>
                    </div>

                </fieldset>
                <div class="contenedor-btn btn-checkout"><a class="btn" href="#resumen-compra">Confirmar</a></div>
            </form>


        </div>
        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto detalles-producto-checkout">
                <div class="encabezado contenedor-flex detalles-encabezado encabezado-checkout">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>

                    </div>

                </div>

            </div>
        </div>
        <!--./producto-->
        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto detalles-producto-checkout">
                <div class="encabezado contenedor-flex detalles-encabezado encabezado-checkout">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>

                    </div>

                </div>

            </div>
        </div>
        <!--./producto-->
        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto detalles-producto-checkout">
                <div class="encabezado contenedor-flex detalles-encabezado encabezado-checkout">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>

                    </div>

                </div>

            </div>
        </div>
        <!--./producto-->
        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto detalles-producto-checkout">
                <div class="encabezado contenedor-flex detalles-encabezado encabezado-checkout">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>

                    </div>

                </div>

            </div>
        </div>
        <!--./producto-->
        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto detalles-producto-checkout">
                <div class="encabezado contenedor-flex detalles-encabezado encabezado-checkout">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>

                    </div>

                </div>

            </div>
        </div>
        <!--./producto-->



    </main>

    <div class="resumen-contenedor" id="resumen-compra">
        <div class="contenedor resumen">
            <div class="total">
                <table>
                    <tr>
                        <td>Sub-total:</td>
                        <td class="text-left">$ 300.00</td>
                    </tr>
                    <tr>
                        <td>Envio:</td>
                        <td class="text-left">$ 0.00</td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td class="text-left">$ 300.00</td>
                    </tr>
                </table>
            </div>
            <div class="pagar-btn-container">
                <button class="btn">Pagar</button>
            </div>
        </div>
    </div>

<?php require 'views/footer.php';?>