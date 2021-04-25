<?php

namespace App\Model\Admin;

use App\Model\BaseModel;

class AdminModel extends BaseModel
{
    protected $table = 'user_tbl.admin_tbl';  // 表名

    protected $is_del = true;
}
