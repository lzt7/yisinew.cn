<?php
function course($type = 'grid') {	
	$output = '';
	$query = db_select('node','n')->extend('PagerDefault');
	$query->leftJoin('field_data_field_image', 'i', 'n.nid = i.entity_id');
	$query->leftJoin('field_data_body', 'b', 'n.nid = b.entity_id');
	$query->leftJoin('field_data_field_drupal_version', 'v', 'n.nid = v.entity_id');
 // $query->join('field_data_body', 'b', 'n.nid = b.entity_id'); 
	$query->fields('n')->fields('i')->fields('b')->fields('v');
	$query->condition('n.status', 1)
		->condition('n.type', 'course')
		->limit(20);
	$query->orderBy('created', 'DESC');
	$objects = $query->execute()->fetchAll();
	$rows = array();
	foreach ($objects as $key=>$object) {
		$row = array();
		$row['nid'] = $object -> nid;
		$row['title'] = l($object -> title, 'node/'.$object ->nid);
		$row['image'] = l('<img src="'.image_style_url('medium', thinkin_file_uri($object -> field_image_fid)).'" title="'.$object -> title.'"/>', 'node/'.$object ->nid, array('html' => true,'attributes' => array('class' => array('thumbnail'))));
		$row['image_detail'] = l('<img src="'.image_style_url('thumbnail', thinkin_file_uri($object -> field_image_fid)).'" title="'.$object -> title.'"/>', 'node/'.$object ->nid, array('html' => true,'attributes' => array('class' => array('pull-left'))));
		$row['category'] = course_category($object -> nid);
		$row['duration'] = course_duration($object -> nid);
		$version = '';
		if($object -> field_drupal_version_tid != ''){
			$version = l(taxonomy_term_load($object -> field_drupal_version_tid)->name, 'taxonomy/term/'.$object -> field_drupal_version_tid);
		}
		$row['version'] = course_version($object -> nid);
		$row['serie'] = course_video_count($object -> nid) > 0 ? '<a style="cursor:pointer;" onclick="slideToggle'.$object -> nid.'()" id="serie'.$object -> nid.'">显示视频列表</a>':'';
		$row['video'] = thinkincourse_video($object -> nid);
		$row['description'] = drupal_substr(check_markup($object -> body_value, 'filtered_html', FALSE), 0, 120);
		$row['created'] = $object -> created;
		$rows[] = $row;
	}
	switch($type){
		case 'list':
			$output .= theme('course_list', array('rows' => $rows));			
			break;
		case 'grid':
			$output .= theme('course_grid', array('rows' => $rows));
			break;
		case 'detail':
			$output .= theme('course_detail', array('rows' => $rows));
			break;
		default:
			$output .= theme('course_detail', array('rows' => $rows));
			break;
	}
	$output .= theme('pager');
	return $output;
}

