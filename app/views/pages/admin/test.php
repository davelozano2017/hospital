<?php
$graph = new SVGGraph(500, 400);
$graph->Values(1, 4, 8, 9, 16, 25, 27); 
$graph->Render('LineGraph', true, true);