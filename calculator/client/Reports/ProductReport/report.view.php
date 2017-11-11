<?php 
    require_once "../koolreport/autoload.php";
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>
<?php
Table::create(array(
    "dataStore"=>$this->dataStore("sales"),
    "columns"=>array(
        "ID"=>array(
        ),
        "Name"=>array(
        ),
        "Category"=>array(
        ),
        "All in one price"=>array(
            "type"=>"number",
            "prefix"=>"R ",
        ),
        "Install only price"=>array(
            "type"=>"number",
            "prefix"=>"R ",
        ),
        "Supply only price"=>array(
            "type"=>"number",
            "prefix"=>"R ",
        ),
    ),
    "options"=>array(
        "title"=>"Sales By Customer"
    ),
    "cssClass"=>array(
        "table"=>"table table-hover"
    ),
));
?>
