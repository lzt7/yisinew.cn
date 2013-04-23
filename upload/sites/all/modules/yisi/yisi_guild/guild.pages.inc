<?php

function guild(){
	$output = '';
	$query = db_select('node','n')->extend('PagerDefault');
	$query->leftJoin('field_data_field_guild_logo', 'i', 'n.nid = i.entity_id');
	$query->fields('n')->fields('i');
	$query->condition('n.status', 1)
		->condition('n.type', 'guild')
		->limit(20);
	$query->orderBy('created', 'DESC');
	$objects = $query->execute()->fetchAll();
	$rows = array();
	foreach ($objects as $key=>$object) {
		$row = array();
		$row['nid'] = $object -> nid;
		$row['title'] = l($object -> title, 'node/'.$object ->nid);
		$row['image'] = l('<img src="'.image_style_url('guild_logo', yisi_file_uri($object -> field_guild_logo_fid)).'" title="'.$object -> title.'"/>', 'node/'.$object ->nid, array('html' => true,'attributes' => array('class' => array('thumbnail'))));
		$row['created'] = $object -> created;
		$rows[] = $row;
	}
	$output .= theme('guild', array('rows' => $rows));
	$output .= theme('pager');
	return $output;
}
