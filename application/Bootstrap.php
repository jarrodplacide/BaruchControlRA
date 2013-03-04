<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initDoctrine() {
        require_once 'Doctrine.php';
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $autoLoader->pushAutoloader(array('Doctrine', 'autoload'));
        $doctrineConfig = $this->getOption('doctrine');
        $doctrineManager = Doctrine_Manager::getInstance();

        //Establish Doctrine Settings
        $doctrineManager->setAttribute(Doctrine::ATTR_MODEL_LOADING, Doctrine::MODEL_LOADING_CONSERVATIVE);
        $doctrineManager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, TRUE);
        $doctrineManager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine_Core::VALIDATE_ALL);
        $doctrineManager->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, TRUE);
        $doctrineManager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, TRUE);
        $doctrineManager->setAttribute(Doctrine_Core::ATTR_AUTO_FREE_QUERY_OBJECTS, TRUE);
        $doctrineManager->setAttribute(Doctrine_Core::ATTR_QUERY_LIMIT, Doctrine_Core::LIMIT_RECORDS);

        //Establish Connection
        $doctrineManager->openConnection($doctrineConfig['connection_string']);
        $doctrineManager->connection()->setCharset('utf8');

        return $doctrineManager;
    }

    protected function _initDoctype() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
    
    protected function _initAutoload() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
            'basePath' => APPLICATION_PATH,
            'namespace' => '',
            'resourceTypes' => array(
                'service' => array(
                    'path' => 'services/',
                    'namespace' => 'Service_'
                ),
                'basecontroller' => array(
                    'path' => 'controllers/Base/',
                    'namespace' => 'Base_'
                ),
                'model' => array(
                    'path' => 'models/',
                    'namespace'=> 'Model_'
                )
            )
        ));
    }
    
    
}