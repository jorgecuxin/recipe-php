<?php
include 'inc/config.php';

$filter = ['status' => 'active'];
if (isset($_GET['status'])) {
    $filter['status'] = filter_input(
        INPUT_GET,
        'status',
        FILTER_SANITIZE_STRING
    );
}
$directory->selectListings($filter);

$title = "PHP Conferences";
require 'inc/header.php';
$test = new ListingPremium();
$test->setDescripcion('My descripcion');
var_dump($test);
var_dump(get_class($test));
var_dump(is_a($test, 'ListingBasic'));
var_dump($test->getStatus());

foreach ($directory->listings as $listing) {
    var_dump($listing);
    include 'views/list_item.php';
}

require 'inc/footer.php';
