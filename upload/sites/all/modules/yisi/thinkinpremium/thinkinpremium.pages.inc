<?php
function pricing() {
	$output = '';
	$query = db_select('commerce_product','c');
	$query->leftJoin('field_data_commerce_price', 'p', 'c.product_id = p.entity_id');
	$query->leftJoin('field_data_field_commerce_sp_time', 't', 'c.product_id = t.entity_id');
	$query->leftJoin('field_data_field_product_image', 'i', 'c.product_id = i.entity_id');
	$query->fields('c')->fields('p')->fields('t')->fields('i');
	$query->condition('c.status', 1);
	$query->orderBy('created', 'ASC');
	$objects = $query->execute()->fetchAll();
	$rows = array();
	foreach ($objects as $key=>$object) {
		$row = array();
		$row['cid'] = $object -> product_id;
		$row['title'] = l($object -> title, 'product/add/'.$object ->product_id . '/1');
		$row['image'] = l('<img src="'.thinkin_file_managed($object -> field_product_image_fid).'" title="'.$object -> title.'"/>', 'product/add/'.$object ->product_id . '/1', array('html' => true,'attributes' => array('class' => array('subscription'))));
		$row['subscribe'] = l(t('Subscribe now'), 'product/add/'.$object ->product_id . '/1', array('attributes' => array('class' => array('sbn'))));		
		$row['price'] = commerce_currency_format($object -> commerce_price_amount, 'CNY');
		$temp = '<img src="'.thinkin_file_managed($object -> field_product_image_fid).'" title="'.$object -> title.'"/>';
		$temp .= '<h4>'.$object -> title.'</h4>';
		$temp .= '<p><span class="price original-price" style="text-decoration: line-through; color:#cccccc;">'.commerce_currency_format($object -> commerce_price_amount, 'CNY').'</span></p><p><span class="price">'.commerce_currency_format($object -> commerce_price_amount * 0.8, 'CNY').'</span><p><span class="sbn">'.t('Subscribe now').'</span></p></p>';
		$row['content'] = l($temp, 'product/add/'.$object ->product_id . '/1', array('html' => true,'attributes' => array('class' => array('subscription'))));
		$rows[] = $row;
	}
	$output .= theme('premium', array('rows' => $rows));
	return $output;
}


/**
* Custom function to add product(s) to a cart by product id
*/
function premium_product_add($pid,$quantity=1) {
    if ($product = commerce_product_load($pid) ) {
        global $user;
        $uid = $user->uid;
        $line_item = commerce_product_line_item_new($product, $quantity);
        $line_item->field_ticket_type['und'][]['value'] = 0;
        $line_item = commerce_cart_product_add($uid, $line_item, FALSE);
        drupal_goto('checkout');
    }    
}
