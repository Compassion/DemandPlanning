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
        $this->recentFileName = $this->generateFileName();
    }
    
    private function generateFileName()
    {
        $day = date('w');
        // Week start date - Sunday.
        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
        //$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
        
        $this->recentFileName = $week_start ."_" .PARTNER_ID ."_DemandPlanning.json";
        
        return true;
    }
    
    public function loadJSON()
    {
        $string = file_get_contents("json/template.json");
        var_dump(json_decode($string));
        
        return true;
    }
    public function saveJSON(data)
    {
        
        
        $filePath = 'json/' .$this->recentFileName;
        $contents = data;
        
        
        
        if(file_exists($filePath)) {
            
            $asd = fopen("newfile.txt", "w") or die("Unable to open file!");
            $txt = "John Doe\n";
            fwrite($myfile, $txt);
            $txt = "Jane Doe\n";
            fwrite($myfile, $txt);
            fclose($myfile);
            
            
            
        } else {
            $puts = file_put_contents($file, $contents, FILE_USE_INCLUDE_PATH);
        }
        
        var_dump($puts);
        
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