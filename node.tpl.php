<ul id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block pageitem">

<?php if (!$page): ?>
  <li class="menu">
    <a href="<?php print $node_url ?>" title="<?php print $title ?>">
      <span class="name"><?php print $title ?></span>
      <span class="arrow"></span>
    </a>
  </li>
<?php endif; ?>

<li class="textbox">
  <div class="meta">
  <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <?php if ($terms): ?>
    <div class="terms terms-inline"><?php print $terms ?></div>
  <?php endif;?>
  </div>

  <div class="content">
    <?php print $content ?>
  </div>

  <?php print $links; ?>
</li>
</ul>
