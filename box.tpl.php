<?php

/**
 * @file box.tpl.php
 *
 * Theme implementation to display a box.
 *
 * Available variables:
 * - $title: Box title.
 * - $content: Box content.
 *
 * @see template_preprocess()
 */
?>
<div class="box">
  <span class="graytitle">
    <?php if($title): ?>
    <?php print $title ?>
    <?php endif; ?>
  </span>
  <?php if($content): ?>
    <?php print $content; ?>
  <?php endif; ?><!--End of content -->
</div>
