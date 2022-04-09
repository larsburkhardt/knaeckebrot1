<?php 
function knaeckebrot_post_meta() {
    /* Translators: %s: Post Date */
    printf(
        esc_html__( 'Posted on %s', 'knaeckebrot' ),
        '<a class="post__meta--link" href="' .  esc_url(get_permalink()) . '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time></a> '

    );
    /* Translators: %s: Post Author */
    printf(
        esc_html__('by %s', 'knaeckebrot'),
        '<a href="' . esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) . '">' . esc_html(get_the_author()) . '</a>'

    );

}
