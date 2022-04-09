<?php while(have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header class="post__header">
        
            <h1 class="post__title post__title--h1" itemprop="headline"><?php the_title(); ?></h1>
        
        <?php knaeckebrot_post_meta();  // lib/post-meta.php ?>
        </header>

        <?php if(get_the_post_thumbnail() !== '') : ?>
            <?php the_post_thumbnail('full', ['class' => 'post__thumbnail']); ?>
        <?php endif; ?>
        
        <div class="post__content">    
            <?php the_content(); 
            // Navigation on paginated posts
            wp_link_pages();
            ?>
        </div>


    </article>

<?php endwhile;?>
