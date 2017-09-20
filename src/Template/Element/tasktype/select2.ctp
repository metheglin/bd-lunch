
<?= $this->Html->css(['/plugins/select2/css/select2.min'],['block'=>true]); ?>
<?= $this->Html->script(['/plugins/select2/js/select2.min'],['block'=>true]); ?>

<?php $this->start('scriptInline'); ?>
<script type="text/javascript">
    $("#backlog-assignee-key").select2();
    $("#backlog-notify-ids").select2();
    $("#chatwork-notify-ids").select2();

    $("#dependencies").select2();
    $("#artifacts").select2();

    $( '.shortcode' ).on('click', function(){
            var cursorPos = $('#templete').prop('selectionStart');
            var v = $('#templete').val();
            var TEXT = $(this).text()
            TEXT = ' `'+TEXT+'` '
            var textBefore = v.substring(0,  cursorPos );
            var textAfter  = v.substring( cursorPos, v.length );
            $('#templete').val( textBefore+ TEXT +textAfter );
        });
</script>
<?php $this->end(); ?>