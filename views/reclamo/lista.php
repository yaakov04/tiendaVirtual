<?php require 'views/header.php';?>
<main class="contenedor">
<section>
    <h2>Reclamos</h2>
    <div class="contenedor-flex detalles-cuenta">
        <?php require 'views/cuenta/sidebar.php' ?>
        <table id="table_id" class="display lista_mensajes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>venta</th>
                        <th>pedido</th>
                        <th>Asunto</th>
                        <th>Resuelto</th>
                        <th>fecha</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($this->reclamos as $reclamo) { ?>
                    <tr style="text-align:center;">
                        <td><a style="color:blue" href="<?php echo URL.'reclamo/ver/'.$reclamo['reclamo'] ?>"><?php echo $reclamo['reclamo'] ?></a></td>
                        <td><?php echo $reclamo['id_venta'] ?></td>
                        <td><?php echo $reclamo['pedido'] ?></td>
                        <td><?php echo $reclamo['asunto'] ?></td>
                        <td><?php echo $reclamo['resuelto']?'Resuelto':'No resuelto' ?></td>
                        <td><?php echo $reclamo['fecha'] ?></td>
                    </tr>
                    <?php } ?>

                   

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>venta</th>
                        <th>pedido</th>
                        <th>Asunto</th>
                        <th>Resuelto</th>
                        <th>fecha</th>
                    </tr>
                </tfoot>
            </table>
    </div>
</section>
</main>
<?php require 'views/footer.php';?>