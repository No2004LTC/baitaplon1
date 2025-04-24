<?php
class App
{
    private $__controller, $__action, $__param;

    function __construct()
    {

        $this->__controller = 'thanhvien';
        $this->__action = 'list';
        $this->__param = [];
        $this->handleUrl();
    }

    //Xu ly url
    function handleUrl()
    {
        //lay url
        if (!empty($_SERVER['PATH_INFO']))
            $url = $_SERVER['PATH_INFO'];
        else $url = '/';
        $urlArr = array_values(array_filter(explode('/', $url)));
        // print_r($urlArr);
        //xu ly controller
        if (!empty($urlArr[0])) {
            $this->__controller = $urlArr[0];
        }
        if (file_exists('app/controllers/' . $this->__controller . '.php')) {
            require_once 'controllers/' . $this->__controller . '.php';
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
            } else loadError('404');
        } else loadError('404');

        //xu ly action
        if (!empty($urlArr[1]))
        {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }
        
        //xu ly param
        $this->__param = array_values($urlArr);

        //goi action
        if (method_exists($this->__controller, $this->__action))
            call_user_func_array([$this->__controller, $this->__action], $this->__param);
        else loadError('404');
    }
}
