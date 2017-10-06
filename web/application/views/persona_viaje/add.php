<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar persona viaje</h3>
            </div>
            <?php echo form_open('persona_viaje/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="persona_id" class="control-label"><span class="text-danger">*</span>Persona</label>
						<div class="form-group">
							<select name="persona_id" class="form-control">
								<option value="">Seleccione persona</option>
								<?php
								foreach($all_persona as $persona)
								{
									$selected = ($persona['id'] == $this->input->post('persona_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$persona['id'].'" '.$selected.'>'.$persona['nombres'].' '.$persona['apellido_paterno'].' '.$persona['apellido_materno'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('persona_id');?></span>
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
						<label for="transporte_unidad_id" class="control-label"><span class="text-danger">*</span>Transporte Unidad</label>
						<div class="form-group">
							<select name="transporte_unidad_id" class="form-control">
								<option value="">Seleccione transporte unidad</option>
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
						<label for="persona_perfil_id" class="control-label"><span class="text-danger">*</span>Persona Perfil</label>
						<div class="form-group">
							<select name="persona_perfil_id" class="form-control">
								<option value="">Selecione persona perfil</option>
								<?php
								foreach($all_persona_perfil as $persona_perfil)
								{
									$selected = ($persona_perfil['id'] == $this->input->post('persona_perfil_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$persona_perfil['id'].'" '.$selected.'>'.$persona_perfil['nombre'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('persona_perfil_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="precio" class="control-label"><span class="text-danger">*</span>Precio</label>
						<div class="form-group">
							<input type="text" name="precio" value="<?php echo $this->input->post('precio'); ?>" class="form-control" id="precio" />
							<span class="text-danger"><?php echo form_error('precio');?></span>
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
