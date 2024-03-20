<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB; // Add this use statement for the DB facade

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC'); // Corrected 'create_at' to 'created_at'
        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (name,email,created_at) VALUES (?, ?, ?)', $data); // Corrected 'create_at' to 'created_at' and 'value' to 'VALUES'
    }
    public function getDetail($id){
       return  DB::select('SELECT *FROM'.$this->table.'WHERE id =? ',[$id]);
    }
    public function updateUser($data,$id){
        $data []= $id;
        return DB:: update('UPDATE ' . $this->table . 'SET fullname=?,email=?.update_at id =? '.$id);
    }
    public function deleteUser($id){
        return DB::delete("DELETE  FROM  $this->table WHERE id=? ".[$id]); 
    }
        public function statementUser ($sql){
         return DB::statement($sql);
        }

        public function learnQueryBuilder(){
            //LẤY TẤT CẢ BẢN GHI CỦA TABLE 
            DB::enableQueryLog();
            // $id=20;
          
            //     ->where('id',18)

            //     ->where(function($query) use ($id){
            //     $query->where('id','<',$id)->orWhere('id','<',$id);
            //     } )
            //    ->where('fullname','like','%thi xuom%')
            //     ->whereBetween('id',[18,2O])
            //     ->whereNotIn('id',[18,2O])
            // ->whereNotNull('update_at')
            //->whereYear('update_at','2022')
            //->whereColum('update_at','<>','update_at')
            //join bang
             $lists = DB::table($this->table)->select('users.*', 'group.name as group_name', 'id')
             ->right_Join('groups','users.group_id','=','groups.id')
            ->get();
            //->tosql();
              dd($lists);
            $sql = DB::enableQueryLog();
            dd($sql);
            //LẤY 1 BẢN GHI ĐẦU TIÊN CỦA TABLE
               $detail = DB::table($this->table)->first();

        }

}
