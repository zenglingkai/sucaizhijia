<?php

namespace App\Model\User;


use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user_db.user_tbl';

    /**
     * @param $username
     * @return array
     */
    public function getRow($username)
    {
        $return_arr = [];
        $query = $this->newQuery();
        $row = $query->where('username', '=', $username)->first();
        if ($row) {
            $return_arr = $row->toArray();
        }
        return $return_arr;
    }
}
