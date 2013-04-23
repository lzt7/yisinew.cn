<?php
/*
//<pre><?php print_r($rows);?></pre>
*/
?><ul class="users user-block clearfix">
<?php foreach($rows as $data){?>
	<li><?php print l('<span class="user-icon"><img src="'.$data['picture'].'" width="48" height="48" alt="Drupal 用户"/></span><span class="user-text"><span class="user-name">'.$data['name'].'</span><span class="stat uniques">声望: '.$data['reputation'].'</span></span>', 'user/'.$data['uid'], array('html'=>true, 'attributes' => array('class'=>'clearfix')));?></li>
<?php }?>
</ul>
