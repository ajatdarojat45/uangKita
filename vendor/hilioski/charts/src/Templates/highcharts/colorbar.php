<?php

$graph = "
    <script type='text/javascript'>
        $(function () {
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: \"$this->id\",
                    "; if (!$this->responsive) {
    $graph .= $this->width ? "width: $this->width," : '';
    $graph .= $this->height ? "height: $this->height," : '';
}
                    $graph .= "
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'column'
                },
                title: {
                    text: \"$this->title\"
                },
                colors: ['".implode('\',\'', $this->colors)."'],
                plotOptions: {
                   column: {
                       pointPadding: 0.2,
                       borderWidth: 0,
                       colorByPoint: true
                   }
               },
               xAxis: {
                    categories: [
                        ";
                        foreach ($this->labels as $label) {
                            $graph .= "\"$label\",";
                        }
                        $graph .= "
                    ],
                    crosshair: true
                },
                series: [{
                    showInLegend: false,
                    name: \"$this->element_label\",
                    data: [
                    ";
                    foreach ($this->values as $dta) {
                        $graph .= "$dta,";
                    }
                    $graph .= "
                    ]
                }]
            });
        });
    </script>
    <div id='$this->id'></div>
";

return $graph;

