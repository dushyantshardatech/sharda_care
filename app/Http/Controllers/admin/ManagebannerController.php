<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ManagebannerController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel) 
    {
        $this->commonModel = $commonModel;
    }
    public function index()
    {
        $banner_list    = $this->commonModel->viewData('tbl_banners','*',['status' => '1','is_deleted' => '0']);
        $banner_arr     = [];
        foreach($banner_list as $banner) {
            $main_menu  = $this->commonModel->getDataByID('tbl_main_menu','*',['id' => $banner->mainmenu_id, 'status' => '1', 'is_deleted' => '0']);
            $sub_menu   = $this->commonModel->getDataByID('tbl_submenu','*',['id' => $banner->submenu_id, 'status' => '1', 'is_deleted' => '0']);
            if($main_menu) {
                $banner_arr[] = [
                    'main_menu' => $main_menu,
                    'sub_menu'  => $sub_menu,
                    'banners'   => $banner
                ]; 
            }
        }
        $data['banner_list']    = $banner_arr;
        return view('admin.manage_banner.index', $data);
    }
    public function Managebanner(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                       = decrypt($id);
            $result                     = $this->commonModel->getDataByID("tbl_banners","*", ["id" => $d_id]); 
            $data['id']                 = $result->id;
            $data['banner_name']        = $result->banner_name;
            $data['banner_url']         = $result->banner_url;
            $data['banner_images']      = $result->banner_images;
            $data['mainmenu_id']        = $result->mainmenu_id;
            $data['submenu_id']         = $result->submenu_id;
            $data['banner_text']        = $result->banner_text;
            $data['banner_desc']        = $result->banner_desc;
            $data['button_url']         = $result->button_url;
            $data['display_order']      = $result->display_order;
            $data['status']             = $result->status;
        } else {
            $data['id']                 = '';
            $data['banner_name']        = '';
            $data['banner_url']         = '';
            $data['banner_images']      = '';
            $data['mainmenu_id']        = '';
            $data['submenu_id']         = '';
            $data['banner_text']        = '';
            $data['banner_desc']        = '';
            $data['button_url']         = '';
            $data['display_order']      = '';
            $data['status']             = '';
        }
        $data['main_menu']      = $this->commonModel->viewData('tbl_main_menu','*',['status' => '1', 'is_deleted' => '0']);
        $data['sub_menu']       = $this->commonModel->viewData('tbl_submenu','*',['status' => '1', 'is_deleted' => '0']);
        return view('admin.manage_banner.add', $data);
    }
    public function add(Request $request)
    {
        $rules = [
            'banner_name'       => 'required',
            'banner_url'        => 'required',
            'mainmenu_id'       => 'required',
            'banner_text'       => 'required',
            'banner_desc'       => 'required',
            'button_url'        => 'required',
            'display_order'     => 'required',
            'status'            => 'required'
        ];
        if($request->post('id') > 0) {
            if ($request->hasFile('banner_images')) {
                $rules['banner_images'] = ['required', 'mimes:png,jpg,svg,jpeg'];
            } 
        } else {
            $rules['banner_images'] = ['required', 'mimes:png,jpg,svg,jpeg'];
        }
        $request->validate($rules, [
            'banner_name.required'   => 'The banner name is required.',
            'banner_url.required'    => 'The banner url is required.',
            'mainmenu_id.required'   => 'The main menu is required.',
            'banner_text.required'   => 'The banner text is required.',
            'button_url.required'    => 'The button url is required.',
            'display_order.required' => 'The display order is required.',
            'status.required'        => 'The status is required.',
            'banner_images.mimes'    => 'The logo must be a PNG, JPG, JPEG, SVG file.'
        ]);   
        $tableName = 'tbl_banners';
        if($request->post('id') > 0) {
            $data = [
                "banner_name"   => $request->input("banner_name"),
                "banner_url"    => $request->input("banner_url"),
                "mainmenu_id"   => $request->input("mainmenu_id"),
                "submenu_id"    => $request->input("submenu_id"),
                "banner_text"   => $request->input("banner_text"),
                "banner_desc"   => $request->input("banner_desc"),
                "button_url"    => $request->input("button_url"),
                "display_order" => $request->input("display_order"),
                "status"        => $request->input("status"),
                "updated_at"    => date('Y-m-d H:i:s')
            ];
            if ($request->hasfile('banner_images')) {
                $image      = $request->file('banner_images');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/banners', $imageName);
                $data['banner_images']  = $imageName;
            }
            $updated_id = $this->commonModel->updateData($tableName, $data, ['id' => $request->post('id')]);
            $message    = $updated_id ? 'Banner Updated Successfully' : 'Banner Updation Failed';
            Session::flash($updated_id ? 'success' : 'error', __($message));
            return redirect($updated_id ? 'admin/managebanners' : back()->withInput());
        } else {
            if($request->hasfile('banner_images')) {
                $image      = $request->file('banner_images');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/banners', $imageName);
                $data = [
                    "banner_images" => $imageName,
                    "banner_name"   => $request->input("banner_name"),
                    "banner_url"    => $request->input("banner_url"),
                    "mainmenu_id"   => $request->input("mainmenu_id"),
                    "submenu_id"    => $request->input("submenu_id"),
                    "banner_text"   => $request->input("banner_text"),
                    "banner_desc"   => $request->input("banner_desc"),
                    "button_url"    => $request->input("button_url"),
                    "display_order" => $request->input("display_order"),
                    "status"        => $request->input("status"),
                    "created_at"    => date('Y-m-d H:i:s')
                ];
                $insertedId = $this->commonModel->storeData($tableName, $data);
                if ($insertedId != "") {
                    Session::flash('success', __('Banner Added Successfully'));
                    return redirect('admin/managebanners');
                } else {
                    Session::flash('error', __('Banner Addition Failed'));
                    return back()->withInput();
                }
            } else {
                Session::flash('error', __('Logo not uploaded'));
                return back()->withInput();
            }
        }
    }
    public function deletebanner(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_banners';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Banner Deleted Successfully'));
            return redirect('admin/managebanners');
        } else {
            Session::flash('success', __('Banner Deletion Failed'));
            return back()->withInput();
        }
    }
    public function getSubMenus(Request $request)
    {
        $menu_id    = $request->input('menu_id');
        $submenus   = $this->commonModel->viewData('tbl_submenu', '*', ['menu_id' => $menu_id, 'status' => '1', 'is_deleted' => '0']);
        return response()->json($submenus);
    }
}
