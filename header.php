<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>

<a href="#main" class="skip-link">Zum Inhalt springen</a>

<header class="siteheader" itemscope="" itemtype="https://schema.org/WPHeader">
    <div class="container">
        <div class="logo-area" itemscope="itemscope" itemtype="https://schema.org/Organization">
        <?php if(has_custom_logo()) :
            the_custom_logo();
        else : ?>
            <a class="header__blogname" href="<?php echo esc_url(home_url( '/' )); ?>" itemprop="url">
                <?php esc_html(bloginfo( 'name' )); ?>
            </a>
        <?php endif; ?>   
        </div>

        <div class="mobile-menu">
            <button id="menu-btn" class="mobile-menu__btn" href="#">
                <span class="mobile-menu__btn">Menü</span>
                <span class="screen-reader-text">Menü</span>
            </button>
        </div>
        <div class="main-navigation" role="navigation">
			<nav class="main-navigation__nav" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
            <?php wp_nav_menu( array(
            'theme_location' => 'main-menu',
            'menu_class' => 'primary-menu ',
            'menu_id' => 'primary-menu'
            ) ) ?>
			</nav>
        </div>


    </div>
</header>
<div id="content" class="content">
    
