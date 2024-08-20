<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin\CommonModel;
use Illuminate\Support\Facades\Session;

class ManageSettingController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }
    public function index()
    {
        $data['settings']   = $this->commonModel->viewData("tbl_setting",'*', ['status' => '1', 'is_deleted' => '0']);
        return view('admin.settings.index', $data);
    }
    public function ManageSettings(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                   = decrypt($id);
            $result                 = $this->commonModel->getDataByID("tbl_setting","*", ["id" => $d_id]); 
            $data['id']             = $result->id;
            $data['logo']           = $result->logo;
            $data['contact_no']     = $result->contact_no;
            $data['facebook_icon']  = $result->facebook_icon;
            $data['facebook_link']  = $result->facebook_link;
            $data['twitter_icon']   = $result->twitter_icon;
            $data['twitter_link']   = $result->twitter_link;
            $data['instagram_icon'] = $result->instagram_icon;
            $data['instagram_link'] = $result->instagram_link;
            $data['youtube_icon']   = $result->youtube_icon;
            $data['youtube_link']   = $result->youtube_link;
            $data['linkedin_icon']  = $result->linkedin_icon;
            $data['linkedin_link']  = $result->linkedin_link;
            $data['display_order']  = $result->display_order;
            $data['status']         = $result->status;
        } else {
            $data['id']             = '';
            $data['logo']           = '';
            $data['contact_no']     = '';
            $data['facebook_icon']  = '';
            $data['facebook_link']  = ''; 
            $data['twitter_icon']   = '';
            $data['twitter_link']   = '';
            $data['instagram_icon'] = '';
            $data['instagram_link'] = '';
            $data['youtube_icon']   = '';
            $data['youtube_link']   = '';
            $data['linkedin_icon']  = '';
            $data['linkedin_link']  = '';
            $data['display_order']  = '';
            $data['status']         = '';
        }
        return view('admin.settings.add_settings', $data);
    }
    public function add(Request $request)
    {
        $rules = [
            'contact_no'    => ['required', 'min:9', 'max:13'],
            'display_order' => 'required',
            'status'        => 'required'
        ];
        if ($request->post('id') > 0) {
            if ($request->hasFile('logo')) {
                $rules['logo'] = ['required', 'mimes:png'];
            }
        } else {
            $rules['logo'] = ['required', 'mimes:png'];
        }
        $request->validate($rules, [
            'contact_no.required'    => 'The contact number is required.',
            'contact_no.min'         => 'The contact number must be at least :min characters.',
            'contact_no.max'         => 'The contact number may not be greater than :max characters.',
            'display_order.required' => 'The display order is required.',
            'status.required'        => 'The status is required.',
            'logo.required'          => 'The logo is required.',
            'logo.mimes'             => 'The logo must be a PNG file.'
        ]);    
        $tableName = 'tbl_setting';
        if($request->post('id') > 0) {
            $data = [
                "contact_no"        => $request->input("contact_no"),
                "facebook_icon"     => $request->input("facebook_icon"),
                "facebook_link"     => $request->input("facebook_link"),
                "twitter_icon"      => $request->input("twitter_icon"),
                "twitter_link"      => $request->input("twitter_link"),
                "instagram_icon"    => $request->input("instagram_icon"),
                "instagram_link"    => $request->input("instagram_link"),
                "youtube_icon"      => $request->input("youtube_icon"),
                "youtube_link"      => $request->input("youtube_link"),
                "linkedin_icon"     => $request->input("linkedin_icon"),
                "linkedin_link"     => $request->input("linkedin_link"),
                "display_order"     => $request->input("display_order"),
                "status"            => $request->input("status"),
                "updated_at"        => date('Y-m-d H:i:s')
            ];
            if ($request->hasfile('logo')) {
                $image      = $request->file('logo');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/logo', $imageName);
                $data['logo'] = $imageName;
            }
            $updated_id = $this->commonModel->updateData($tableName, $data, ['id' => $request->post('id')]);
            $message    = $updated_id ? 'Setting Updated Successfully' : 'Setting Updation Failed';
            Session::flash($updated_id ? 'success' : 'error', __($message));
            return redirect($updated_id ? 'admin/dashboard/managesettings' : back()->withInput());
        } else {
            if($request->hasfile('logo')) {
                $image      = $request->file('logo');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/logo', $imageName);
                $data = [
                    "logo"              => $imageName,
                    "contact_no"        => $request->input("contact_no"),
                    "facebook_icon"     => $request->input("facebook_icon"),
                    "facebook_link"     => $request->input("facebook_link"),
                    "twitter_icon"      => $request->input("twitter_icon"),
                    "twitter_link"      => $request->input("twitter_link"),
                    "instagram_icon"    => $request->input("instagram_icon"),
                    "instagram_link"    => $request->input("instagram_link"),
                    "youtube_icon"      => $request->input("youtube_icon"),
                    "youtube_link"      => $request->input("youtube_link"),
                    "linkedin_icon"     => $request->input("linkedin_icon"),
                    "linkedin_link"     => $request->input("linkedin_link"),
                    "display_order"     => $request->input("display_order"),
                    "status"            => $request->input("status"),
                    "created_at"        => date('Y-m-d H:i:s')
                ];
                $insertedId = $this->commonModel->storeData($tableName, $data);
                if ($insertedId != "") {
                    Session::flash('success', __('Setting Added Successfully'));
                    return redirect('admin/dashboard/managesettings');
                } else {
                    Session::flash('error', __('Setting Addition Failed'));
                    return back()->withInput();
                }
            } else {
                Session::flash('error', __('Logo not uploaded'));
                return back()->withInput();
            }
        }
    }

    public function deletesetting(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_setting';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Setting Deleted Successfully'));
            return redirect('admin/dashboard/managesettings');
        } else {
            Session::flash('success', __('Setting Deletion Failed'));
            return back()->withInput();
        }
    }
}
