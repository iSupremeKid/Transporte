<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar persona</h3>
            </div>
			<?php echo form_open('persona/edit/'.$persona['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
          <div class="col-md-6">
						<label for="nombres" class="control-label"><span class="text-danger">*</span>Nombres</label>
						<div class="form-group">
							<input type="text" name="nombres" value="<?php echo ($this->input->post('nombres') ? $this->input->post('nombres') : $persona['nombres']); ?>" class="form-control" id="nombres" />
							<span class="text-danger"><?php echo form_error('nombres');?></span>
						</div>
					</div>
          <div class="col-md-6">
						<label for="apellido_paterno" class="control-label"><span class="text-danger">*</span>Apellido Paterno</label>
						<div class="form-group">
							<input type="text" name="apellido_paterno" value="<?php echo ($this->input->post('apellido_paterno') ? $this->input->post('apellido_paterno') : $persona['apellido_paterno']); ?>" class="form-control" id="apellido_paterno" />
							<span class="text-danger"><?php echo form_error('apellido_paterno');?></span>
						</div>
					</div>
          <div class="col-md-6">
						<label for="apellido_materno" class="control-label">Apellido Materno</label>
						<div class="form-group">
							<input type="text" name="apellido_materno" value="<?php echo ($this->input->post('apellido_materno') ? $this->input->post('apellido_materno') : $persona['apellido_materno']); ?>" class="form-control" id="apellido_materno" />
							<span class="text-danger"><?php echo form_error('apellido_materno');?></span>
						</div>
					</div>
          <div class="col-md-6">
						<label for="telefono" class="control-label"><span class="text-danger">*</span>Teléfono</label>
						<div class="form-group">
							<input type="text" name="telefono" value="<?php echo ($this->input->post('telefono') ? $this->input->post('telefono') : $persona['telefono']); ?>" class="form-control" id="telefono" />
              <span class="text-danger"><?php echo form_error('telefono');?></span>
						</div>
					</div>
          <div class="col-md-6">
						<label for="identificacion" class="control-label"><span class="text-danger">*</span>Identificacion</label>
						<div class="form-group">
							<input type="text" name="identificacion" value="<?php echo ($this->input->post('identificacion') ? $this->input->post('identificacion') : $persona['identificacion']); ?>" class="form-control" id="identificacion" />
							<span class="text-danger"><?php echo form_error('identificacion');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="persona_perfil_id" class="control-label"><span class="text-danger">*</span>Persona Perfil</label>
						<div class="form-group">
							<select name="persona_perfil_id" class="form-control">
								<option value="">Seleccione persona perfil</option>
								<?php
								foreach($all_persona_perfil as $persona_perfil)
								{
									$selected = ($persona_perfil['id'] == $persona['persona_perfil_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$persona_perfil['id'].'" '.$selected.'>'.$persona_perfil['nombre'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('persona_perfil_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="saldo_disponible" class="control-label"><span class="text-danger">*</span>Saldo Disponible</label>
						<div class="form-group">
							<input type="text" name="saldo_disponible" value="<?php echo ($this->input->post('saldo_disponible') ? $this->input->post('saldo_disponible') : $persona['saldo_disponible']); ?>" class="form-control" id="saldo_disponible" />
							<span class="text-danger"><?php echo form_error('saldo_disponible');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="token_culqi" class="control-label">Token Culqi</label>
						<div class="form-group">
							<input type="text" name="token_culqi" value="<?php echo ($this->input->post('token_culqi') ? $this->input->post('token_culqi') : $persona['token_culqi']); ?>" class="form-control" id="token_culqi" />
							<span class="text-danger"><?php echo form_error('token_culqi');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Editar
				</button>
	        </div>
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
