<?php

if (!class_exists('BlockIoServiceProvider')) {
	require_once(APPPATH . 'libraries/Custom/BlockIoServiceProvider.php');
}

function getBlockIoService(){
    return BlockIoServiceProvider::getInstance();
}
