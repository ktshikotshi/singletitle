<?php 
    require_once "../koolreport/autoload.php";
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\Histogram;
    use \koolreport\widgets\google\BarChart;
    use \koolreport\widgets\google\ColumnChart;
?>
<div class="text-center">
    <h1>Product Report</h1>
    <h4>This shows all information related to products</h4>
</div>
<hr/>
<h5>Product info Table</h5>
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
    "cssClass"=>array(
        "table"=>"table table-hover"
    ),
));
?>
<hr/ >
<h5>Price Charts</h5>
<?php
    Histogram::create(array(
        "dataStore"=>$this->dataStore('sales'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "Name"=>array(
            ),
            "All in one price"=>array(
                "type"=>"number",
                "label"=>"Price",
                "prefix"=>"R ",
            ),
        ),
        "options"=>array(
            "title"=>"All inclusive prices for all products"
        ),
    ));
?>
<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('sales'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "Name"=>array(
            ),
            "Install only price"=>array(
                "type"=>"number",
                "label"=>"Price",
                "prefix"=>"R ",
            ),
        ),
        "options"=>array(
            "title"=>"Install only prices for all products"
        ),
    ));
?>
<?php
    ColumnChart::create(array(
        "dataStore"=>$this->dataStore('sales'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "Name"=>array(
            ),
            "Supply only price"=>array(
                "type"=>"number",
                "label"=>"Price",
                "prefix"=>"R ",
            ),
        ),
        "options"=>array(
            "title"=>"Supply only prices for all products"
        )
    ));
?>