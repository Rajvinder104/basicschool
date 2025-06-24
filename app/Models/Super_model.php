<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Super_model extends Model
{
    /************************* add ******************************* */
    public function add($table, $data)
    {
        $query = DB::table($table)
            ->insert($data);
        return $query;
    }
    public function get_records($table, $where, $select)
    {
        $query = DB::table($table)
            ->select(DB::raw($select))
            ->where($where)
            ->get()->toArray();
        return $query ? (array)$query : [];
    }
}
