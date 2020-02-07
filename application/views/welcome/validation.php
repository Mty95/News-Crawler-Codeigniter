<div id="body">
    <ul><?=validation_errors('<li style="color: red;">', '</li>');?></ul>

    <?=form_error('first_name', '<code>', '</code>');?>
    <?=form_error('last_name', '<code>', '</code>');?>
    <?=form_error('password', '<code>', '</code>');?>
</div>