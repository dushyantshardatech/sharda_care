<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class PrivacypolicyController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }

    public function index()
    {
        $data['privacy_list']   = $this->commonModel->viewData('tbl_privacy_policy','*',['status' => '1','is_deleted' => '0']);
        return view('admin/privacy-policy/index', $data);
    }
    public function Manageprivacypolicies(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                       = decrypt($id);
            $result                     = $this->commonModel->getDataByID("tbl_privacy_policy","*", ["id" => $d_id]); 
            $data['id']                 = $result->id;
            $data['tab_id']             = $result->tab_id;
            $data['description']        = $result->description;
            $data['display_order']      = $result->display_order;
            $data['status']             = $result->status;
        } else {
            $data['id']                 = '';
            $data['tab_id']             = '';
            $data['description']        = '';
            $data['display_order']      = '';
            $data['status']             = '';
        }
        return view('admin.privacy-policy.add', $data);
    }
    public function add(Request $request)
    {
        $rules = [
            'tab_id'            => 'required',
            'description'       => 'required',
            'display_order'     => 'required',
            'status'            => 'required',
        ];
        $request->validate($rules, [
            'tab_id.required'           => 'Select an option.',
            'description.required'      => 'The description is required.',
            'display_order.required'    => 'The display order is required.',
            'status.required'           => 'The status is required.',
        ]); 
        $tableName = 'tbl_privacy_policy';
        if($request->post('id') > 0) {
            $data = [
                "tab_id"        => $request->input("tab_id"),
                "description"   => $request->input("description"),
                "display_order" => $request->input("display_order"),
                "status"        => $request->input("status"),
                "updated_at"    => date('Y-m-d H:i:s')
            ];
            $updated_id = $this->commonModel->updateData($tableName, $data, ['id' => $request->post('id')]);
            $message    = $updated_id ? 'Privacy Policy Updated Successfully' : 'Privacy Policy Updation Failed';
            Session::flash($updated_id ? 'success' : 'error', __($message));
            return redirect($updated_id ? 'admin/privacy-policy' : back()->withInput());
        } else {
            $data = [
                "tab_id"        => $request->input("tab_id"),
                "description"   => $request->input("description"),
                "display_order" => $request->input("display_order"),
                "status"        => $request->input("status"),
                "created_at"    => date('Y-m-d H:i:s')
            ];
            $insertedId = $this->commonModel->storeData($tableName, $data);
            if ($insertedId != "") {
                Session::flash('success', __('Privacy Policy Added Successfully'));
                return redirect('admin/privacy-policy');
            } else {
                Session::flash('error', __('Privacy Policy Addition Failed'));
                return back()->withInput();
            }
        }
    }
    public function deleteprivacypolicy(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_privacy_policy';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Privacy Policy Deleted Successfully'));
            return redirect('admin/privacy-policy');
        } else {
            Session::flash('success', __('Privacy Policy Deletion Failed'));
            return back()->withInput();
        }
    }
}
