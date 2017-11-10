<?php 
    require_once "koolreport/autoload.php";
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>

<div class="text-center">
    <h1>Sales Report</h1>
    <h4>This report shows top 10 sales by customer</h4>
</div>
<hr/>

<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('sales'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "customerName"=>array(
                "label"=>"Customer"
            ),
            "dollar_sales"=>array(
                "type"=>"number",
                "label"=>"Amount",
                "prefix"=>"$",
            )
        ),
        "options"=>array(
            "title"=>"Sales By Customer"
        )
    ));
?>
<?php
Table::create(array(
    "dataStore"=>$this->dataStore('sales'),
        "columns"=>array(
            "customerName"=>array(
                "label"=>"Customer"
            ),
            "dollar_sales"=>array(
                "type"=>"number",
                "label"=>"Amount",
                "prefix"=>"$",
            )
        ),
    "cssClass"=>array(
        "table"=>"table table-hover table-bordered"
    )
));
?>