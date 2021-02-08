<?php require 'views/header.php';?>
<main class="contenedor pagina-detalles-pedido">
        <h2>Pedidos</h2>

        <?php while ($pedido=$this->pedidos->fetch_assoc()) { ?>
        <div class="producto contenedor-flex">
            <div class="img"><img src="<?php echo URL.'public/img/img_productos/'.$pedido['img_producto'] ?>" alt="joystick"></div>
            <div class="detalles-producto">
                <div class="encabezado contenedor-flex detalles-encabezado">
                    <div class="contenedor-txt">
                        <h3><?php echo $pedido['nombre_producto'] ?></h3>
                    </div>
                    <div class="contenedor-txt">
                        <p class="text-strong ">x<?php echo $pedido['cantidad'] ?></p>
                        <p class="text-strong ">Estado actual del pedido:</p>
                        <p><?php echo $pedido['estado'] ?></p>
                    </div>

                </div>
                <div class="estados contenedor-flex">

                    <div class="estado <?php echo comprobarEstado($pedido['id_estado'],3) ?>">
                        <p>Procesando envio</p>
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="estado <?php echo comprobarEstado($pedido['id_estado'],4) ?>">
                        <p>Enviado</p>
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="estado <?php echo comprobarEstado($pedido['id_estado'],5) ?>">
                        <p>Entregado</p>
                        <i class="fas fa-check-square"></i>
                    </div>

                </div>
            </div>
        </div>
        <!--./producto-->
        <?php }//while ?>
       


    </main>

<?php require 'views/footer.php';?>