<?php require 'views/header.php';?>
    <div class="hero">
        <a href="#" class="contenedor contenedor-flex">
            <p>Ofertas del día</p>
            <div class="img"><img src="<?php echo URL; ?>public/img/bolsas-hero.png" alt=""></div>

        </a>
    </div>
    <!--./hero-->


    <main>
        <section class="contenedor">
            <h2>Novedades</h2>
            <div class="productos contenedor-flex">
            <?php
            while($novedades=$this->novedades->fetch_assoc()){?>
            
                <a href="<?php echo URL; ?>articulo?id=<?php echo $novedades['id'] ?>" class="producto">
                    <img src="<?php echo URL; ?>public/img/img_productos/<?php echo $novedades['img_producto'] ?>" alt="<?php echo $novedades['nombre_producto'] ?>">
                    <p><?php echo $novedades['nombre_producto'] ?></p>
                    <p class="precio">$<?php echo $novedades['precio'] ?></p>
                </a>
                <!--./producto-->
            <?php }//endwhile ?>


                
            </div>
            <!--./productos-->
            <div class="contenedor-btn"><a class="btn" href="#">Ver más</a></div>
        </section>
        <section class="contenedor">
            <h2>Más vendidos</h2>
            <div class="productos contenedor-flex">
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/reloj.png" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/soporte_pendientes.png" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/joystick.jpg" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/collar_plata.png" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
            </div>
            <!--./productos-->
            <div class="contenedor-btn"><a class="btn" href="#">Ver más</a></div>
        </section>
        <section class="contenedor">
            <h2>Ofertas</h2>
            <div class="productos contenedor-flex">
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/vestido_negro.png" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/soporte_pendientes.png" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/reloj.png" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
                <a href="producto.html" class="producto">
                    <img src="<?php echo URL; ?>public/img/mochila.jpg" alt="playera">
                    <p>Playera</p>
                    <p class="precio">$100.00</p>
                </a>
                <!--./producto-->
            </div>
            <!--./productos-->
            <div class="contenedor-btn"><a class="btn" href="#">Ver más</a></div>
        </section>
    </main>
<?php require 'views/footer.php';?>