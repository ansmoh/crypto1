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
            <div class="pull-right col-sm-7">
                <div class="state-notification">
                    Welcome to Canada’s new exchange! While this may look finished a lot of functions are not.
                    Please read the status updates page for info on current functionality.
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="stock-chart-module">
            <div class="table-responsive">
                <table class="table chart-stats">
                    <tbody>
                    <tr>
                        <td class="currency-code">BTC/CAD</td>
                        <td>
                            <div class="small">Last Price:</div>
                            <i class="fa fa-dollar"></i>619.2237
                        </td>
                        <td>
                            <div class="small">Daily change:</div>
                            <i class="fa fa-dollar"></i>619.2237
                        </td>
                        <td>
                            <div class="small">Today's open:</div>
                            <i class="fa fa-dollar"></i>619.2237
                        </td>
                        <td>
                            <div class="small">24h volume:</div>
                            <i class="fa fa-btc"></i>619.2237
                        </td>
                        <td class="chart-btn-td">
                            <div class="clearfix">
                                <button class="btn btn-default pull-right chart-btn">
                                    <i class="fa fa-bar-chart"></i>
                                    Chart
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="stock-chart-pane"></div>
        </div>

        <div class="order-forms">
            <h3 class="text-center">
                Trade: buy or sell BTC
            </h3>
            <div class="row form-panels-wrapper">
                <div class="refresh-icon">
                    <i class="fa fa-refresh"></i>
                    <div class="text-cont">or</div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default buy-btc-panel">
                        <div class="panel-heading">
                            <div class="clearfix">
                                <div class="pull-left title">
                                    Buy BTC:
                                </div>
                                <div class="balance pull-right">
                                    <i class="fa fa-clock-o"></i> Your USD Balance: 0.49
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="buy-btc">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btc-amount-buy">Amount to Buy</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="btc-amount-buy"
                                                       name="btc-amount-buy"/>
                                                <div class="input-group-addon">BTC</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group error">
                                            <label for="btc-price-buy">Amount to Buy</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="btc-price-buy"
                                                       name="btc-price-buy"/>
                                                <div class="input-group-addon">USD</div>
                                            </div>
                                            <div class="message">
                                                Your price differs from the current market price significantly
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn">
                                            Place order
                                        </button>
                                    </div>

                                </div>
                                <div class="row operation-info">
                                    <div class="col-md-4 total-sum">
                                        Total: 0.0000 USD
                                    </div>
                                    <div class="col-md-4 fee-sum">
                                        (Fee: 0.00 USD)
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default sell-btc-panel">
                        <div class="panel-heading">
                            <div class="clearfix">
                                <div class="title pull-left">
                                    Sell BTC:
                                </div>
                                <div class="balance pull-right">
                                    <i class="fa fa-clock-o"></i> Your BTC Balance: 0.00000000000
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="sell-btc">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="btc-amount-sell">Amount to Buy</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="btc-amount-sell"
                                                       name="btc-amount-sell"/>
                                                <div class="input-group-addon">BTC</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group error">
                                            <label for="btc-price-sell">Amount to Buy</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="btc-price-sell"
                                                       name="btc-price-sell"/>
                                                <div class="input-group-addon">USD</div>
                                            </div>
                                            <div class="message">
                                                Your price differs from the current market price significantly
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn">
                                            Place order
                                        </button>
                                    </div>

                                </div>
                                <div class="row operation-info">
                                    <div class="col-md-4 total-sum">
                                        Total: 0.0000 USD
                                    </div>
                                    <div class="col-md-4 fee-sum">
                                        (Fee: 0.00 USD)
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-module">
            <div class="row">
                <div class="col-sm-6">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Price per BTC</th>
                                <th>BTC Amount</th>
                                <th>Total: (USD)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Price per BTC</th>
                                <th>BTC Amount</th>
                                <th>Total: (USD)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            <tr>
                                <td>619.192</td>
                                <td><i class="fa fa-btc"></i> 0.2456789 </td>
                                <td><i class="fa fa-dollar"></i> 172.1346 </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-module">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Amount BTC</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    <tr>
                        <td>2016-10-08 08:30:56</td>
                        <td>SELL</td>
                        <td><i class="fa fa-btc"></i> 0.2456789 </td>
                        <td>619.192</td>
                        <td><i class="fa fa-dollar"></i> 172.1346 </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
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
