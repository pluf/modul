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
        Pluf::start(
                array(
                        array(
                                'general_domain' => 'localhost',
                                'general_admin_email' => array(
                                        'root@local'
                                ),
                                'installed_apps' => array(
                                        'Pluf',
                                        'User',
                                        'Group',
                                        'Role',
                                        'Tenant',
                                        'CMS',
                                        'Bank',
                                        'Config',
                                        'Setting',
                                        'Spa',
                                        'Calendar',
                                        'Monitor',
                                        'SDP',
                                        'Message',
                                        'Book',
                                        'Backup'
                                ),
                                'middleware_classes' => array(
                                        'Pluf_Middleware_Session',
                                        'Pluf_Middleware_Translation',
                                        'Pluf_Middleware_TenantEmpty',
                                        'Pluf_Middleware_TenantFromHeader',
                                        'Pluf_Middleware_TenantFromDomain',
                                        'Pluf_Middleware_TenantFromConfig',
                                        'Seo_Middleware_Spa',
                                        'Pluf_Middleware_Api'
                                ),
                                'debug' => true,
                                'languages' => array(
                                        'fa',
                                        'en'
                                ),
                                'tmp_folder' => '/var/tmp',
                                'time_zone' => 'Europe/Berlin',
                                'encoding' => 'UTF-8',
                                'secret_key' => '25e4fdda2042ccc495970302580f5ed2',
                                'user_signup_active' => true,
                                'user_avatra_max_size' => 2097152,
                                'auth_backends' => array(
                                        'Pluf_Auth_ModelBackend'
                                ),
                                'pluf_use_rowpermission' => true,
                                'db_engine' => 'MySQL',
                                'db_version' => '5.5.33',
                                'db_login' => 'root',
                                'db_password' => '',
                                'db_server' => 'localhost',
                                'db_database' => 'test',
                                'db_table_prefix' => '',
                                'mail_backend' => 'mail',
                                'tenant_default' => 'www',
                                'multitenant' => true,
                                'bank_debug' => true
                        )
                ));
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
        $_SERVER['REQUEST_TIME'] = time();
        $query = '';
        
        $view = new Module_Views();
        $this->assertTrue(isset($view));
        
        $request = new Pluf_HTTP_Request($query);
        $request->REQUEST['packages'] = array(
                'Todo'
        );
        $match = array();
        $view->install($request, $match);
    }

    /**
     * Check class api
     *
     * @test
     */
    public function methods ()
    {
        // $object = new Workflow_Machine();
        // $method_names = array(
        // 'transact',
        // 'setStates',
        // 'setSignals',
        // 'setInitialState',
        // 'setProperty'
        // );
        // foreach ($method_names as $method_name) {
        // $this->assertTrue(method_exists ($object , $method_name ));
        // }
    }
}