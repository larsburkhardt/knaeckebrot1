<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header class="post__header">
        <?php if(is_single()) : ?>
            <h1 class="post__title post__title--h1" itemprop="headline"><?php the_title(); ?></h1>
        <?php else :  ?>
            <h2 class="post__title post__title--h2">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
        <?php endif; ?>
        <?php knaeckebrot_post_meta();  // lib/post-meta.php ?>
        </header>

        <?php if(get_the_post_thumbnail() !== '') : ?>
            <?php the_post_thumbnail('full', ['class' => 'post__thumbnail']); ?>
        <?php endif; ?>


        <?php if(is_single()) : ?>
            <div class="post__content">    
            <?php the_content(); 
            // Navigation on paginated posts
            wp_link_pages();
            ?>
            </div>
        <?php else : ?>
            <div class="post__content post__content--excerpt">
            <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>

        <?php if(is_single()) : ?>
            <footer class="post__footer">
                <?php 
                if(has_category()) {
                    echo '<div class="post__categories">';
                    /* translators: used between categories */
                    $cats_list = get_the_category_list( esc_html__(', ', 'knaeckebrot') );
                    /* translators: %s is the categories list */
                    printf(__( '<h5 class="post__categories--intro">Posted in %s</h5>', 'knaeckebrot'), $cats_list);
                    echo '</div>';
                }
                if(has_tag()) {
                    echo '<div class="post__tags"><h5 class="post__tags--intro">Tags:</h5>';
                    $tags_list = get_the_tag_list( '<ul class="post__tags--list"><li class="post__tags--list-item">', '</li><li class="post__tags--list-item">', '</li></ul>');
                    echo $tags_list;
                    // printf(esc_html__( 'Tags', 'knaeckebrot'), $tags_list);                
                    echo '</div>';
                }
            ?>

            </footer>
        <?php endif; ?>

    </article>

<?php endwhile; endif; ?>
