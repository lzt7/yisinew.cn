<?php
/*
//<pre><?php print_r($rows);?></pre>
*/
?>
<div class="users clearfix">
<?php foreach($rows as $data){?>
<div class="user-info">
<div class="user-warp clearfix">
	<div class="user-picture"><?php print l('<img src="'.$data['picture'].'" width="80" height="80" alt="Drupal 用户"/>', 'user/'.$data['uid'], array('html'=>true));?></div>
  <div class="user-details">
  	<h1 class="clearfix"><span class="fn"><?php print l($data['name'], 'user/'.$data['uid']);?></span><span class="badge">Pro</span></h1>
    <ul>
    	<li><?php print $data['city'];?></li>
    	<li><span class="reputation-score" title="声望"><?php print $data['reputation'];?></span></li>
    </ul>    
  </div>
</div>
</div>
<?php }?>
</div>
