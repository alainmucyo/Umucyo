<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Echarts\Chart;

class EsampleChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $this->labels(["one","two"]);
        $this->dataset("Sample","bar",[3,6]);
        parent::__construct();
    }
}
