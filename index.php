<?php

    include("classes/Class_DemandPlanning.php");
    include("classes/config.php");


        $DemandPlanning = new DemandPlanning;
        $DemandPlanning->saveJSON();
        //$DemandPlanning->loadJSON();


    if(isset($_POST['load'])) {
        $DemandPlanning = new DemandPlanning;
        //$DemandPlanning->loadJSON();
        
    } elseif(isset($_POST['save'])) {
        $DemandPlanning = new DemandPlanning;
        //$DemandPlanning = $DemandPlanning->saveJSON($_POST);
        
        
    } elseif(isset($_POST['submit'])) {
        $DemandPlanning = new DemandPlanning;
        //$DemandPlanning = $DemandPlanning->submitToGMC();
        
    } else {
        
        include("views/view_main.php");
        
    }
    
    

    