<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row">
		<div class="col-md-8 table-responsive">
			<h3>Elenco artisti</h3>	
			<table class="table table-condensed table-hover">
				<thead>
						<tr>
								<th>Nome</th>
								<th>Creato il</th>
								<th>Ultima modifica</th>
								<th></th>
						</tr>
				</thead>
				<tbody>
						<?php foreach($artists as $artist) : ?>
						<tr>
								<td><?php echo $artist->name; ?></td>                      
								<td><?php echo $artist->created_at; ?></td>                      
								<td><?php echo $artist->modified_at; ?></td>  
								<td><a href="<?php echo site_url('artists/'.url_title($artist->name)); ?>">
									<?php
										$data = array(
												'type'          => 'button',
												'content'       => '<i class="fa fa-search" aria-hidden="true"></i> DETTAGLI',
												'class'			=> 'btn btn-info btn-xs'
										);
										echo form_button($data);	
									?>	
									</a>									
									<a href="<?php echo site_url('artists/delete/'.$artist->id); ?>">
									<?php
										$data = array(
												'type'          => 'button',
												'content'       => '<i class="fa fa-trash-o" aria-hidden="true"></i> CANCELLA',
												'class'			=> 'btn btn-danger btn-xs'
										);
										echo form_button($data);	
									?>	
									</a>									
								</td>                    
						</tr>
						<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<h3>Nuovo artista</h3>
			<?php 
				$attr = array('id' => 'form_createartist');
				echo form_open('artists', $attr);
			?>
			<div class="form-group">
				<label for="name">Nome</label>
				<?php
					$data = array(
							'name'          => 'name',
							'id'            => 'name',
							'class'			=> 'form-control',
							'placeholder'	=> 'Digita il nome artista qui'
					);
					echo form_input($data);				
				?>
			</div>
			<?php
				$data = array(
						'type'          => 'submit',
						'content'       => '<i class="fa fa-floppy-o" aria-hidden="true"></i> SALVA',
						'class'			=> 'btn btn-primary'
				);
				echo form_button($data);				
				echo form_close();
				echo form_error('name');
			?>
		</div>
	</div>
</div>