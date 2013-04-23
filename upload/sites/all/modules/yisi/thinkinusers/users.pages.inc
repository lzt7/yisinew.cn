<?php

function users($type = 'reputation')
{	
	$output = '';
	$query = db_select('users','u')->extend('PagerDefault');
	$query -> leftJoin('userpoints','p','u.uid = p.uid');
	$query -> leftJoin('field_data_field_city','c','u.uid = c.entity_id');
	$query->fields('u')->fields('p', array('points'))->fields('c', array('field_city_value'))
		->condition('u.status', 1)
		->condition('u.uid', 1, '!=')
		->limit(60);
	switch($type){
		case "reputation":
		$query->orderBy('points', 'DESC');
		break;
		case "newusers":
		$query->orderBy('created', 'DESC');
		break;
		default:
		$query->orderBy('points', 'DESC');
		break;
	}
	$objects = $query->execute()->fetchAll();
	$rows = array();
	foreach ($objects as $key=>$object) {
		$row = array();
		$row['uid'] = $object -> uid;
		$row['name'] = $object -> name;
		$row['picture'] = drupalla_user_avatar($object -> uid);
		$row['city'] = $object -> field_city_value;
		if($object -> points){$row['reputation'] = $object -> points;}
		else{$row['reputation'] = '0';}
		$rows[] = $row;
	}
	$output .= theme('users', array('rows' => $rows));
	$output .= theme('pager');
	return $output;
}

