<?php include 'header.php' ?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
global $result;
$url;
foreach ($content as $key => $value) {
    $result = $value;
}
foreach ($page_url as $key => $value) {
    $url = $value;
}
?>

<div class="dashboard-index">

    <div class="container clearfix">
        <div class="row">
            <div class="col-sm-7">
                <div class="state-notification">
                    Welcome to Canada’s new exchange! While this may look finished a lot of functions are not.
                    Please read the status updates page for info on current functionality.
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php require 'dashboard/stock_chart.php';?>
        <?php require 'dashboard/market_depth_chart.php';?>
        <?php require 'dashboard/order_forms_module.php';?>
        <?php require 'dashboard/order_tables_module.php';?>
        <?php require 'dashboard/active_orders_module.php';?>
        <?php require 'dashboard/trade_history_module.php';?>
    </div>
</div>


<?php include 'footer.php' ?>

<script>
    function buybit() {
        jQuery('#para_bit').html("Please verify your account to Buy Bitcoin.").show();
        jQuery('#para1').hide();
        jQuery('#para_sell').hide();
    }

    function sellbit() {
        jQuery('#para_sell').html("Please verify your account to Sell Bitcoin.").show();
        jQuery('#para1').hide();
        jQuery('#para_bit').hide();
    }
</script>
