<!-- Přeskládávání a zarovnání novinek -->
<script src="<?php echo $app->config('server_url'); ?>assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript">
$(function(){
    var $container = $('#masonry .row');

    $container.masonry({
        itemSelector: '.novinka-text',
        isAnimated: true
    });
});
</script>
