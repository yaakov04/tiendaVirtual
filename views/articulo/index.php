<?php require 'views/header.php';?>
<main class="contenedor pagina-producto">
<?php $articulo = $this->articulo->fetch_assoc();?>
        <section class="contenedor-flex">
            <div>
                <img src="<?php echo URL; ?>public/img/img_productos/<?php echo $articulo['img_producto'] ?>" alt="<?php echo $articulo['nombre_producto']; ?>">
                <div class="contenedor-btn">
                    <a href="#" id="<?php echo checkLoginComprarArticulo(); ?>" data-id-articulo="<?php echo $articulo['id']; ?>" class="btn">Comprar</a>
                    <div class="contenedor-flex">
                        <button id="<?php echo checkLoginAddCarrito(); ?>" data-id-articulo="<?php echo $articulo['id']; ?>" class="btn">Añadir al carrito</button>
                        <button id="<?php echo checkLoginAddWishlist(); ?>" class="btn">Añadir al wish list</button>
                    </div>
                </div>
            </div>
            <aside class="info-producto">
                <p class="stock">En stock: <span id="in_stock"><?php echo $articulo['stock']; ?></span></p>
                <h2><?php echo $articulo['nombre_producto']; ?></h2>
                <p class="precio">$ <?php echo $articulo['precio']; ?></p>
                <p class="envio">Envio: <br><span>Gratis</span></p>

                <p class="cantidad">Cantidad:</p>
                <div class="contenedor-input">

                    <div class="input-number contenedor-flex">
                        <button id="btn-input-number-menos" class="btn"><i class="fas fa-minus"></i></button>
                        <input readonly type="number" name="" id="number">
                        <button id="btn-input-number-mas" class="btn"><i class="fas fa-plus"></i></button>
                    </div>

                </div>

            </aside>
        </section>
        <section class="descripcion">
            <h2>Descripción del producto:</h2>
            <p><?php echo $articulo['descripcion_producto']; ?></p>
        </section>

    </main>
<?php require 'views/footer.php';?>