<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Alertum Edit</h3>
            </div>
			<?php echo form_open('alertum/edit/'.$alertum['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_id" class="control-label"><span class="text-danger">*</span>Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['id'] == $alertum['usuario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['id'].'" '.$selected.'>'.$usuario['usuario'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('usuario_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_alerta_id" class="control-label"><span class="text-danger">*</span>Tipo Alertum</label>
						<div class="form-group">
							<select name="tipo_alerta_id" class="form-control">
								<option value="">select tipo_alertum</option>
								<?php 
								foreach($all_tipo_alerta as $tipo_alertum)
								{
									$selected = ($tipo_alertum['id'] == $alertum['tipo_alerta_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_alertum['id'].'" '.$selected.'>'.$tipo_alertum['nombre'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tipo_alerta_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensaje" class="control-label"><span class="text-danger">*</span>Mensaje</label>
						<div class="form-group">
							<input type="text" name="mensaje" value="<?php echo ($this->input->post('mensaje') ? $this->input->post('mensaje') : $alertum['mensaje']); ?>" class="form-control" id="mensaje" />
							<span class="text-danger"><?php echo form_error('mensaje');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha" class="control-label"><span class="text-danger">*</span>Fecha</label>
						<div class="form-group">
							<input type="text" name="fecha" value="<?php echo ($this->input->post('fecha') ? $this->input->post('fecha') : $alertum['fecha']); ?>" class="has-datetimepicker form-control" id="fecha" />
							<span class="text-danger"><?php echo form_error('fecha');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="estado" value="<?php echo ($this->input->post('estado') ? $this->input->post('estado') : $alertum['estado']); ?>" class="form-control" id="estado" />
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