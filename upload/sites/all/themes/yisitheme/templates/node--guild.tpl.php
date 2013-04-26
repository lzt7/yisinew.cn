<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
  <header> <?php print render($title_prefix); ?>
    <?php if (!$page && $title): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <div class="listenin clearfix">
      <?php if ($unpublished): ?>
      <p class="unpublished"><?php print t('Unpublished'); ?></p>
      <?php endif; ?>
      <div class="node-tags"><strong>标签：</strong><?php print render($content['field_tags']);?></div>
    </div>
  </header>
  <?php endif; ?>
  <?php if(!$page):?>
  <?php
    hide($content['comments']);
    hide($content['links']);
    print render($content);
  ?>
  <?php print render($content['links']); ?> <?php print render($content['comments']); ?>   
  <?php endif; ?>
  
  <?php if($page):?>
  <?php  print render($content['group_group']);print module_invoke('yisi_guild', 'show_guild_topics'); ?>
  <?php endif; ?>
  
  
  </article>
<!-- /.node --> 

