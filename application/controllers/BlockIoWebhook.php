<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BlockIoWebhook extends MY_Controller{


    public function index(){

        log_message('error', json_encode($_REQUEST));

        return;

    }


}