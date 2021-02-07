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
            <?php while($novedades=$this->novedades->fetch_assoc()){?>
            
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
            <?php while($masVendidos=$this->masVendidos->fetch_assoc()){?>
                <a href="<?php echo URL; ?>articulo?id=<?php echo $masVendidos['id_producto'] ?>" class="producto">
                    <img src="<?php echo URL; ?>public/img/img_productos/<?php echo $masVendidos['img_producto'] ?>" alt="<?php echo $masVendidos['nombre_producto'] ?>">
                    <p><?php echo $masVendidos['nombre_producto'] ?></p>
                    <p class="precio">$<?php echo $masVendidos['precio'] ?></p>
                </a>
                <!--./producto-->
            <?php }//endwhile ?>    
            </div>
            <!--./productos-->
            <div class="contenedor-btn"><a class="btn" href="#">Ver más</a></div>
        </section>
        <section class="contenedor">
            <h2>Ofertas</h2>
            <div class="productos contenedor-flex">
            <?php while($oferta=$this->ofertas->fetch_assoc()){?>
                <a href="<?php echo URL; ?>articulo?id=<?php echo $oferta['id_producto'] ?>" class="producto">
                    <img src="<?php echo URL; ?>public/img/img_productos/<?php echo $oferta['img_producto'] ?>" alt="<?php echo $oferta['nombre_producto'] ?>">
                    <p><?php echo $oferta['nombre_producto'] ?></p>
                    <p class="precio">$<?php echo $oferta['precio'] ?></p>
                </a>
                <!--./producto-->
            <?php }//endwhile ?>  
               
            </div>
            <!--./productos-->
            <div class="contenedor-btn"><a class="btn" href="#">Ver más</a></div>
        </section>
    </main>
<?php require 'views/footer.php';?>