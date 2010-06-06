<?php
// $Id: comment.tpl.php,v 1.4.2.1 2008/03/21 21:58:28 goba Exp $

/**
 * @file comment.tpl.php
 * Default theme implementation for comments.
 *
 * Available variables:
 * - $author: Comment author. Can be link or plain text.
 * - $content: Body of the post.
 * - $date: Date and time of posting.
 * - $links: Various operational links.
 * - $new: New comment marker.
 * - $picture: Authors picture.
 * - $signature: Authors signature.
 * - $status: Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview.
 * - $submitted: By line with date and time.
 * - $title: Linked title.
 *
 * These two variables are provided for context.
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * @see template_preprocess_comment()
 * @see theme_comment()
 */
?>
<ul class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ' '. $status ?> clear-block pageitem">
  <li class="menu"><?php print "<span class=\"name\">{$title}</span>". ($comment->new ? "<span class=\"new\">{$new}</span>" : '') ?></li>
  <li class="textbox">
    <div class="submitted"><?php print $submitted ?></div>
    <div class="content">
      <?php print $content ?>
      <?php if ($signature): ?>
      <div class="user-signature clear-block"><?php print $signature ?></div>
      <?php endif; ?>
      <?php print $links ?>
    </div>
  <li>
</ul>
