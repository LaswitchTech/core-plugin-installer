<?php

/**
 * Core Framework - InstallerEndpoint
 *
 * @license    MIT (https://mit-license.org/)
 * @author     Louis Ouellet <louis@laswitchtech.com>
 */

// Import additionnal class into the global namespace
use \LaswitchTech\Core\Abstracts\Endpoint;

class InstallerEndpoint extends Endpoint {

    /**
     * Constructor
     */
    public function __construct()
    {

        // Call Parent Constructor
        parent::__construct();

        // Retrieve the namespace
        $namespace = $this->Request->getNamespace();

        // Set Scope
        $this->Public = !$this->Config->get('application', 'installed');

        // Set Properties
        switch($namespace){
            case "/installer/install":
                $this->Level = 1;
                break;
            case "/installer/status":
            case "/installer/on":
            case "/installer/off":
                $this->Level = ($this->Auth->isAuthorized('Developer',1)) ? 1 : 5;
                break;
        }
    }

    /**
     * Install the Application
     *
     * @return array
     */
    public function installAction(): array
    {
        // Import Global Variables
        global $CSRF;

        // Set the default message
        $message = ["status" => 200, "message" => "OK", "data" => []];

        // Check the request method
        if($this->Request->getMethod() == "POST"){
            $message["data"]["CSRF"] = [
                "token" => $CSRF->token(),
                "key" => $CSRF->key()
            ];
        }

        // Check if the Note is accessible
        if($message['status'] == 200){

            // Check the request method
            if($this->Request->getMethod() == "POST"){

                // Retrieve the data
                $data = $this->Request->getParams('REQUEST');

                // Unset the CSRF
                if(isset($data[$CSRF->key()])){
                    unset($data[$CSRF->key()]);
                }

                // Identify the module
                $module = strtoupper($data['module']) ?? null;

                // Check if the module is set
                if($module){

                    // Unset the module
                    unset($data['module']);

                    // Set the data for debugging
                    $message['data']['request'] = $data;

                    // Import the Module
                    global ${$module};

                    // Check if the module is installed
                    if(!is_null(${$module})){

                        // Check if the module is initialized
                        if(!in_array(get_class(${$module}),["Module","LaswitchTech\Core\Module"])){

                            // Check if the module has an install method
                            if(method_exists(${$module},'install')){

                                // Install the module
                                $statuses = ${$module}->install($data);

                                // Initialized status
                                $status = true;

                                // Initialize the error message
                                $error = null;

                                // check if the statuses is an array
                                if(is_array($statuses)){

                                    // Check if the array is empty
                                    if(empty($statuses)){
                                        $status = false;
                                    }

                                    // Loop through the statuses
                                    foreach($statuses as $key => $value){
                                        if(is_bool($value)){
                                            $status = $status && $value;
                                        } else {
                                            $error = $value;
                                            $status = false;
                                        }
                                        if(!$status){
                                            break;
                                        }
                                    }
                                } else {

                                    // Check if the statuses is a boolean
                                    if(is_bool($statuses)){
                                        $status = $statuses;
                                    } else {
                                        $error = $value;
                                        $status = false;
                                    }
                                }

                                // Check if the module installed without errors
                                if($status){
                                    $message['data']['status'] = $statuses;
                                } else {
                                    $message = ["status" => 400, "message" => "Bad Request", "data" => "The module [".$module."] could not be installed due to ".$error."."];
                                }
                            } else {
                                $message = ["status" => 400, "message" => "Bad Request", "data" => "The module [".$module."] does not have an install method."];
                            }
                        } else {
                            $message = ["status" => 400, "message" => "Bad Request", "data" => "The module [".$module."] is not initialized."];
                        }
                    } else {
                        $message = ["status" => 400, "message" => "Bad Request", "data" => "The module [".$module."] is not installed."];
                    }
                } else {
                    $message = ["status" => 400, "message" => "Bad Request", "data" => "The request cannot be fulfilled due to missing or invalid data."];
                }
            } else {
                $message = ["status" => 405, "message" => "Method Not Allowed", "data" => "The method is not allowed for the requested URL."];
            }
        }

        // Return the message
        return $message;
    }

    /**
     * Enable installer
     */
    public function onAction()
    {
        // Set the default message
        $message = ["status" => 200, "message" => "OK", "data" => []];

        // Check if the status is still OK
        if($message['status'] == 200){

            // Check the request method
            if($this->Request->getMethod() == "GET"){

                // Set maintenance mode
                $this->Config->set('application', 'installed', true);

                // Set the message data
                $message["data"]["status"] = $this->Config->get('application', 'installed');

                // Set the message
                if($message["data"]["status"]){
                    $message["data"]["message"] = "Maintenance mode is now on";
                } else {

                    // Set an error message
                    $message = ["status" => 500, "message" => "Internal Server Error", "data" => "Unable to set maintenance mode"];
                }
            } else {

                // Set an error message
                $message = ["status" => 405, "message" => "Method Not Allowed", "data" => "Invalid Request"];
            }
        }

        // Return the message
        return $message;
    }

    /**
     * Disable installer
     */
    public function offAction()
    {
        // Set the default message
        $message = ["status" => 200, "message" => "OK", "data" => []];

        // Check if the status is still OK
        if($message['status'] == 200){

            // Check the request method
            if($this->Request->getMethod() == "GET"){

                // Set maintenance mode
                $this->Config->set('application', 'installed', false);

                // Set the message data
                $message["data"]["status"] = $this->Config->get('application', 'installed');

                // Set the message
                if(!$message["data"]["status"]){
                    $message["data"]["message"] = "Maintenance mode is now off";
                } else {

                    // Set an error message
                    $message = ["status" => 500, "message" => "Internal Server Error", "data" => "Unable to set maintenance mode"];
                }
            } else {

                // Set an error message
                $message = ["status" => 405, "message" => "Method Not Allowed", "data" => "Invalid Request"];
            }
        }

        // Return the message
        return $message;
    }

    /**
     * Check installer
     */
    public function statusAction()
    {
        // Set the default message
        $message = ["status" => 200, "message" => "OK", "data" => []];

        // Check if the status is still OK
        if($message['status'] == 200){

            // Check the request method
            if($this->Request->getMethod() == "GET"){

                // Set the message data
                $message["data"]["status"] = $this->Config->get('application', 'installed');

                // Set the message
                if($message["data"]["status"]){
                    $message["data"]["message"] = "Maintenance mode is now on";
                } else {
                    $message["data"]["message"] = "Maintenance mode is now off";
                }
            } else {

                // Set an error message
                $message = ["status" => 405, "message" => "Method Not Allowed", "data" => "Invalid Request"];
            }
        }

        // Return the message
        return $message;
    }
}
