<?php
require_once "koolreport/autoload.php";
use \koolreport\processes\Group;use \koolreport\processes\Sort;use \koolreport\processes\Limit;

class Sales extends \koolreport\KoolReport
{
    public function settings()
    {
        return array(
            "dataSources"=>array(
                "sales"=>array(
                    "connectionString"=>"mysql:host=localhost;dbname=singletitle",
                    "username"=>"root",
                    "password"=>"123456",
                    "charset"=>"utf8"
                )
            )
        );
    }

    public function setup()
    {
        $this->src('sales')
        ->query("SELECT singletitle_product_list.product_name, singletitle_sales.units_sold FROM singletitle_sales INNER JOIN singletitle_product_list ON singletitle_sales.product_id = singletitle_product_list.product_id")
        ->pipe(new Sort(array(
            "product_name"=>"desc"
        )))
        ->pipe(new Limit(array(10)))
        ->pipe($this->dataStore('sales'));
    }
}
?>