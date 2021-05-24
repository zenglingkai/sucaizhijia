<?php

namespace App\Model\Admin;

use App\Model\BaseModel;

class AdminModel extends BaseModel
{
    protected $fillable = [
        'id',
        'username',
        'real_name',
        'password',
        'phone',
        'is_del',
        'add_time',
    ];
    protected $table = 'user_db.admin_tbl';  // 表名

    protected $is_del = true;

}
