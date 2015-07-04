<?php $this->append('css', $this->Html->css('Admin.summernote')); ?>
<?php $this->append('script', $this->Html->script('Admin.summernote.min')); ?>
<?php $this->append('script'); ?>
    <script type="text/javascript">
        $(function(){
            $('.wysiwyg').summernote();
        });
    </script>
<?php $this->end(); ?>
