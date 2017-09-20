
<?php //if (isset($tasks[$type]) && !empty($tasks[$type])): ?>
	<?php //foreach ($tasks[$type] as $key => $value): ?>
	<?php foreach ($tasks as $key => $value): ?>
		<div 
			class="card  
				<?php echo ($value->isInProgress()) ? 'updateable' : '' ?> 
			" 
			data-id="<?php echo $value->id; ?>" 
			data-currentstatus="<?php echo $value->state; ?>">
			<div class="card-header">
				<h4><?php echo $value->title(); ?></h4>
			</div>
			<div class="card-content">
				<?php if ( $value->backlog_progress_url ): ?>
					<p>
						<a href="<?php echo $value->backlog_progress_url; ?>" target="_blank">
							<?php echo $value->backlog_progress_url; ?>
						</a>
					</p>
				<?php endif; ?>

				<br/>
				<!--
				<?php if (($value->state == 1) && !empty($value->dependencies)): ?>
					<div>Dependencies : <span class="bg-green"><?php echo $value->dependencies ?></span></div>
				<?php endif ?>
				-->
				<?php
					if ( !$value->type()->isWorkable() ):
				?>
					<div>Reason Why NOT Workable: <br>
						<?php echo join(",", 
							array_map(function($x){ return '<span class="bg-green">' . $x['data_column'] . '</span>'; }, 
								$value->type()->incompleteDepends()
							)
						); ?> is Empty
					</div>
				<?php endif; ?>
				
				<hr/>
				<div class="row">
					<div class="cstatus col-md-6">
						<?php
							$colorMap = [
								"Pending" => "btn-primary",
								"Workable" => "btn-info",
								"inProgress" => "btn-warning",
								"Completed" => "btn-success",
								"Finished" => "btn-success",
							]
						?>
						<button class="btn btn-sm <?php echo $colorMap[$value->currentState()]; ?>">
							<?php echo $value->currentState(); ?>
						</button>
						<!--
						<?php if ($value->state == 1): ?>
							<button class="btn btn-sm btn-primary">Pending</button>
						<?php elseif ($value->state == 2): ?>
							<button class="btn btn-sm btn-info">Workable</button>
						<?php elseif ($value->state == 3): ?>
							<button class="btn btn-sm btn-warning">Progress</button>
						<?php elseif ($value->state == 4): ?>
							<button class="btn btn-sm btn-success">Completed</button>
						<?php else: ?>
							<button class="btn btn-sm btn-default">Default</button>
						<?php endif ?>
						-->
					</div>
					<div class="text-right col-md-6">
					<?php //if ($value->state == 2): ?>
					<?php if ($value->isWorkable()): ?>
						<?= $this->Html->link(__('<i class="fa fa-angle-right"></i> Execute'), ['action' => 'executeTasks',$value->id], ['class'=>'btn btn-danger btn-sm execute','escape'=>false]) ?>
					<?php endif ?>
					</div>
				</div>
					
			</div>

		</div>
	<?php endforeach ?>
<?php //endif ?>
