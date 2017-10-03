<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Paradero Edit</h3>
            </div>
			<?php echo form_open('paradero/edit/'.$paradero['id']); ?>
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
									$selected = ($tipo_transporte['id'] == $paradero['tipo_transporte_id']) ? ' selected="selected"' : "";

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
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $paradero['nombre']); ?>" class="form-control" id="nombre" />
							<span class="text-danger"><?php echo form_error('nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="direccion" class="control-label"><span class="text-danger">*</span>Direccion</label>
						<div class="form-group">
							<input type="text" name="direccion" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $paradero['direccion']); ?>" class="form-control" id="direccion" />
							<span class="text-danger"><?php echo form_error('direccion');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="latitud" class="control-label"><span class="text-danger">*</span>Latitud</label>
						<div class="form-group">
							<input type="text" name="latitud" value="<?php echo ($this->input->post('latitud') ? $this->input->post('latitud') : $paradero['latitud']); ?>" class="form-control" id="latitud" />
							<span class="text-danger"><?php echo form_error('latitud');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="longitud" class="control-label"><span class="text-danger">*</span>Longitud</label>
						<div class="form-group">
							<input type="text" name="longitud" value="<?php echo ($this->input->post('longitud') ? $this->input->post('longitud') : $paradero['longitud']); ?>" class="form-control" id="longitud" />
							<span class="text-danger"><?php echo form_error('longitud');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="estado" value="<?php echo ($this->input->post('estado') ? $this->input->post('estado') : $paradero['estado']); ?>" class="form-control" id="estado" />
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