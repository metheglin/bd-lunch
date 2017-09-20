<li role="presentation" class="dropdown">
	<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
		<i class="fa fa-envelope-o"></i>
		<span class="badge bg-green"><?php echo $newMediaRequstCount; ?></span>
	</a>
	<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
		<?php foreach ($newMedias as $key => $value): ?>
		<li>
			<a href="<?php echo $this->Url->build(['controller'=>'MediaRequests','action'=>'approveMediarequest',$value->id]); ?>">
				<span class="image"><?php echo $this->Html->image('aw.png')?></span>
				<span>
					<span><?php echo $value->display_name; ?></span>
					<span class="time"><?php echo $value->created; ?></span>
				</span>
				<span class="message">
					<?php echo $value->media_scope_desc; ?>
				</span>
			</a>
		</li>
		<?php endforeach ?>

		<!-- <li>
			<div class="text-center">
				<a>
					<strong>See All Alerts</strong>
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</li> -->
	</ul>
</li>