<?php require 'views/header.php';?>
<main class="contenedor pagina-detalles-pedido">
        <h2>Detalles del pedido</h2>
        <div class="detalles-contenedor contenedor-flex">
            <div class="detalles">
                <p><span class="text-strong">Fecha de compra:</span> 11 de octubre de 2020</p>
                <p><span class="text-strong">Numero de pedido:</span> 123456789</p>
                <p><span class="text-strong">ID de compra:</span> 123456789</p>
                <h3><span class="text-strong">Direccion de envio</span></h3>
                <p><span class="text-strong">Destinatario:</span> Jacob de Canterbury</p>
                <p><span class="text-strong">Direccion:</span> Baker street 221-B, Marylebone, London.</p>
                <p><span class="text-strong">cp:</span> 1200</p>
                <p><span class="text-strong">Llega:</span> 21 de Dicimebre del 2020</p>
            </div>
            <div class="total">
                <h3>Resumen de la compra</h3>
                <table class="table-detalles">
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

        </div>
        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto">
                <div class="encabezado contenedor-flex detalles-encabezado">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>
                        <p class="text-strong ">Estado actual del pedido:</p>
                        <p>Enviado</p>
                    </div>

                </div>
                <div class="estados contenedor-flex">

                    <div class="estado completo">
                        <p>Procesando envio</p>
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="estado completo">
                        <p>Enviado</p>
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="estado">
                        <p>Entregado</p>
                        <i class="fas fa-check-square"></i>
                    </div>

                </div>
            </div>
        </div>
        <!--./producto-->

        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto">
                <div class="encabezado contenedor-flex detalles-encabezado">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>
                        <p class="text-strong ">Estado actual del pedido:</p>
                        <p>Procesando envio</p>
                    </div>

                </div>
                <div class="estados contenedor-flex">

                    <div class="estado completo">
                        <p>Procesando envio</p>
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="estado ">
                        <p>Enviado</p>
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="estado">
                        <p>Entregado</p>
                        <i class="fas fa-check-square"></i>
                    </div>

                </div>
            </div>
        </div>
        <!--./producto-->

        <div class="producto contenedor-flex">
            <div class="img"><img src="img/joystick.jpg" alt="joystick"></div>
            <div class="detalles-producto">
                <div class="encabezado contenedor-flex detalles-encabezado">
                    <div class="contenedor-txt">
                        <h3>Joystick</h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x1</p>
                        <p class="text-strong ">Estado actual del pedido:</p>
                        <p>Procesando envio</p>
                    </div>

                </div>
                <div class="estados contenedor-flex">

                    <div class="estado completo">
                        <p>Procesando envio</p>
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="estado ">
                        <p>Enviado</p>
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="estado">
                        <p>Entregado</p>
                        <i class="fas fa-check-square"></i>
                    </div>

                </div>
            </div>
        </div>
        <!--./producto-->


    </main>
<?php require 'views/footer.php';?>