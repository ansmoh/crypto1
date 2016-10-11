(function (window, $) {

    'use strict';

    $(document).ready(function () {

        if (!$('.dashboard-index').length) {
            return;
        }

        $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-ohlcv.json&callback=?', function (data) {

            // split the data set into ohlc and volume
            var ohlc = [],
                volume = [],
                dataLength = data.length,
                // set the allowed units for data grouping
                groupingUnits = [
                    [
                        'minute',
                        [1, 3, 5, 15, 30]
                    ],
                    [
                        'hour',
                        [1, 2, 4, 6, 12]
                    ],
                    [
                        'day',
                        [1, 3]
                    ],
                    [
                        'week',                         // unit name
                        [1]                             // allowed multiples
                    ]
                ],

                i = 0;

            for (i; i < dataLength; i += 1) {
                ohlc.push([
                    data[i][0], // the date
                    data[i][1], // open
                    data[i][2], // high
                    data[i][3], // low
                    data[i][4] // close
                ]);

                volume.push([
                    data[i][0], // the date
                    data[i][5] // the volume
                ]);
            }

            // create the chart
            $('.dashboard-index .stock-chart-pane').highcharts('StockChart', {

                rangeSelector: {
                    selected: 13,
                    buttons: [
                        {
                            type: 'minute',
                            count: 1,
                            text: '1m'
                        },
                        {
                            type: 'minute',
                            count: 3,
                            text: '3m'
                        },
                        {
                            type: 'minute',
                            count: 5,
                            text: '5m'
                        },
                        {
                            type: 'minute',
                            count: 30,
                            text: '30m'
                        },
                        {
                            type: 'hour',
                            count: 1,
                            text: '1h'
                        },
                        {
                            type: 'hour',
                            count: 2,
                            text: '2h'
                        },
                        {
                            type: 'hour',
                            count: 3,
                            text: '4h'
                        },
                        {
                            type: 'hour',
                            count: 6,
                            text: '6h'
                        },
                        {
                            type: 'hour',
                            count: 12,
                            text: '12h'
                        },
                        {
                            type: 'day',
                            count: 1,
                            text: '1d'
                        },
                        {
                            type: 'day',
                            count: 3,
                            text: '3d'
                        },
                        {
                            type: 'week',
                            count: 1,
                            text: '1w'
                        },
                        {
                            type: 'month',
                            count: 1,
                            text: '1M'
                        },
                        {
                            type: 'month',
                            count: 3,
                            text: '3M'
                        },
                        {
                            type: 'month',
                            count: 6,
                            text: '6M'
                        },
                        {
                            type: 'ytd',
                            text: 'YTD'
                        },
                        {
                            type: 'year',
                            count: 1,
                            text: '1y'
                        },
                        {
                            type: 'all',
                            text: 'All'
                        }
                    ]
                },

                yAxis: [
                    {
                        title: {
                            text: 'OHLC'
                        },
                        lineWidth: 2
                    },
                    {
                        title: {
                            text: 'Volume'
                        },
                        opposite: true,
                        gridLineWidth: 0
                    }

                ],

                series: [
                    {
                        type: 'column',
                        name: 'Volume',
                        data: volume,
                        yAxis: 1,
                        color: '#DDD',
                        dataGrouping: {
                            units: groupingUnits
                        }
                    },
                    {
                        type: 'candlestick',
                        name: 'AAPL',
                        data: ohlc,
                        yAxis: 0,
                        dataGrouping: {
                            units: groupingUnits
                        }
                    }
                ]
            });
        });

        $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=usdeur.json&callback=?', function (data) {

            var firstSeries = [];
            var secondSeries = [];
            var dataLength = data.length;
            var dataHalf = dataLength / 2;
            var minVal = data[1][1];
            var marketDepthControls = $('.market-depth-chart-module .chart-controls .change-chart-type');
            var marketDepthChart = $('.market-depth-chart');

            for (var i = 0; i < dataLength; i++) {

                if (data[i][1] < minVal) {
                    minVal = data[i][1];
                }

                if (i > dataHalf) {
                    secondSeries.push(data[i]);
                } else {
                    firstSeries.push(data[i])
                }
            }

            var marketDepthOption = {
                title: {
                    text: ''
                },
                chart: {
                    type: $('.market-depth-chart-module .chart-controls .change-chart-type.active').data('type'),
                    zoomType: 'x'
                },
                xAxis: {
                    type: 'linear'
                },
                yAxis: {
                    min: minVal,
                    title: {
                        text: ''
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {

                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },

                series: [{
                    color: '#dee9f8',
                    lineColor: '#89afe5',
                    name: 'plot',
                    data: firstSeries
                },
                    {
                        color: '#e5efd3',
                        lineColor: '#a1c85c',
                        name: 'plot',
                        data: secondSeries
                    }
                ]
            };

            marketDepthChart.highcharts(marketDepthOption);

            marketDepthControls
                .on('click', function (e) {
                    var $this = $(this);

                    if($this.hasClass('active')){
                        return false;
                    }

                    marketDepthControls.removeClass('active');

                    $this.addClass('active');

                    marketDepthOption.chart.type = $this.data('type');

                    marketDepthChart.highcharts(marketDepthOption);

                })

        });

    });

})(window, jQuery);