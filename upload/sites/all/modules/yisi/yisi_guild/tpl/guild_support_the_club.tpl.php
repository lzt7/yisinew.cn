<?php foreach($rows as $data){ ?>		
<div class="guild_info clearfix">
  <div class="guild_logo"><?php print $data['image'] ?></div>
  <div class="guild_desc">
    <h3><?php print $data['title'] ?></h3>
    <p><span class="f1"><b>ID: <?php print $data['nid'] ?></b></span></p>
  </div>
</div>
<?php }?>	