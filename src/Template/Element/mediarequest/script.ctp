
<?= $this->Html->css(['/plugins/selectize/css/selectize'],['block'=>true]); ?>
<?= $this->Html->script(['/plugins/selectize/js/standalone/selectize'],['block'=>true]); ?>

<?php $this->start('scriptInline'); ?>
<script type="text/javascript">
    $("input[name=use_production][type=checkbox]").change(function() {
        console.log(this)
        if($(this).is(':checked')) {
            $("input[name=prod_reverse_proxy]").closest('.form-group').show();
            $("input[name=prod_ssl]").closest('.form-group').show();
            console.log("checked")
        } else {
            $("input[name=prod_reverse_proxy]").prop('checked', false).closest('.form-group').hide();
            $("input[name=prod_ssl]").prop('checked', false).closest('.form-group').hide();
            console.log("not checked")
        }
    })
    .trigger('change');
    $(".selectize").selectize({
        delimiter: ',',
        plugins: ['remove_button'],
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });

    var mediaModeToTaskPreset = JSON.parse('<?php echo json_encode(\App\Model\Entity\MediaRequest::mediaModeToTaskPreset());?>');
    $("select[name=media_mode").change(function(e){
        // console.log("test1", e)
        // console.log("test2", $(this).val())
        $("input[type=checkbox].taskPreset").prop('checked', false)
        var presets = mediaModeToTaskPreset[$(this).val()]
        if ( presets ) {
            presets.forEach(function(x){
                $("input[name="+x+"]").prop('checked', true)
            })
        }
        console.log("test3", presets)
    })

</script>
<?php $this->end(); ?>