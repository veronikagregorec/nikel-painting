<?php get_header(); ?>

<div class="header-index">

</div>


<?php while ( have_posts() ) : the_post() ?>

    <div class="blog-index">
            <div class="blog-index-block">
                <h3><?php the_title(); ?></h3>

                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="preberi">Preberi več</a>
            </div>
    </div>

<?php endwhile; ?>


<?php get_footer(); ?>