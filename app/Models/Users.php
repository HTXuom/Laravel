<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB; // Add this use statement for the DB facade

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers($filters =[],$keywords=null,$sortByArr =null)
    {
        // $users = DB::select('SELECT * FROM users ORDER BY created_at DESC'); // Corrected 'create_at' to 'created_at'
        DB::enableQueryLog();
        $users = DB::table($this->table)
        ->select('users.*','group.name as group_name')
        ->join('groups','users.group_id','=','group.id')
       
        $sortByArr ='users.create_at';
        $orderType ='desc';



        
        if (!empty($sortByArr) && is_array($sortByArr)) {
            if(!empty($sortByArr['sostBy']) && !empty($sortByArr['sortType'])){
                $sortByArr=trim($sortByArr['sortBy']);
                $orderType = trim($sortByArr['sortType']);
            }
        }


        $users =$users->orderBy($orderBy, $sortType);
        

        if(!empty($filters)){
            $users = $users->where($filters);
        }
        if(!empty($keywords)){
      
            $users = $users->where(function($query)use($keywords){
                $query->orwhere('fullname','like','%'.$keywords.'%');
                $query->orwhere('email', 'like', '%' . $keywords . '%');
            });
        }
        //$users =$users->get();
       // $sql = DB::enableQueryLog();
        //dd($sql);
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
             //$lists = DB::table('users')
             
             //->select('users.*', 'group.name as group_name', 'id')
            //  ->right_Join('groups','users.group_id','=','groups.id')
            //  ->orderBy('id','desc')
            //  ->orderBy('create_at', 'asc')
            //  ->inRandomOrder()
            //  ->select(DB::raw('count(id)as email_count','email','fullname')
            //  ->groupBy('email')
            // ->groupBy('fullname')
            // ->having('email_count','>=',2)
            // ->limit(2)
            // ->offset(2)
            // ->take(2)
            // ->skip(2)
            // ->get();
            //->tosql();
              //dd($lists);

        // DB::table('users')->insert([
        //     'fullname'=>'Nguyễn văn A',
        //     'email'=>'xuomho25@.com',
        //     'group_id'=>1
        //     'create_at'=> date('y-m-d H:i:s')
        // ]);
         
        // dd($lastId);

        // $status =DB::table('users')
        // ->where('id',29)
        // ->update([
        //     'fullname'=>'Nguyên văn B',
        //     'email'=>'xuho25@.com',
        //     'update'=>date('y-m-d H:i:s')
        // ]);

        // $status= DB::table('users')
        // ->where('id',20)
        // ->delete();

        //Điểm sô ban ghi 

        $count =DB::table('users')->where('id','>',20)->count();
        // $count =count{$lists};
        // dd($count);
        // ->selectRaw('email,fullname,count{id} as email_count')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->where(DB:raw(id>20))
        // ->where('id','>',20)
        // ->orwhere('id > 20')
        // ->orderByRaw('create_at DESC,update_at ASC')
        // ->groupByRaw('email,fullname')
        // ->having('email_count','>=',2)
        // ->havingRaw('count(id)>?',(2))
        // ->where(
        //     'group_id',
        //     'm',
        //     function ($query){
        //         $query->select('id')
        //         ->from('groups')
        //         ->where('name','m','administrator');
        //     }
        // )
         //->selectRaw('email,(SELECT count(id) FROM 'groups') as group_count'))

         //->selectRaw('email,(SELECT count(id) FROM 'groups') as group_count')
            

        //->get();

            $sql = DB::enableQueryLog();
            dd($sql);
            //LẤY 1 BẢN GHI ĐẦU TIÊN CỦA TABLE
               $detail = DB::table($this->table)->first();

        }

}
