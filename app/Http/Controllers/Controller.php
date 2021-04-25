<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //用户信息
    protected $user_info = [];

    protected $ignoreLogin = [];

    public function __construct()
    {
        //判断是否已经登录
        $this->is_login();
        $this->need_login();
    }


    public function is_login()
    {

    }


    protected function need_login()
    {
        $controller = Route::current()->getActionName();
        list($class, $method) = explode('@', $controller);
        $controller = substr(strrchr($class, '\\'), 1);
        $action = Route::current()->getActionMethod();

        if ($this->ignoreLogin) {
            if (!isset($this->ignoreLogin[$controller])) {
                return true;
            } elseif ($this->ignoreLogin[$controller] && !in_array($action, $this->ignoreLogin[$controller])) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }
}
