<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommonModel extends Model
{
    protected $fillable = []; 
    public $timestamps = true;

    public function storeData($tableName, $data)
    {
        return DB::connection('mysql')->table($tableName)->insert($data);
    }
    public function updateData($tableName, $data, $conditions)
    {
        return DB::connection('mysql')->table($tableName)->where($conditions)->update($data);
    }
    public function viewData($tableName, $columns = ['*'], $conditions = [])
    {
        return DB::connection('mysql')->table($tableName)->select($columns)->where($conditions)->get();
    }
    public function deleteData($tableName, $conditions)
    {
        return DB::connection('mysql')->table($tableName)->where($conditions)->update(['status' => '0', 'is_deleted' => '1']);
    }
    public function getDataByID($tableName, $columns = ['*'], $conditions)
    {
        return DB::connection('mysql')->table($tableName)->select($columns)->where($conditions)->first();
    }
    public function getSingleData($tableName, $columns = ['*'], $conditions)
    {
        return DB::connection('mysql')->table($tableName)->select($columns)->where($conditions)->first();
    }
    use HasFactory;
}
