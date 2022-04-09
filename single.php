<?php get_header(); ?>

<?php 
    $sidebar_main = is_active_sidebar('sidebar-1');
?>


<div class="container">
    <main  id="main" class="<?php echo $sidebar_main === true ? 'sidebar-active' : '';?>" role="main">
        <?php get_template_part('template-parts/loop/loop'); ?>

        <!-- Posts pagination -->
        <nav id="nav-single">
            <h3 class="assistive-text"><?php _e( 'Post navigation', 'knaeckebrot' ); ?></h3>
            <span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'knaeckebrot' ) ); ?></span>
            <span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'knaeckebrot' ) ); ?></span>
        </nav><!-- #nav-single -->
        <?php comments_template( '', true ); ?>
    </main>

    <?php if($sidebar_main) : ?>
        <?php get_sidebar('sidebar-1'); ?>
    <?php endif; ?>
</div>


<?php get_footer(); ?>