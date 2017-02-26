<?php
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{

    /**
     * @beforeClass
     */
    public static function setPlfu ()
    {
        require_once 'Pluf.php';
    }

    /**
     * Can create new instance
     * 
     * @test
     */
    public function instance ()
    {
        /*
         * XXX: maso, 2017: Add Pluf_HTTP_Request mock object
         * 
         * In test, Pluf_HTTP_Request mock object is necessary.
         */
        // init request
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';
        $_SERVER['REMOTE_ADDR'] = '';
        $_SERVER['HTTP_HOST'] = 'localhost';
        $GLOBALS['_PX_uniqid'] = 'test';
        $_SERVER['REQUEST_TIME'] = time();
        $query = '';
        
        $view = new Modul_Views();
        $this->assertTrue(isset($view));

        $request = new Pluf_HTTP_Request($query);
        $match = array();
        $view->test($request, $match);
    }

    /**
     * Check class api
     * 
     * @test
     */
    public function methods ()
    {
//         $object = new Workflow_Machine();
//         $method_names = array(
//                 'transact',
//                 'setStates',
//                 'setSignals',
//                 'setInitialState',
//                 'setProperty'
//         );
//         foreach ($method_names as $method_name) {
//             $this->assertTrue(method_exists ($object , $method_name ));
//         }
    }
}