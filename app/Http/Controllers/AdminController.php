<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('userLogin')) {
            return redirect('/admin/dashboard');
        } else {
            return view('admin/index');
        }
    }
 
    
    public function Authentication(Request $request) 
    {
       
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $credentials    = $request->only('email', 'password');
        $email          = $request->post('email');
       
        if (Auth::attempt($credentials)) {
            $records = Auth::user();
            if ($records && ($records->isActive()) == true) {
                $userData = [
                    'id'            => $records->id,
                    'employee_id'   => $records->employee_id,
                    'name'          => $records->name,
                    'email'         => $records->email,
                    'role'          => $records->role_id,
                    'permission_id' => explode(',',$records->accessed_id),
                ];
                
                $request->session()->put('userLogin', true);
                $request->session()->put('userData', $userData);
                $permission = $this->userHasPermission($userData);
                
                $request->session()->put(["permissions" => $permission]);
                return redirect('/admin/dashboard');
            }
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    private function userHasPermission($session_data)
    {
        
        $user_data      = User::find($session_data['id']);
        $user_roles     = explode(',',$user_data['role_id']);
        $permission     = explode(',', $user_data['accessed_id']);
        $rolesArray     = DB::connection('mysql')->table('tbl_role_master')->where('id', $user_roles)->get();
        $assigne_module = explode(',', $rolesArray[0]->module_ids);
        $modulesArray   = '';
        if(count($assigne_module) > 0) {
            if($assigne_module[0] == 'all' || $assigne_module[0] == 'All') {
                $modulesArray = DB::connection('mysql')->table('tbl_modules_master')->get();
            } else {
                $modulesArray = DB::connection('mysql')->table('tbl_modules_master')->whereIn('id', $assigne_module)->get();
            }
            return $modulesArray;
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('permissions');
        $request->session()->forget('userData');
        $request->session()->forget('userLogin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }
}
