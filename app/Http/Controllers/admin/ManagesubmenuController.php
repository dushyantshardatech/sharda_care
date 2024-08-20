<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ManagesubmenuController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }
    public function index()
    {
        $submenus       = $this->commonModel->viewData("tbl_submenu",'*', ['status' => '1', 'is_deleted' => '0']);
        $menus          = $this->commonModel->viewData("tbl_main_menu",'*', ['status' => '1', 'is_deleted' => '0']);
        $submenuData    = [];
        foreach ($submenus as $submenu) {
            $main_menu  = $menus->where('id', $submenu->menu_id)->first();
            if ($main_menu) {
                $submenuData[] = [
                    'submenu' => $submenu,
                    'menu_name' => $main_menu->menu_name
                ];
            }
        }
        $data['submenus']   = $submenuData;
        return view('admin.manage_menu.submenu', $data);
    }
    public function ManageSubMenu(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                       = decrypt($id);
            $result                     = $this->commonModel->getDataByID("tbl_submenu","*", ["id" => $d_id]); 
            $data['id']                 = $result->id;
            $data['menu_id']            = $result->menu_id;
            $data['submenu_name']       = $result->submenu_name;
            $data['display_name']       = $result->display_name;
            $data['submenu_url']        = $result->submenu_url;
            $data['display_order']      = $result->display_order;
            $data['status']             = $result->status;
            $data['seo_title']          = $result->seo_title;
            $data['seo_keywords']       = $result->seo_keywords;
            $data['seo_description']    = $result->seo_description;
        } else {
            $data['id']                 = "";
            $data['menu_id']            = "";
            $data['submenu_name']       = "";
            $data['display_name']       = "";
            $data['submenu_url']        = "";
            $data['display_order']      = "";
            $data['status']             = "";
            $data['seo_title']          = "";
            $data['seo_keywords']       = "";
            $data['seo_description']    = "";
        }
        $data['menu_list']  = $this->commonModel->viewData("tbl_main_menu",'*', ['status' => '1', 'is_deleted' => '0']);
        return view('admin.manage_menu.add_submenu', $data);
    }
    public function add(Request $request)
    {
        $request->validate([
            'menu_id'           => 'required',
            'submenu_name'      => ['required', Rule::unique('tbl_submenu')->ignore($request->post('id')), 'max:255'],
            'display_name'      => ['required',Rule::unique('tbl_submenu')->ignore($request->post('id'))],
            'submenu_url'       => ['required',Rule::unique('tbl_submenu')->ignore($request->post('id'))],
            'display_order'     => 'required',
            'status'            => 'required',
        ],
        [
            'menu_id.required'          => 'The menu name field is required.',
            'submenu_name.required'     => 'The submenu name field is required.',
            'submenu_name.unique'       => 'The submenu has already been taken.',
            'display_name.required'     => 'The display name field is required.',
            'display_name.unique'       => 'The display name has already been taken.',
            'submenu_url.required'      => 'The manage url is required.',
            'submenu_url.unique'        => 'The given url has already been taken.',
            'status.required'           => 'Please select status.'
        ]);
        $tableName = 'tbl_submenu';
        if($request->post('id') > 0) {
            $updated_data = [
                'menu_id'           => $request->post('menu_id'),
                'submenu_name'      => $request->post('submenu_name'),
                'display_name'      => $request->post('display_name'),         
                'submenu_url'       => $request->post('submenu_url'),         
                'display_order'     => $request->post('display_order'),         
                'status'            => $request->post('status'),         
                'seo_title'         => $request->post('seo_title'),         
                'seo_keywords'      => $request->post('seo_keywords'),         
                'seo_description'   => $request->post('seo_description'),         
                'updated_at'        => date('Y-m-d H:i:s')     
            ];
            $updated_id   = $this->commonModel->updateData($tableName, $updated_data, ['id' => $request->post('id')]);
            $message      = $updated_id ? 'Submenu Updated Successfully' : 'Submenu Updation Failed';
            Session::flash($updated_id ? 'success' : 'error', __($message));
            return redirect($updated_id ? 'admin/managesubmenu' : back()->withInput());
        } else {
            $data = [
                'menu_id'           => $request->post('menu_id'),
                'submenu_name'      => $request->post('submenu_name'),
                'display_name'      => $request->post('display_name'),         
                'submenu_url'       => $request->post('submenu_url'),         
                'display_order'     => $request->post('display_order'),         
                'status'            => $request->post('status'),         
                'seo_title'         => $request->post('seo_title'),         
                'seo_keywords'      => $request->post('seo_keywords'),         
                'seo_description'   => $request->post('seo_description'),         
                'created_at'        => date('Y-m-d H:i:s')         
            ];
            $inserted_id    = $this->commonModel->storeData($tableName, $data);
            if ($inserted_id != "") {
                Session::flash('success', __('Submenu Added Successfully'));
                return redirect('admin/managesubmenu');
            } else {
                Session::flash('error', __('Submenu Addition Failed'));
                return back()->withInput();
            }
        }
    }
    public function deletesubmenu(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_submenu';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Submenu Deleted Successfully'));
            return redirect('admin/managesubmenu');
        } else {
            Session::flash('success', __('Submenu Deletion Failed'));
            return back()->withInput();
        }
    }
}
