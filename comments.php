<?php 

if( post_password_required( ) ) {
    return;
}
?>

<div id="comments" class="comments">
    <?php if( have_comments() ) { ?>
        <h2 class="comments__title">
            <?php        
            // Show number of comments
                /* translators: 1 is number of comments and 2 ist post title */
                printf(
                    esc_html( _n( 
                        '%1$s Reply to "%2$s"',
                        '%1$s Replies to "%2$s"',
                        get_comments_number(), 
                        'knaeckebrot'
                    ) ),
                    number_format_i18n( get_comments_number() ),
                    get_the_title()
                )
            ?>
        </h2>
        <ul class="comments__list">
        <?php 
            wp_list_comments( array(
            /*   'style' => 'div', // for divs replace 'ul' in line 26 and 35 */
                'short_ping' => 'true',
                'avatar_size' => 100,
                'callback' => 'knaeckebrot_comment_callback' 
                ) );
                // knaeckebrot_comment_callback in lib/comment-callback.php
        ?>
        </ul>
        <?php // The following creates the comments navigation: nav class="navigation page-navigation" ?>
        <?php the_comments_pagination(); ?>
    <?php } ?>

    <?php if( !comments_open() && get_comments_number() ) { ?>
        <p class="comments__closed"><?php esc_html_e( 'Comments are closed for this post', 'knaeckebrot' ); ?></p>
    <?php } ?>

    <?php comment_form( array(
        'class_submit' => 'comment-form__submit',
        'title_reply' => esc_html__( 'Reply', 'knaeckebrot'),
        'title_reply_to' => esc_html__( 'Reply to %s', 'knaeckebrot' ),
        'format' => 'html5'
    )); ?>
</div>
