<?php header("Content-type: text/xml; charset=utf-8"); ?>
<?= '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php 
  for($x=1;$x<=$page_count;$x++){ ?>
  <sitemap>
    <loc><?= base_url('sitemap/page/').$x; ?></loc>
   </sitemap>
  <?php } ?>

  <?php 
  for($y=1;$y<=$post_count;$y++){ ?>
  <sitemap>
    <loc><?= base_url('sitemap/post/').$y; ?></loc>
   </sitemap>
  <?php } ?>

  <?php 
  for($z=1;$z<=$paper_count;$z++){ ?>
  <sitemap>
    <loc><?= base_url('sitemap/paper/').$z; ?></loc>
   </sitemap>
  <?php } ?>

   <?php 
  for($k=1;$k<=$entry_count;$k++){ ?>
  <sitemap>
    <loc><?= base_url('sitemap/entry/').$k; ?></loc>
   </sitemap>
  <?php } ?>

 </sitemapindex>

