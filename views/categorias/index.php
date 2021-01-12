<?php require 'views/header.php';?>
<main class="contenedor pagina-categorias">
        <h2>Categorias</h2>
        <div class="grid-container categorias">

<?php while($categorias=$this->categorias->fetch_assoc()){ ?>

            <a href="#" class="categoria">
            <?php echo $categorias['categoria'] ?>
            </a>
             <!--Categoria-->
             <?php }?>
            
        </div>
        <!--Categorias-->
        

    </main>

<?php require 'views/footer.php';?>