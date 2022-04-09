<?php get_header(); ?>

<?php 
    $sidebar_main = is_active_sidebar('sidebar-1');
?>


<div class="container">
    <main id="main" class="<?php echo $sidebar_main === true ? 'sidebar-active' : '';?>" role="main">
        <?php get_template_part('template-parts/loop/loop', 'page'); ?>
    </main>

    <?php if($sidebar_main) : ?>
        <?php get_sidebar('sidebar-1'); ?>
    <?php endif; ?>
</div>


<?php get_footer(); ?>