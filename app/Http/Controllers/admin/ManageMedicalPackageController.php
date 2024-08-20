<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ManageMedicalPackageController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }
    public function index()
    {
        $data['package_list']    = $this->commonModel->viewData('tbl_medical_packages','*',['status' => '1','is_deleted' => '0']);
        return view('admin.medical_packages.index', $data);
    }
    public function Managepackage(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                       = decrypt($id);
            $result                     = $this->commonModel->getDataByID("tbl_medical_packages","*", ["id" => $d_id]); 
            $data['id']                 = $result->id;
            $data['images']             = $result->images;
            $data['title']              = $result->title;
            $data['slug']               = $result->slug;
            $data['description']        = $result->description;
            $data['display_order']      = $result->display_order;
            $data['status']             = $result->status;
        } else {
            $data['id']                 = '';
            $data['images']             = '';
            $data['title']              = '';
            $data['slug']               = '';
            $data['description']        = '';
            $data['display_order']      = '';
            $data['status']             = '';
        }
        return view('admin.medical_packages.add', $data);
    }
    public function add(Request $request)
    {
        $rules = [
            'title'             => ['required', Rule::unique('tbl_medical_packages')->ignore($request->post('id')), 'max:255'],
            'slug'              => ['required',Rule::unique('tbl_medical_packages')->ignore($request->post('id'))],
            'description'       => 'required',
            'display_order'     => 'required',
            'status'            => 'required',
        ];
        if($request->post('id') > 0) {
            if ($request->hasFile('images')) {
                $rules['images'] = ['required', 'mimes:png,jpg,svg,jpeg'];
            } 
        } else {
            $rules['images']    = ['required', 'mimes:png,jpg,svg,jpeg'];
        }
        $request->validate($rules, [
            'title.required'            => 'The title is required.',
            'title.unique'              => 'The title has already been taken.',
            'slug.required'             => 'The slug is required.',
            'title.unique'              => 'The slug has already been taken.',
            'description.required'      => 'The description is required.',
            'display_order.required'    => 'The display order is required.',
            'status.required'           => 'The status is required.',
            'images.mimes'              => 'The image must be a PNG, JPG, JPEG, SVG file.'
        ]); 
        $tableName = 'tbl_medical_packages';
        if($request->post('id') > 0) {
            $data = [
                "title"         => $request->input("title"),
                "slug"          => $request->input("slug"),
                "description"   => $request->input("description"),
                "display_order" => $request->input("display_order"),
                "status"        => $request->input("status"),
                "updated_at"    => date('Y-m-d H:i:s')
            ];
            if ($request->hasfile('images')) {
                $image      = $request->file('images');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/medical_packages', $imageName);
                $data['images']  = $imageName;
            }
            $updated_id = $this->commonModel->updateData($tableName, $data, ['id' => $request->post('id')]);
            $message    = $updated_id ? 'Medical Package Updated Successfully' : 'Medical Package Updation Failed';
            Session::flash($updated_id ? 'success' : 'error', __($message));
            return redirect($updated_id ? 'admin/medicalpackages' : back()->withInput());
        } else {
            if($request->hasfile('images')) {
                $image      = $request->file('images');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/medical_packages', $imageName);
                $data = [
                    "images"        => $imageName,
                    "title"         => $request->input("title"),
                    "slug"          => $request->input("slug"),
                    "description"   => $request->input("description"),
                    "display_order" => $request->input("display_order"),
                    "status"        => $request->input("status"),
                    "created_at"    => date('Y-m-d H:i:s')
                ];
                $insertedId = $this->commonModel->storeData($tableName, $data);
                if ($insertedId != "") {
                    Session::flash('success', __('Medical Package Added Successfully'));
                    return redirect('admin/medicalpackages');
                } else {
                    Session::flash('error', __('Medical Package Addition Failed'));
                    return back()->withInput();
                }
            } else {
                Session::flash('error', __('Image not uploaded'));
                return back()->withInput();
            }
        }
    }
    public function deletepackage(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_medical_packages';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Package Deleted Successfully'));
            return redirect('admin/medicalpackages');
        } else {
            Session::flash('success', __('Package Deletion Failed'));
            return back()->withInput();
        }
    }
}
