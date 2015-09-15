<script>
    var chart1;
    chart1 = new Highcharts.Chart({
        chart: {
            renderTo: 'bezoekers-graph',
            type: 'spline',
            zoomType: 'xy',

            resetZoomButton: {
                position: {
                    align: 'right', // by default
                    verticalAlign: 'top', // by default
                    x: -35,
                    y: 2
                }
            }
        },
        credits: {
            enabled: false
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: "datetime"
        },
        yAxis: {
            title: {
                text: 'Aantal bezoekers'
            }
        },
        series: [{
            name: 'Aantal bezoekers',
            id: 'bez',
            marker : {
                enabled : true,
                radius : 4,
                symbol: 'diamond'
            },
            color: 'rgb(255,87,47)',
            data:<?php
                    echo "[";
                    foreach ($visits as $visit)
                    {
                        echo "[".(strtotime($visit->date) + 7200) * 1000 .",".$visit->visits."],";
                    }
                    echo "]";
                ?>
        }]
    });
</script>