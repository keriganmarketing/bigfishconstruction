<?php $__env->startSection('content'); ?>
<kma-slider class="slider-container"></kma-slider>
<main role="main">
    <div class="container">
        <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
                <?php echo e(the_post()); ?>


                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <article class="front">
                            <header>
                                <h1 class="example"><?php echo e(the_title()); ?></h1>
                            </header>

                            <?php echo e(the_content()); ?>


                            <a href="/about-us/" class="btn btn-lg btn-outline-primary" >Meet Our Team &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></a>

                        </article>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <article>
                <p>Nothing to see.</p>
            </article>
        <?php endif; ?>
    </div>
</main>
<?php echo $__env->make('partials.map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="projects-header header-image" style="background-image: url('<?php echo e($projectsHeader['url']); ?>')">
    <h2 class="text-center text-uppercase text-white text-outlined">Projects</h2>
</div>
<div class="container">
    <portfolio-gallery :limit="6" :locations="<?php echo e($locations); ?>" :construction-types="<?php echo e($types); ?>"></portfolio-gallery>
    <div class="section-button text-center">
        <a class="btn btn-lg btn-outline-primary" href="/project-portfolio/">Project Portfolio &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>
</div>
<div class="testimonial-section">

    <div class="section-button text-center">
        <a class="btn btn-lg btn-outline-white" href="/testimonials/">More Testimonials &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>
</div>
<div class="feature-box-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-white box-container">
                <div class="feature-box feat-one">
                    <h3 class="text-uppercase"><?php echo e($featureBox1['title']); ?></h3>
                    <p><?php echo e($featureBox1['text']); ?></p>
                    <a class="btn btn-lg btn-outline-white" href="<?php echo e($featureBox1['link']); ?>" >Learn More &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-6 text-white box-container">
                <div class="feature-box feat-two">
                    <h3 class="text-uppercase"><?php echo e($featureBox2['title']); ?></h3>
                    <p><?php echo e($featureBox2['text']); ?></p>
                    <a class="btn btn-lg btn-outline-white" href="<?php echo e($featureBox2['link']); ?>" >Learn More &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>