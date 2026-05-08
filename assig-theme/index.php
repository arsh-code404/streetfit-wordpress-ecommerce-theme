<?php get_header(); ?>

<main class="site-main">

<!-- ================= HERO ================= -->
<section class="hero">

    <div class="hero__bg">
        <img src="<?php echo get_template_directory_uri(); ?>/street.jpg" alt="Hero Image">
    </div>

    <div class="hero__content">

        <h1 class="top-heading">
            FIND CLOTHES THAT MATCHES YOUR STYLE
        </h1>

        <p class="top-sub">
            Browse through our diverse range of meticulously crafted garments,
            designed to bring out your individuality.
        </p>

        <div class="shop-btn-wrap">
            <a href="#new-arrivals" class="shop-btn">Shop Now</a>
        </div>

        <div class="stats">
            <div><strong>200+</strong><span>Brands</span></div>
            <div><strong>2,000+</strong><span>Products</span></div>
            <div><strong>30,000+</strong><span>Customers</span></div>
        </div>

    </div>

</section>

<!-- ================= BRANDS ================= -->
<?php
$logo1 = get_field('logo_1');
$logo2 = get_field('logo_2');
$logo3 = get_field('logo_3');
$logo4 = get_field('logo_4');
?>

<section class="brands">
    <div class="brands__grid container">
        <?php if($logo1): ?><img src="<?php echo esc_url($logo1['url']); ?>" class="brands__logo"><?php endif; ?>
        <?php if($logo2): ?><img src="<?php echo esc_url($logo2['url']); ?>" class="brands__logo"><?php endif; ?>
        <?php if($logo3): ?><img src="<?php echo esc_url($logo3['url']); ?>" class="brands__logo"><?php endif; ?>
        <?php if($logo4): ?><img src="<?php echo esc_url($logo4['url']); ?>" class="brands__logo"><?php endif; ?>
    </div>
</section>

<!-- ================= NEW ARRIVALS ================= -->
<section id="new-arrivals" class="new-arrivals">
    <div class="container">

        <h2 class="new-arrivals__title">New Arrivals</h2>

        <div class="products-grid">

        <?php
        if(class_exists('WooCommerce')):

            $query = new WP_Query([
                'post_type' => 'product',
                'posts_per_page' => 4,
                'tax_query' => [
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'new-arrivals'
                    ]
                ]
            ]);

            if($query->have_posts()):
                while($query->have_posts()): $query->the_post();
                global $product;
        ?>

            <div class="product-card">

                <?php if($product->is_on_sale()): ?>
                    <div class="discount-badge">SALE</div>
                <?php endif; ?>

                <div class="product-card__image-wrap">
                    <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                </div>

                <div class="product-card__body">
                    <h3 class="product-card__name"><?php the_title(); ?></h3>

                    <div class="stars">★★★★★</div>

                    <div class="product-card__pricing">
                        <?php if($product->is_on_sale()): ?>
                            <span class="price-sale"><?php echo wc_price($product->get_sale_price()); ?></span>
                            <span class="price-old"><?php echo wc_price($product->get_regular_price()); ?></span>
                        <?php else: ?>
                            <span class="price-sale"><?php echo wc_price($product->get_price()); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        <?php endwhile; endif; wp_reset_postdata(); endif; ?>

        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>