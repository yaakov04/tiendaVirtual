<?php require 'views/header.php';?>
<main class="contenedor pagina-categorias">
        <h2>Categorias</h2>
        <a href="<?php echo URL.'todosProductos?pagina=1'; ?>">Ver todos los productos</a>
        <div class="grid-container categorias">

<?php while($categorias=$this->categorias->fetch_assoc()){ ?>

            <a href="<?php echo URL .'categorias/mostrar/'. $categorias['nombre_categoria']?>" class="categoria">
            <?php echo $categorias['categoria'] ?>
            </a>
             <!--Categoria-->
             <?php }?>
            
        </div>
        <!--Categorias-->
        

    </main>

<?php require 'views/footer.php';?>