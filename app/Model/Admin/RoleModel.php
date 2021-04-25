<?php

namespace App\Model\Admin;

use App\Model\BaseModel;

class RoleModel extends BaseModel
{
    protected $table = 'user_tbl.roles_tbl';  // 表名

    protected $fillable = [
        'id',
        'name',
        'display'
    ];


}
