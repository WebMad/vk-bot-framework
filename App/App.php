<?php


namespace App;

/**
 * Class App
 * @package App
 */
class App
{
    /**
     * @var Bootstrap
     */
    private $bootstrap;

    /**
     * @var Response
     */
    private $response;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->bootstrap = new Bootstrap();
        $this->response = new Response();
    }

    /**
     *
     */
    public function start()
    {
        $this->bootstrap->init();
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}