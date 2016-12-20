<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<h3><?php echo $artist->name; ?> - modifica</h3>
			<?php 
				$attr = array('id' => 'form_updateartist');
				echo form_open('artists/'.$artist->url_name, $attr);
				echo form_hidden('id', $artist->id);
			?>
			<div class="form-group">
				<label for="name">Nome</label>
				 <?php
					$data = array(
							'name'          => 'name',
							'id'            => 'name',
							'class'			=> 'form-control',
							'value'			=> $artist->name
					);
					echo form_input($data);		
					echo form_error('name');		
				?>
			</div>
			<div class="form-group">
				<label for="url_name">URL</label>
				 <?php
					$data = array(
							'name'          => 'url_name',
							'id'            => 'url_name',
							'class'			=> 'form-control',
							'value'			=> $artist->url_name
					);
					echo form_input($data);		
					echo form_error('url_name');		
				?>
			</div>
			<span class="label label-default">Creato il</span> <?php echo $artist->created_at; ?>&nbsp;&nbsp;&nbsp;
			<span class="label label-default">Ultima modifica</span> <?php echo $artist->modified_at; ?><br /><br />
			
			<?php
				$data = array(
						'type'          => 'submit',
						'content'       => '<i class="fa fa-floppy-o" aria-hidden="true"></i> AGGIORNA',
						'class'			=> 'btn btn-primary'
				);
				echo form_button($data);				
				echo form_close();
			?>
			<br /><br />
			<a href="<?php echo site_url('artists'); ?>">
				<?php
					$data = array(
							'type'          => 'button',
							'content'       => '<i class="fa fa-reply" aria-hidden="true"></i> ELENCO ARTISTI',
							'class'			=> 'btn btn-default btn-xs'
					);
					echo form_button($data);	
				?>	
			</a>
		</div>
	</div>
</div>