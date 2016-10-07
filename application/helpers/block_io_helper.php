<?php 


if (!class_exists('BlockIo')) {
	include_once(APPPATH.'libraries/block_io.php');
}




function get_wallet_data($email){
	$apiKey = '56a9-9408-da57-0c60';
	$pin = 'pin123pin';
	$version = 2; // the API version
	$block_io = new BlockIo($apiKey, $pin, $version);
	try{
		$ballance = $block_io->get_address_balance(array('labels' => $email));
		if($ballance->status === 'success'){
			$label = $ballance->data->balances[0]->label;
			$address = $ballance->data->balances[0]->address;
			$available_balance = $ballance->data->balances[0]->available_balance;
			$result = array('block_io_label' => $label, 'block_io_address' => $address, 'block_io_ballance' => $available_balance);
		} else {
			$result = array();
		}

	} catch (Exception $e) {
		$create = $block_io->get_new_address(array('label' => $email));
		if($create->status === 'success'){
			$label = $create->data->label;
			$address = $create->data->address;
			$available_balance = 0;
			$result = array('block_io_label' => $label, 'block_io_address' => $address, 'block_io_ballance' => $available_balance);
		} else {
			$result = array();
		}

	}

	return $result;

}

?>
