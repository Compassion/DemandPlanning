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
        return true;
    }
    public function saveJSON()
    {
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