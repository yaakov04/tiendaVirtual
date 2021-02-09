<?php require 'views/header.php';?>
<main class="contenedor pagina-lista-pedidos">


    <h2>Todos los productos</h2>
    <div class="grid-container productos">

        <?php while($producto=$this->productos->fetch_assoc()){?>

        <a href="<?php echo URL.'articulo?id='. $producto['id'] ?>" class="producto">
            <img src="<?php echo URL.'public/img/img_productos/'.$producto['img_producto'] ?>" alt="<?php echo $producto['nombre_producto'] ?>">
            <p><?php echo $producto['nombre_producto'] ?></p>
            <p class="precio">$<?php echo $producto['precio'] ?></p>
        </a>
        <!--./producto-->

        <?php } //while?>

    </div>
    <div class="pagindor-contenedor">
        <?php echo paginadorSiguiente($_GET['pagina']-1,'todosProductos?pagina='); ?>
        <?php for ($i=1;$i<$this->nPaginas+1;$i++) {?>
            <a class="<?php echo paginadorActivo($i) ?>" href="<?php echo URL.'todosProductos?pagina='.$i ?>"><?php echo $i ?></a>
        <?php } //for?>
        <?php echo paginadorAnterior($this->nPaginas,$_GET['pagina']+1,'todosProductos?pagina='); ?>
    </div>
</main>
<?php require 'views/footer.php';?>