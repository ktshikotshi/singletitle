<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "report.php";
include("../../header.php");
$sales = new Sales;
?>
<div class="text-center">
    <h1>Product Report</h1>
    <h4>This shows all information related to products</h4>
</div>
<hr/>
<?php
    $sales->run()->render();
?>