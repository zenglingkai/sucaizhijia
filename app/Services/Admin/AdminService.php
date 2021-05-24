<?php

namespace App\Services\Admin;


use App\Model\Admin\AdminModel;

class AdminService
{

    public function getAdminList()
    {
        $AdminModel = new AdminModel();
        return $AdminModel->getAll();
    }

    public function addAdmin()
    {

    }
}
