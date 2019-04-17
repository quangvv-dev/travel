<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    protected $table = 'taxonomy';
    protected $guarded = ['id'];

    /**
     * Cut string data name
     *
     * @param $name
     *
     * @return mixed
     */
    public function getNameAttribute($name)
    {
        $location = ['Thành phố ', 'Tỉnh ', 'Quận ', 'Huyện ', 'Thị xã '];
        foreach ($location as $key => $value) {
            if (strpos($name, $value) !== false) {
                return str_replace($value, '', $name);
            }
        }
        return $name;
    }
}
