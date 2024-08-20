<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ManagemenuController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }
    public function index()
    {
        $data['menus']   = $this->commonModel->viewData("tbl_main_menu",'*', ['status' => '1', 'is_deleted' => '0']);
        return view('admin.manage_menu.index', $data);
    }
    public function ManageMenu(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                       = decrypt($id);
            $result                     = $this->commonModel->getDataByID("tbl_main_menu","*", ["id" => $d_id]); 
            $data['id']                 = $result->id;
            $data['menu_name']          = $result->menu_name;
            $data['display_name']       = $result->display_name;
            $data['manage_url']         = $result->manage_url;
            $data['display_order']      = $result->display_order;
            $data['status']             = $result->status;
            $data['seo_title']          = $result->seo_title;
            $data['seo_keywords']       = $result->seo_keywords;
            $data['seo_description']    = $result->seo_description;
        } else {
            $data['id']                 = '';
            $data['menu_name']          = '';
            $data['display_name']       = '';
            $data['manage_url']         = '';
            $data['display_order']      = '';
            $data['status']             = '';
            $data['seo_title']          = '';
            $data['seo_keywords']       = '';
            $data['seo_description']    = '';
        }
        return view('admin.manage_menu.add_menu', $data);
    }
    public function add(Request $request)
    {
        $request->validate([
            'menu_name'         => ['required', Rule::unique('tbl_main_menu')->ignore($request->post('id')), 'max:255'],
            'display_name'      => ['required',Rule::unique('tbl_main_menu')->ignore($request->post('id'))],
            'manage_url'        => ['required',Rule::unique('tbl_main_menu')->ignore($request->post('id'))],
            'display_order'     => 'required',
            'status'            => 'required',
        ],
        [
            'menu_name.required'        => 'The menu name field is required.',
            'menu_name.unique'          => 'The menu name has already been taken.',
            'display_name.required'     => 'The display name field is required.',
            'display_name.unique'       => 'The display name has already been taken.',
            'manage_url.required'       => 'The manage url is required.',
            'manage_url.unique'         => 'The given url has already been taken.',
            'status.required'           => 'Please select status.'
        ]);
        $tableName = 'tbl_main_menu';
        if($request->post('id') > 0) {
            $updated_data = [
                'menu_name'         => $request->post('menu_name'),
                'display_name'      => $request->post('display_name'),         
                'manage_url'        => $request->post('manage_url'),         
                'display_order'     => $request->post('display_order'),         
                'status'            => $request->post('status'),         
                'seo_title'         => $request->post('seo_title'),         
                'seo_keywords'      => $request->post('seo_keywords'),         
                'seo_description'   => $request->post('seo_description'),         
                'updated_at'        => date('Y-m-d H:i:s')     
            ];
            $updated_id   = $this->commonModel->updateData($tableName, $updated_data, ['id' => $request->post('id')]);
            $message      = $updated_id ? 'Menu Updated Successfully' : 'Menu Updation Failed';
            Session::flash($updated_id ? 'success' : 'error', __($message));
            return redirect($updated_id ? 'admin/managemenu' : back()->withInput());
        } else {
            $data = [
                'menu_name'         => $request->post('menu_name'),
                'display_name'      => $request->post('display_name'),         
                'manage_url'        => $request->post('manage_url'),         
                'display_order'     => $request->post('display_order'),         
                'status'            => $request->post('status'),         
                'seo_title'         => $request->post('seo_title'),         
                'seo_keywords'      => $request->post('seo_keywords'),         
                'seo_description'   => $request->post('seo_description'),         
                'created_at'        => date('Y-m-d H:i:s')        
            ];
            $inserted_id    = $this->commonModel->storeData($tableName, $data);
            if ($inserted_id != "") {
                Session::flash('success', __('Menu Added Successfully'));
                return redirect('admin/managemenu');
            } else {
                Session::flash('error', __('Menu Addition Failed'));
                return back()->withInput();
            }
        }
    }
    public function deletemenu(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_main_menu';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Menu Deleted Successfully'));
            return redirect('admin/managemenu');
        } else {
            Session::flash('success', __('Menu Deletion Failed'));
            return back()->withInput();
        }
    }
}
