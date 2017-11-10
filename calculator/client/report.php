<?php
require_once "koolreport/autoload.php";
use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;

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
        ->query("SELECT singletitle_product_list.product_id as ID, singletitle_product_list.product_name as Name,singletitle_product_category_list.category_name as Category,
        singletitle_price_list.inclucivePrice as 'All in one price', singletitle_price_list.Install_onlyPrice as 'Install only price', singletitle_price_list.Supply_onlyPrice as 'Supply only price'
        FROM singletitle_price_list JOIN singletitle_product_category_list JOIN singletitle_product_list
        WHERE singletitle_product_list.product_id = singletitle_price_list.product_id AND singletitle_product_list.category_id = 	             
        singletitle_product_category_list.category_id AND singletitle_product_list.product_status = '1'")
        ->pipe(new Sort(array(
            "ID"=>"desc"
        )))
        ->pipe($this->dataStore('sales'));
    }
}
?>