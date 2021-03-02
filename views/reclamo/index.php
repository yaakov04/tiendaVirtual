<?php require 'views/header.php';?>
<main class="contenedor">
    <form action="" class="form-reclamo" >
        <fieldset>
            <legend><h2>Reclamo</h2></legend>
            <div class="input-group">
                <label for="asunto" class="form__label">Asunto:</label>
                <select name="Asunto" id="asunto" class="form__input form__input-width-all">
                    <option  value="" selected disabled>Seleccione el asunto</option>
                    <option  value="Devolución">Devolución</option>
                    <option  value="Cambio">Cambio</option>
                    <option  value="Garantía">Garantía</option>
                    <option  value="Entrega no completada">Aun no recibo mi producto</option>
                    <option  value="Otro">Otro</option>
                </select>
            </div>
            <div class="input-group input-column">
                <label for="mensaje">Mensaje:</label>
                <textarea class="textarea-w-50" name="mensaje" id="mensaje" placeholder="Escriba los detalles de su reclamo"></textarea>
            </div>
            <input type="hidden" name="id_venta" value="<?php echo $_GET['venta_id'] ?>">
            <input type="hidden" name="id_pedido" value="<?php echo $_GET['pedido_id'] ?>">
            <button id="btn-reclamo" class="btn input-group">Levantar reclamo</button>
        </fieldset>
        
    </form>
</main>
<?php require 'views/footer.php';?>