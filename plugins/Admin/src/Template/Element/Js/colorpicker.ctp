<?php $this->append('css', $this->Html->css('bootstrap-colorpicker.min.css')); ?>
<?php $this->append('script', $this->Html->script('bootstrap-colorpicker.min')); ?>
<?php $this->append('script'); ?>
    <script type="text/javascript">
        $(function(){
            $('.color').colorpicker();
        });
    </script>
<?php $this->end(); ?>
