<?php get_header(); ?>

<?php 
    $sidebar_main = is_active_sidebar('sidebar-1');
?>

<main>
    <div class="container">
        <div id="content" class="<?php echo $sidebar_main === true ? 'sidebar-active' : '';?>">
            <?php get_template_part('template-parts/loop/loop'); ?>
        </div>

        <?php if($sidebar_main) : ?>
            <?php get_sidebar('sidebar-1'); ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>