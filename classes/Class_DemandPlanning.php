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
        $this->generateFileName();
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
        
        //$string = file_get_contents("json/template.json");
        //var_dump(json_decode($string));
        
        // Check for the most recently modifed file
        $path = "json"; 

        $latest_mtime = 0;
        $latest_filename = '';    

        $d = dir($path);
        while (false !== ($entry = $d->read())) {
          $filepath = "{$path}/{$entry}";
          // could do also other checks than just checking whether the entry is a file
          if (is_file($filepath) && filemtime($filepath) > $latest_mtime) {
            $latest_mtime = filemtime($filepath);
            $latest_filename = $entry;
          }
        }
        
        $filePath = 'json/' .$latest_filename;
        
        $file = fopen($filePath, 'r') or die($this->errors[] = "<strong>Unable to open file.</strong> Failure...");
        
        $loadedData = fread($file, filesize($filePath));
        fclose($file);
        //var_dump($latest_filename);
        //var_dump(date('Y-m-d h:m:s', $latest_mtime));
        
        //var_dump(readdir (resource 'json'));
        
        
        //$filePath = 'json/' .$this->recentFileName;
        //if(file_exists($filePath)) {
        //    
        //} 
        
        //var_dump($loadedData);
        $resp = new stdClass();
        $resp->data = $loadedData;
        $resp->msg = '<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Succesfully loaded file.</strong> Loaded '.$latest_filename.'</div>';
        
        return json_encode($resp);
    }
    
    public function saveJSON($data)
    {
        $filePath = 'json/' .$this->recentFileName;
        //var_dump($this->recentFileName);
        
        //if(file_exists($filePath)) {
            
            $file = fopen($filePath, 'w') or die($this->errors[] = "<strong>Unable to open file.</strong>");
            fwrite($file, $data);
            fclose($file);
            
            $this->messages[] = "<strong>File updated successfully.</strong>";
            return true;

            $file = fopen($filePath, 'w') or die($this->errors[] = "<strong>Unable to open file.</strong> Failure...");
            fwrite($file, $data);
            fclose($file);
            
            $this->messages[] = "<strong>File updated</strong> Everything is good.";
            return true;        
    }
    
    public function submitToGMC()
    {
        return true;
    }
    
    // Basic helper function which spits out any of the status or error messages.
    public function displayMessages()
    {
        $alertTopDanger = '<div class="mdl-js-snackbar mdl-snackbar" id="message"><div class="mdl-snackbar__text">';

        $alertTopSuccess = '<div class="mdl-js-snackbar mdl-snackbar" id="message"><div class="mdl-snackbar__text">';

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