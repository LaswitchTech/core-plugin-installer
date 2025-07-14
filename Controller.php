<?php

// Import additionnal class into the global namespace
use \LaswitchTech\Core\Abstracts\Controller;

class InstallerController extends Controller {

    /**
     * Constructor
     */
    public function __construct()
    {

        // Call Parent Constructor
        parent::__construct();

        // Retrieve the namespace
        $namespace = $this->Request->getNamespace();

        // Set Properties
        switch($namespace){
            case "/installer/index":
                $this->Public = true;
                $this->Level = 0;
                break;
        }
    }

    /**
     * Get application status, requirements, and configuration
     *
     * @return mixed
     */
    public function indexAction(): mixed
    {
        // Return
        return $this->Config->get('requirement');
    }
}
