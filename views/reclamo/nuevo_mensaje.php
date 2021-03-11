<?php require 'views/header.php';?>
<main style="min-height:46vh;" class="contenedor">

    <form action="" class="form-reclamo" >
        <fieldset>
            <legend><h2>Responder mensaje</h2></legend>
           
            <div class="input-group input-column">
                <label for="mensaje">Mensaje:</label>
                <textarea class="textarea-w-50" name="mensaje" id="mensaje" placeholder="Escriba su respuesta al mensaje"></textarea>
            </div>
            <input type="hidden" name="reclamos_id" value="<?php echo $this->datos['reclamos_id'] ?>">
                <input type="hidden" name="venta_id" value="<?php echo $this->datos['venta_id'] ?>">
                <input type="hidden" name="pedido_id" value="<?php echo $this->datos['pedido_id'] ?>">
                <input type="hidden" name="asunto" value="<?php echo $this->datos['asunto'].' - Re' ?>">
            <button id="btn-responder" class="btn input-group">Responder</button>
            <a href="<?php echo URL.'reclamo/ver/'.$this->datos['reclamos_id'] ?>">Cancelar</a>
        </fieldset>
        
    </form>


    
</main>
<?php require 'views/footer.php';?>