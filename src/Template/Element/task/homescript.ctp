
<?= $this->Html->css(['/plugins/jquery-ui/jquery-ui','/plugins/select2/css/select2.min'],['block'=>true]); ?>
<?= $this->Html->script(['/plugins/jquery-ui/jquery-ui','/plugins/select2/js/select2.min'],['block'=>true]); ?>

<?php $this->start('scriptInline'); ?>
<script type="text/javascript">
    $("#media-request-id").select2();
    $("#media-request-id").change(function(event) {
    	event.preventDefault();
    	var requestId = $(this).val();
    	var URL = '<?php echo $this->Url->build(['controller'=>'Tasks','action'=>'home'],true) ?>/'+requestId;
    	window.location.href = URL

    });

    $(".draggable").draggable({ 
        revert: "invalid", 
        disabled: false
    });
    $(".droppable").droppable({
    	accept: ".draggable",
        helper:"clone",
    	classes: {
    		"ui-droppable-active": "ui-state-active",
    		"ui-droppable-hover": "ui-state-hover"
    	},
    	drop:function( event, ui ) {
            $(ui.draggable).detach().css({top: 0,left: 0}).appendTo(this);
    		var STATUS = $( this ).data('status');
    		var cardId = ui.draggable.data('id');
    		var currentStatus = ui.draggable.data('currentstatus');
    		if ((currentStatus != STATUS) && (STATUS > 0)) {
                if (STATUS < 4) { STATUS = 3; }
    			$.ajax({
	    			url: '<?php echo $this->Url->build(['controller'=>'Tasks','action'=>'changeStatus'],true) ?>/'+cardId+'/'+STATUS,
	    			type: "GET",
	    		})
	    		.done(function() {
	    			console.log("success");
	    			ui.draggable.data('currentstatus',STATUS);
                    window.location.href=window.location.href;
	    		})
    		}
    	}
    });
    $(".updateable").click(function(event) {
        var ID = $(this).data('id');
        var header = $(this).find('.card-header h4').html();
        $(".modal").attr('data-id', ID);
        $('.modal-title').html(header);
        $('#modal-id').modal('show');
        $(".msg").html('')

        $.ajax({
            url: '<?php echo $this->Url->build(['controller'=>'Tasks','action'=>'ajaxUpdate'],true) ?>/'+ID,
            type: "GET",
        })
        .done(function(res) {
            console.log("success");
            $(".modal-body").html(res);
        })
        console.log(ID);
    });

    $("body").on('click', '#save-data', function(event) {
        event.preventDefault();
        var ID = $(this).closest('.modal').data('id');
        var DATA = $(this).closest(".modal").find('form').serializeArray()
        console.log(DATA);
        $.ajax({
            url: '<?php echo $this->Url->build(['controller'=>'Tasks','action'=>'ajaxUpdateData'],true) ?>/'+ID+'.json',
            data: DATA,
            type: "POST",
        })
        .done(function(res) {
            console.log("success");
            if (res.data.code == 200) {
                $(".msg").html(' <div class="alert alert-success alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><span><i class="icon fa fa-check"></i>  </span>'+res.data.message+'</div>')
                
            }else{
                $(".msg").html(' <div class="alert alert-danger alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><span><i class="icon fa fa-ban"></i>  </span>'+res.data.message+'</div>')
            }

            window.location.href=window.location.href;
            
        })
        console.log(ID);
    });
    $(".execute").click(function(event) {
        // event.preventDefault();
    });
</script>
<?php $this->end(); ?>