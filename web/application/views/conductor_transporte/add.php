<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar conductor transporte</h3>
            </div>
            <?php echo form_open('conductor_transporte/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="transporte_unidad_id" class="control-label"><span class="text-danger">*</span>Transporte Unidad</label>
						<div class="form-group">
							<select name="transporte_unidad_id" class="form-control">
								<option value="">Seleccione unidad de transporte</option>
								<?php
								foreach($all_transporte_unidad as $transporte_unidad)
								{
									$selected = ($transporte_unidad['id'] == $this->input->post('transporte_unidad_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$transporte_unidad['id'].'" '.$selected.'>'.$transporte_unidad['identificacion'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('transporte_unidad_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_id" class="control-label"><span class="text-danger">*</span>Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">Seleccione usuario</option>
								<?php
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['id'].'" '.$selected.'>'.$usuario['usuario'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('usuario_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="paradero_id" class="control-label"><span class="text-danger">*</span>Paradero</label>
						<div class="form-group">
							<select name="paradero_id" class="form-control">
								<option value="">Seleccione paradero</option>
								<?php
								foreach($all_paradero as $paradero)
								{
									$selected = ($paradero['id'] == $this->input->post('paradero_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$paradero['id'].'" '.$selected.'>'.$paradero['nombre'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('paradero_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo" class="control-label"><span class="text-danger">*</span>Tipo</label>
						<div class="form-group">
							<select name="tipo" class="form-control">
								<option value="">Seleccione tipo</option>
								<?php
								$tipo_values = array(
									'1'=>'Entrada',
									'2'=>'Salida',
								);

								foreach($tipo_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tipo')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tipo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha" class="control-label"><span class="text-danger">*</span>Fecha</label>
						<div class="form-group">
							<input type="text" data-date-format="YYYY-MM-DD hh:mm:ss" name="fecha" value="<?php echo $this->input->post('fecha'); ?>" class="has-datetimepicker form-control" id="fecha" />
							<span class="text-danger"><?php echo form_error('fecha');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Agregar
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
