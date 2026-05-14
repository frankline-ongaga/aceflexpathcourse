<div class="mesh-background-div relative">
    <div class="mesh-hero-gradient d-flex h-100">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 text-center mx-auto">
                    <h1 class="mesh-page-title infinite wow animate__slideDownSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        <?= htmlspecialchars(($category['name'] ?? 'Samples'), ENT_QUOTES, 'UTF-8'); ?> Samples
                    </h1>
                    <?php if (!empty($category['description'])) : ?>
                        <p class="mesh-page-description my-3 infinite wow animate__slideUpSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                            <?= htmlspecialchars($category['description'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>
                    <a href="<?php echo base_url('order_now'); ?>" class="mesh-button px-3 infinite wow animate__slideLeftSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        Place Your Order Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php if (isset($h) && method_exists($h, 'result')) : ?>
                        <?php foreach ($h->result() as $row) : ?>
                            <div class="col-md-6 mb-5">
                                <div class="hover-top card shadow-only-hover">
                                    <div class="card-body">
                                        <h5 class="mb-3">
                                            <a class="text-dark stretched-link" href="<?php echo base_url(); ?>blog/<?php echo $row->post_name; ?>">
                                                <?php echo $row->post_title; ?>
                                            </a>
                                        </h5>
                                        <?php if (!empty($row->post_excerpt)) : ?>
                                            <p><?php echo $row->post_excerpt; ?></p>
                                        <?php endif; ?>
                                        <div class="nav small border-top pt-3">
                                            <a class="text-body font-w-600 ms-auto" href="<?php echo base_url(); ?>blog/<?php echo $row->post_name; ?>">Read More <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?= $links ?? ''; ?>
                </div>
            </div>

            <div class="col-md-3">
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
</section>

