<?php

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. Lấy danh sách người dùng theo Alphabet (A-Z)
    public function getUsersSorted()
    {
        return User::orderBy('user_name', 'asc')->get();
    }

    // 2. Lấy 07 người dùng theo Alphabet (A-Z)
    public function getSevenUsers()
    {
        return User::orderBy('user_name', 'asc')->limit(7)->get();
    }

    // 3. Lấy danh sách người dùng có chữ 'a' trong tên
    public function getUsersWithA()
    {
        return User::where('user_name', 'like', '%a%')->orderBy('user_name', 'asc')->get();
    }

    // 4. Lấy danh sách người dùng có tên bắt đầu bằng chữ 'm'
    public function getUsersStartWithM()
    {
        return User::where('user_name', 'like', 'm%')->get();
    }

    // 5. Lấy danh sách người dùng có tên kết thúc bằng chữ 'i'
    public function getUsersEndWithI()
    {
        return User::where('user_name', 'like', '%i')->get();
    }

    // 6. Lấy danh sách người dùng có email Gmail
    public function getUsersWithGmail()
    {
        return User::where('user_email', 'like', '%@gmail.com')->get();
    }

    // 7. Lấy danh sách người dùng có email Gmail và tên bắt đầu bằng 'm'
    public function getUsersGmailStartM()
    {
        return User::where('user_email', 'like', '%@gmail.com')
                    ->where('user_name', 'like', 'm%')
                    ->get();
    }

    // 8. Lấy danh sách người dùng có email Gmail, tên chứa 'i' và dài hơn 5 ký tự
    public function getUsersGmailWithI()
    {
        return User::where('user_email', 'like', '%@gmail.com')
                    ->where('user_name', 'like', '%i%')
                    ->whereRaw('LENGTH(user_name) > 5')
                    ->get();
    }
}
