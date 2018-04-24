<?php
class frontController
{
    private $driver = [];
    private $path = '';

    /**
     * Undocumented function
     *
     * @param array $driver
     */
    function __construct(array $config)
    {
        for ($i = 0; $i < count($config); $i++) {
            array_push($this->driver, $config[$i][1]);
        }
        $tmp = count($this->driver) - 1;
        $this->path = $this->driver[$tmp];
        unset($this->driver[$tmp]);
        session_start();
        $_SESSION['driver'] = $this->driver;
    }

    public function run()
    {
//        $this->mainRequest();
        $this->url();
    }

    private function url()
    {
        $controller = explode("/", $_SERVER['PATH_INFO']);
        include $this->path . 'controller/' . $controller[1] . '/' . $controller[1] . 'Controller.php';
        $cont=$controller[1].'Controller';
        $ncontroller = new $cont;
        $ncontroller->main();
        unset($controller);
    }
    public function response(array $data, int $code, string $header=null)
    {
        http_response_code($code);
        header($header);
        echo json_encode($data);
    }
}