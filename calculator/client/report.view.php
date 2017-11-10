<?php 
    require_once "koolreport/autoload.php";
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>
<?php
Table::create(array(
    "dataStore"=>$this->dataStore("sales"),
    "columns"=>array(
        "All in one price"=>array(
            "type"=>"number",
            "label"=>"Amount",
            "prefix"=>"$ ",
        ),
    ),
    "options"=>array(
        "title"=>"Sales By Customer"
    ),
    "cssClass"=>array(
        "table"=>"table table-hover table-bordered"
    ),
));
?>
