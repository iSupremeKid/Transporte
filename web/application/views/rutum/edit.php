<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Rutum Edit</h3>
            </div>
			<?php echo form_open('rutum/edit/'.$rutum['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipo_transporte_id" class="control-label"><span class="text-danger">*</span>Tipo Transporte</label>
						<div class="form-group">
							<select name="tipo_transporte_id" class="form-control">
								<option value="">select tipo_transporte</option>
								<?php 
								foreach($all_tipo_transporte as $tipo_transporte)
								{
									$selected = ($tipo_transporte['id'] == $rutum['tipo_transporte_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_transporte['id'].'" '.$selected.'>'.$tipo_transporte['nombre'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tipo_transporte_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $rutum['nombre']); ?>" class="form-control" id="nombre" />
							<span class="text-danger"><?php echo form_error('nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="estado" value="<?php echo ($this->input->post('estado') ? $this->input->post('estado') : $rutum['estado']); ?>" class="form-control" id="estado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ruta" class="control-label">Ruta</label>
						<div class="form-group">
							<textarea name="ruta" class="form-control" id="ruta"><?php echo ($this->input->post('ruta') ? $this->input->post('ruta') : $rutum['ruta']); ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>