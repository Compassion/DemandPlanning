<?php
/*Configuration Settings*/

define('ENVIRONMENT', 'test');
/*
    Set your partner id.
*/
define('PARTNER_ID', 'AU');


define('API_KEY', 'this-is-a-key');
    
$test = 'https://api2.compassion.com/test/ci/v2/am/demandplanning?api_key=' .API_KEY;
$staging = 'https://api2.compassion.com/stage/ci/v2/am/demandplanning?api_key=' .API_KEY;
$production = 'https://api2.compassion.com/ci/v2/am/demandplanning?api_key=' .API_KEY;


switch(ENVIRONMENT) {
        
    case 'production' :
        define('REST_URL', $production);
        break;
        
    case 'staging' :
        define('REST_URL', $staging);
        break;
        
    default :
        define('REST_URL', $test);

    }
    
?>