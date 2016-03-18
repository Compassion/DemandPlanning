<?php

    include("classes/Class_DemandPlanning.php");
    include("classes/config.php");

    //var_dump($_POST);
    if(isset($_POST['load'])) {
        $DemandPlanning = new DemandPlanning;
        echo $DemandPlanning->loadJSON();
        
        $DemandPlanning->displayMessages();
        
        
    } elseif(isset($_POST['save'])) {
        $DemandPlanning = new DemandPlanning;
        $DemandPlanning->saveJSON($_POST['save']);
        
        $DemandPlanning->displayMessages();
        
        
    } elseif(isset($_POST['submit'])) {
        $DemandPlanning = new DemandPlanning;
        $DemandPlanning->submitToGMC();
        
        
    } else {
        
        include("views/view_main.php");
        
    }
    
    

    