<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdvanceSettingController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }
    /**Module Page */
    public function Module () {
        $tableName              = 'tbl_modules_master';
        $data['moduleslist']    = $this->commonModel->viewData($tableName, '*', ['status' => 1, 'is_deleted' => 0]);
        return view('admin.advancesetting.module', $data);
    }
    public function ManageModule(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                           = decrypt($id);
            $tableName                      = 'tbl_modules_master';
            $result                         = $this->commonModel->getDataByID($tableName,"*", ["id" => $d_id]); 
            $data['id']                     = $result->id;
            $data['module_name']            = $result->module_name;
            $data['display_name']           = $result->display_name;
            $data['is_visible_configsetup'] = $result->is_visible_configsetup;
            $data['setup_type']             = $result->setup_type;
            $data['display_icon']           = $result->display_icon;
            $data['display_order']          = $result->display_order;
            $data['status']                 = $result->status;
        } else {
            $data['id']                     = '';
            $data['module_name']            = '';
            $data['display_name']           = '';
            $data['is_visible_configsetup'] = '';
            $data['setup_type']             = '';
            $data['display_icon']           = '';
            $data['display_order']          = '';
            $data['status']                 = '';
        }
        return view('admin.advancesetting.manage_module', $data);
    }
    public function addModules(Request $request)
    {
      
        $request->validate([
            'display_name'              => ['required', Rule::unique('mysql.tbl_modules_master')->ignore($request->post('id')), 'max:255'],
            'module_name'               => ['required',Rule::unique('mysql.tbl_modules_master')->ignore($request->post('id'))],
            'display_icon'              => 'required',
            'display_order'             => 'required',
            'is_visible_configsetup'    => 'required',
            'setup_type'                => 'required',
            'status'                    => 'required'
        ],
        [
            'display_name.required'     => 'The display name field is required.',
            'display_name.unique'       => 'The display name has already been taken.',
            'display_name.max'          => 'The display name may not be greater than :max characters.',
            'module_name.required'      => 'The module name field is required.',
            'module_name.unique'        => 'The module name has already been taken.',
            'display_icon'              => 'The display icon is required.',
            'display_order.required'    => 'The display order field is required.',
            'is_visible_configsetup.*'  => 'Please select at least one option.',
            'setup_type.*'              => 'Please select setup type.',
            'status.*'                  => 'Status is required.'
        ]);
        $tableName = 'tbl_modules_master';
        if($request->post('id') > 0) {
            unset($request['0']); 
            unset($request['_token']); 
            unset($request['addmodule']);
            $updated_id   = $this->commonModel->updateData($tableName, $request->input(), ['id' => $request->post('id')]);
            if($updated_id != "") {
                Session::flash('success', __('Module Updated Successfully'));
                return redirect('admin/advancesetting/module');
            } else {
                Session::flash('error', __('Module Updation Failed'));
                return back()->withInput();
            }
        } else {
            $data = [
                "display_name"              => $request->input("display_name"),
                "module_name"               => strtolower($request->input("module_name")),
                "display_icon"              => $request->input("display_icon"),
                "display_order"             => $request->input("display_order"),
                "is_visible_configsetup"    => $request->input("is_visible_configsetup"),
                "setup_type"                => $request->input("setup_type"),
                "status"                    => $request->input("status"),
                "is_deleted"                => 0
            ];
            $insertedId = $this->commonModel->storeData($tableName, $data);
            if ($insertedId != "") {
                Session::flash('success', __('Module Added Successfully'));
                return redirect('admin/advancesetting/module');
            } else {
                Session::flash('error', __('Module Addition Failed'));
                return back()->withInput();
            }
        }
    }
    public function deletemodule(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_modules_master';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Module Deleted Successfully'));
            return redirect('admin/advancesetting/module');
        } else {
            Session::flash('success', __('Module Deletion Failed'));
            return back()->withInput();
        }
    }
    /**Manage Roles */
    public function Role () {
        $data['moduleArray']    = $this->commonModel->viewData("tbl_modules_master", '*', ['status' => '1', 'is_deleted' => '0']);
        $data['roleslist']      = $this->commonModel->viewData("tbl_role_master", '*', ['status' => '1', 'is_deleted' => '0']);
        return view('admin.advancesetting.role', $data);
    }
    public function ManageRole(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                   = decrypt($id);
            $result                 = $this->commonModel->getDataByID("tbl_role_master","*", ["id" => $d_id]); 
            $data['id']             = $result->id;
            $data['role_name']      = $result->role_name;
            $data['module_ids']     = $result->module_ids;
            $data['status']         = $result->status;
            $data['sd']             = $sd = $this->commonModel->getDataByID('tbl_role_master','*', array('id'=>$d_id));
        } else {
            $data['id']             = '';
            $data['role_name']      = '';
            $data['module_ids']     = '';
            $data['status']         = '';
            $data['sd']             = '';
        }
        $data['moduleArray']        = $this->commonModel->viewData("tbl_modules_master", '*', ['status' => 1, 'is_deleted' => 0]);
        return view('admin.advancesetting.manage_role', $data);
    }
    public function addRole(Request $request)
    {
        $request->validate([
            'role_name'     => ['required', Rule::unique('mysql.tbl_role_master')->ignore($request->post('id')), 'max:255'],
            'module_ids'    => 'required',
            'status'        => 'required',
        ],
        [
            'role_name.required'        => 'The Role name field is required.',
            'role_name.unique'          => 'The role name has already been taken.',
            'role_name.max'             => 'The role name may not be greater than :max characters.',
            'module_ids.required'       => 'The module name is required.',
            'status.*'                  => 'Status is required.'
        ]);
        $tableName = 'tbl_role_master';
        if($request->post('id') > 0) {
            unset($request['0']); 
            unset($request['_token']); 
            unset($request['addrole']);
            $updated_data = [
                "role_name"     => $request->input("role_name"),
                "module_ids"    => implode(',', $request->input('module_ids')),
                "status"        => $request->input("status"),
                "updated_at"    => date('Y-m-d H:i:s'),
            ];
            $updated_id   = $this->commonModel->updateData($tableName, $updated_data, ['id' => $request->post('id')]);
            if($updated_id != "") {
                Session::flash('success', __('Role Updated Successfully'));
                return redirect('admin/advancesetting/role');
            } else {
                Session::flash('error', __('Role Updation Failed'));
                return back()->withInput();
            }
        } else {
            unset($request['0']); 
            unset($request['_token']); 
            unset($request['addrole']);
            $data = [
                "role_name"     => $request->input("role_name"),
                "module_ids"    => implode(',', $request->input('module_ids')),
                "status"        => $request->input("status"),
                "created_at"    => date('Y-m-d H:i:s'),
            ];
            $insertedId = $this->commonModel->storeData($tableName, $data);
            if ($insertedId != "") {
                Session::flash('success', __('Role Added Successfully'));
                return redirect('admin/advancesetting/role');
            } else {
                Session::flash('error', __('Role Addition Failed'));
                return back()->withInput();
            }
        }
    }
    public function deleterole(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_role_master';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Role Deleted Successfully'));
            return redirect('admin/advancesetting/role');
        } else {
            Session::flash('success', __('Role Deletion Failed'));
            return back()->withInput();
        }
    }
    /*********************Manager User******************************/
    public function User()
    {
        $data['userdetails']    = $this->commonModel->viewData("users", '*', ['status' => '1', 'is_deleted' => '0']);
        $roles                  = DB::connection('mysql')->table('tbl_role_master')->pluck('role_name','id');
        foreach($data['userdetails'] as $user)
        {
            $user->role_id      = $roles[$user->role_id] ?? null;
        }
        return view('admin.advancesetting.user', $data);
    }
    public function ManageUser(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                   = decrypt($id);
            $result                 = $this->commonModel->getDataByID("users","*", ["id" => $d_id]); 
            $data['id']             = $result->id;
            $data['employee_id']    = $result->employee_id;
            $data['name']           = $result->name;
            $data['email']          = $result->email;
            $data['contact_no']     = $result->contact_no;
            $data['role_id']        = $result->role_id;
            $data['status']         = $result->status;
            $data['sd']             = $sd = $this->commonModel->getDataByID('users','*', array('id'=>$d_id));
            $data['access_id']      = explode(',', $sd->accessed_id);
        } else {
            $data['id']             = "";
            $data['employee_id']    = "";
            $data['name']           = "";
            $data['email']          = "";
            $data['contact_no']     = "";
            $data['role_id']        = "";
            $data['accessed_id']    = "";
            $data['status']         = "";
            $data['sd']             = "";
            $data['access_id']      = "";
        }
        $data['rolesArray']         = $this->commonModel->viewData("tbl_role_master", '*', ['status' => '1', 'is_deleted' => '0']);
        $data['userdetails']        = $this->commonModel->viewData("users", '*', ['status' => '1', 'is_deleted' => '0']);
        return view('admin.advancesetting.manage_user', $data);
    }
    public function addUser(Request $request)
    {   
        $request->validate([
            'employee_id'   => ['required', Rule::unique('mysql.users')->ignore($request->post('id')), 'max:10'],
            'name'          => 'required',
            'email'         => ['required', Rule::unique('mysql.users')->ignore($request->post('id')), 'max:60'],
            'password'      => ['required', 'min:6'],
            'contact_no'    => ['required', 'min:9', 'max:13'],
            'role_id'       => ['required'],
            'accessed_id'   => ['required'],
            'status'        => ['required']
        ],
        [
            'employee_id.required'      => 'The employee id field is required.',
            'employee_id.unique'        => 'The employee id has already been taken.',
            'employee_id.max'           => 'The employee id may not be greater than :max characters.',
            'name.required'             => 'The name is required.',
            'email.required'            => 'The email id field is required.',
            'email.unique'              => 'The email id has already been taken.',
            'email.max'                 => 'The email may not be greater than :max characters.',
            'password.required'         => 'The password is required.',
            'contact_no.required'       => 'The contact no is required.',
            'contact_no.min'            => 'The mobile number must be at least :min  digits.',
            'contact_no.max'            => 'The mobile number must be at least :max  digits.',
            'role_id.required'          => 'The role is required.',
            'accessed_id.required'      => 'The Accessed name is required.',
            'status.*'                  => 'The status is required.',
        ]);
        $tableName = 'users';
        if($request->post('id') > 0) {
            unset($request['0']); 
            unset($request['_token']); 
            unset($request['adduser']);
            $updated_data = [
                "employee_id"   => $request->input("employee_id"),
                "name"          => $request->input("name"),
                "email"         => $request->input("email"),
                "password"      => password_hash($request->input("password"), PASSWORD_DEFAULT),
                "contact_no"    => $request->input("contact_no"),
                "role_id"       => implode(',', $request->input('role_id')),
                "accessed_id"   => implode(',', $request->input('accessed_id')),
                "status"        => $request->input("status"),
                "updated_at"    => date('Y-m-d H:i:s'),
            ];
            $updated_id   = $this->commonModel->updateData($tableName, $updated_data, ['id' => $request->post('id')]);
            if($updated_id != "") {
                Session::flash('success', __('User Updated Successfully'));
                return redirect('admin/advancesetting/user');
            } else {
                Session::flash('error', __('User Updation Failed'));
                return back()->withInput();
            }
        } else {
            unset($request['0']); 
            unset($request['_token']); 
            unset($request['adduser']);
            $data = [
                "employee_id"   => $request->input("employee_id"),
                "name"          => $request->input("name"),
                "email"         => $request->input("email"),
                "password"      => password_hash(trim($request->input("password")), PASSWORD_BCRYPT),
                "contact_no"    => $request->input("contact_no"),
                "school_id"     => 1,
                "department_id" => 1,
                "role_id"       => implode(',', $request->input('role_id')),
                "accessed_id"   => implode(',', $request->input('accessed_id')),
                "status"        => $request->input("status"),
                "ip_address"    => $request->ip(),
                "added_by"      => Session::get('userData')['employee_id'],
                "created_at"    => date('Y-m-d H:i:s'),
            ];
            $insertedId = $this->commonModel->storeData($tableName, $data);
            if ($insertedId != "") {
                Session::flash('success', __('User Added Successfully'));
                return redirect('admin/advancesetting/user');
            } else {
                Session::flash('error', __('User Addition Failed'));
                return back()->withInput();
            }
        }
    }
}
