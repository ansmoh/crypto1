

<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @var $userdata array
 */

include 'header.php' ?>

    <div class="dashboard-deposit">

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Deposit</h2>
                    <ul class="list-unstyled wallet-provider-list">
                        <li>
                            <a href="#">Bitcoin</a>
                        </li>
                        <li>
                            <a href="#">Ether</a>
                        </li>
                        <li>
                            <a href="#">Litecoin</a>
                        </li>
                        <li>
                            <a href="#">Doge</a>
                        </li>
                        <li>
                            <a href="#">CAD $</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 text-center">
                    <h2>BTC</h2>
                    <div class="qr-desc">
                        Your personal deposit address for deposit:
                    </div>
                    <div class="qr-wrapper">
                        <img class="qr-code-img"
                             src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $userdata['block_io_address']; ?>&choe=UTF-8&chs=300x300"
                             title="Account QR" alt="QR code"/>
                        <div>
                            <div class="wallet-hash-wrapper">
                                <div class="wallet-hash"><?php echo $userdata['block_io_address']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 page-desc">
                    We do not charge a fee on Crypto deposits. <br/>
                    Minimal amount for deposit is - 0.1 in your chosen crypto<br/>
                    Your deposit will be credited within one hour having at least 3 confirmations on the network.<br/>
                    Transaction confirmations on all networks can take from 1 hour and up to 3 days if you send it
                    without a sufficient fee.<br/>
                </div>
            </div>

        </div>

    </div>

<?php include 'footer.php' ?>