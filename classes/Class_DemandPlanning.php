<?php

class DemandPlanning
{
    // Basic Class Setup
    public $errors = array();
    public $messages = array();
    
    // On init check post variables and then submit request
    public function __construct()
    {
        // Create anything useful
    }
    public function loadJSON()
    {
        $string = file_get_contents("json/template.json");
        var_dump(json_decode($string));
        
        return true;
    }
    public function saveJSON(data)
    {
        
        $day = date('w');
        // Week start date - Sunday.
        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
        //$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
        
        $fileName = $week_start ."_" .PARTNER_ID ."_DemandPlanning.json";
        
        
        $file = 'json/' .$fileName;
        $contents = data;
        
        
        
        if(file_exists($file));
        
        
        
        
        //$puts = file_put_contents($file, $contents, FILE_USE_INCLUDE_PATH);
        return true;
    }
    public function submitToGMC()
    {
        return true;
    }
    
    
    // Basic helper function which spits out any of the status or error messages.
    public function displayMessages()
    {
        $alertTopDanger = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';

        $alertTopSuccess = '<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';

        $alertEnd = '</div>';
        $alertErrorEnd = '</div>';
        
        foreach ($this->errors as $error) {
            echo $alertTopDanger;
            echo $error;
            echo $alertErrorEnd;
        }

        foreach ($this->messages as $message) {
            echo $alertTopSuccess;
            echo $message;
            echo $alertEnd;
        }
    }
    
}