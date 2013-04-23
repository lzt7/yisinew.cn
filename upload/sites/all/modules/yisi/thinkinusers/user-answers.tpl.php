<?php
/*
//<pre><?php print_r($rows);?></pre>
*/
?>
<table class="user-answers lines">
<tbody>
<?php foreach($rows as $data){?>
<tr>
	<td class="count-cell"><div <?php print $data['accepted'];?>><?php print $data['answers'];?></div></td>
  <td class="answer-hyperlink" title="<?php print $data['title'];?>"><?php print l($data['title'], 'node/'.$data['nid']);?></td>
</tr>
<?php }?>
</tbody>
</table>
