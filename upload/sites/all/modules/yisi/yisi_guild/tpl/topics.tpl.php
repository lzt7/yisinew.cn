<?php foreach($rows as $data){?>
<div class="excerpt article_node">
  <h2><?php print $data['title'];?></h2>
  <div class="info">
    <time class="time"><?php print date('Y-m-d',$data['created']);?></time>
    <?php print l(yisi_comment_counts($data['nid']) . '人评论', 'node/'.$data['nid'].'#comments', array('html' => true,'attributes' => array('class' => array('comm'))));?> <span class="view"><?php print module_invoke('thinkin', 'views_counts', $data['nid']); ?><em> 次浏览</em></span> </div>
  <div class="note"><?php print $data['description'] ?></div>
  <?php if(isset($data['image'])){?>
  <div class="note_img"><?php print $data['image'];?></div>
  <?php }?>
</div>
<?php }?>
