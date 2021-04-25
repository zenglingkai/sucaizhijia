<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    protected $is_del = false;
    /**
     * @param $where
     * @param $data
     * @return bool
     */
    public function updateWhere($where, $data):bool
    {
        if (empty($where)) return false;
        $query = $this->newQuery();
        $is_update = false;
        $update_data = [];
        foreach ($where as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $query->where($key, '=', $value);
                $is_update = true;
            }
        }

        foreach ($data as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $update_data[$key] = $value;
            }
        }
        if ($update_data && $is_update) {
            return $query->update($update_data)?true:false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function addAll($data):bool
    {
        $query = $this->newQuery();
        return $query->insert($data);
    }


    /**
     * @param $data
     * @return Builder|Model
     */
    public function createRow($data)
    {
        return $this->newQuery()->create($data);
    }

    /**
     * @param $data
     * @return Builder|Model
     */
    public function updateOrCreateData($data)
    {
        return $this->newQuery()->updateOrCreate($data);
    }

    /**
     * @return array
     */
    public function getAll()
    {

        if ($this->is_del){
            return $this->newQuery()->where('is_del', '=', 0)->get()->toArray();
        }else{
            return $this->newQuery()->get()->toArray();
        }

    }
}
