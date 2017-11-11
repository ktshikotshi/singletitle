<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "report.php";
$sales = new Sales;
?>
<link rel="stylesheet" href="../reportAssets/example.css">
<link rel="stylesheet" href="../reportAssets/bootstrap-theme.min.css">
<link rel="stylesheet" href="../reportAssets/bootstrap.min.css">
<div class="container box-container">
<div class="text-center">
    <h1>Product Report</h1>
    <h4>This shows all information related to products</h4>
</div>
<hr/>
<?php
    $sales->run()->render("report");
?>
</div>