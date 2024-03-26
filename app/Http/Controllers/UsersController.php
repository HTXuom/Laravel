<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    private $users;
    const _PER_PAGE =4;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function index(Request $request)

    {

        $statement = $this->users->statementUser("DELETE FROM users");
        dd($statement);

        $title = "Danh sách người dùng";

        //$this->users->learnQueryBuilder();
        $filters = [];

        $keywords =null;
        if (!empty($request->group_id)) {
            $groupId= $request->group_id;

            $filters[] = ['users.group_id', '=', $groupId];
        }
        if (!empty($request->keywords)) {
            $keywords = $request->keywords;

            // $filters[] = ['users.group_id', '=', $groupId];
        }

    //    XỬ LÝ LOGIC SẮP XẾP 

     $sortBy = $request->input('sort-by');
     $sortType = $request->input('sort-type');
      $allowSort = ['asc','desc'];
      if(!empty($sortType)&& in_array($sortType,$allowSort)){
        if($sortType=='desc'){
            $sortType='asc';

        }else{
            $sortType ='desc';

        }
      }else{
        $sortType='asc';

      }
      $sortArr =[
        'sortBy'=>$sortBy,
        'sortType'=>$$sortType
      ];

        $usersList = $this->users->getAllUsers($filters, $keywords, $sortArr, self:: _PER_PAGE);
        return view('clients.users.lists', compact('title', 'usersList','sortType'));
    }


    public function add()
    {
        $title = 'Thêm người dùng';


        $allGroups = getAllGroups();
        return view('clients.users.add', compact('title', 'allGroups'));
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users'
            'group_id' => ['required',function ($attribute,$value,$fail){
                 if($value=0){
                    $fail('bắt buộc phải chọn');
                 }
            }],
            'status'=>'required|integer'
        ], [
            'fullname.required' => 'Họ và tên bắt buộc nhập.',
            'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên.',
            'email.required' => 'Email bắt buộc phải nhập.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại trên hệ thống.',
            'group_id.required' => 'Nhóm không được để trống ',
            'group_id.integer' => 'Nhóm không hơp lệ.',
             'status.required' => 'Tình trạng không được để trống .',
            'status.integer' => 'Tình trạng hơp lệ.'
        ]);
        

        $dataInsert = [
            'fullname'=>$request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status ' => $request->status,
            'create_id'=>date('Y-m-d H:i:s')
        ];

        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công.');
    }
    public function getEdit(Request $request, $id = 0)
    {
        $title = "Cập nhật người dùng";
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $request->session()->put('id' . $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msg', 'người dùng không cập nhật');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }
        return view('clients.users.edit', compact('title', 'userDetail'));
    }
    public function postEdit(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request->validation([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . $id
        ], [
            'fullname.required' => 'Họ và tên bắt buộc nhập.',
            'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên.',
            'email.required' => 'Email bắt buộc phải nhập.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại trên hệ thống.'

        ]);
        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate, $id);
        return back()->with('msg', 'Cập nhật thành công');
    }

    public function delete($id = 0)
    {
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'xóa người dùng thành công';
                } else {
                    $msg = 'Bạn không thể xóa người dùng  ngày lúc này.Vui lòng thử lại ';
                }
            } else {
                $msg = 'người dùng không tôn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('users.index')->with('msg', $msg);
    }
}
