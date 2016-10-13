<?php

if (!class_exists('BlockIo')) {
    include_once(APPPATH . 'libraries/block_io.php');
}

class BlockIoServiceProvider
{

    private static $instance;
    private $blockIo;

    private function __construct()
    {
        global $CI;

        $CI->config->load('block_io', true);

        $apiKey = $CI->config->item('key', 'block_io');
        $pin = $CI->config->item('secret', 'block_io');
        $version = $CI->config->item('v', 'block_io'); // the API version
        $this->blockIo = new BlockIo($apiKey, $pin, $version);
    }

    public static function getInstance()
    {
        if (static::$instance !== null) {
            return static::$instance;
        }

        return new static();
    }

    function get_wallet_data($email)
    {
        try {
            $ballance = $this->blockIo->get_address_balance(array('labels' => $email));
            if ($ballance->status === 'success') {
                $label = $ballance->data->balances[0]->label;
                $address = $ballance->data->balances[0]->address;
                $available_balance = $ballance->data->balances[0]->available_balance;
                $result = array('block_io_label' => $label, 'block_io_address' => $address, 'block_io_ballance' => $available_balance);
            } else {
                $result = array();
            }

        } catch (Exception $e) {

            $create = $this->blockIo->get_new_address(array('label' => $email));
            if ($create->status === 'success') {
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

    public function getPrices(){
        return $this->blockIo->get_current_price();
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}