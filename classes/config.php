<?php
/*Configuration Settings*/
/*
    Set the environment.
*/
define('ENVIRONMENT', 'test');

/*
    Set your partner id.
*/
define('PARTNER_ID', 'AU');

/*
    Set your API key.
*/
define('API_KEY', 'this-is-a-key');


/* 
    Build URLs  based on key and environment.
    Depending on future developments may need to make the endpoint URLs to be part of the config. That way this thing could push the data anywhere where it is needed.
*/
switch(ENVIRONMENT) {  
case 'production' :
    /* Production */
    $url = 'https://api2.compassion.com/ci/v2/am/demandplanning?api_key=' .API_KEY;
    break;

case 'staging' :
    /* Staging */
    $url = 'https://api2.compassion.com/stage/ci/v2/am/demandplanning?api_key=' .API_KEY;
    break;

default :
    /* TEST */
    $url = 'https://api2.compassion.com/test/ci/v2/am/demandplanning?api_key=' .API_KEY;;

}

define('REST_URL', $url);
?>