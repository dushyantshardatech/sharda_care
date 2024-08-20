<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ManageTechnologyController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel) 
    {
        $this->commonModel = $commonModel;
    }

    public function index()
    {
       
        $technology_list    = $this->commonModel->viewData('tbl_technology','*');
        
        return view('admin.technology.index', ['technology_list' => $technology_list]);
    }


    public function ManageTechnology(Request $request, $id = null)
    {
        $data = [];
        if($id !== null) {
            $d_id                       = decrypt($id);
            $result                     = $this->commonModel->getDataByID("tbl_technology","*", ["id" => $d_id]); 
            $data['id']                 = $result->id;
            $data['image']             = $result->image;
            $data['heading']            = $result->heading;
            $data['content']            = $result->content;
            $data['slug']               = $result->slug;
            $data['status']             = $result->status;
        } else {
            $data['id']                 = '';
            $data['image']             = '';
            $data['heading']              = '';
            $data['content']        = '';
            $data['slug']      = '';

        }
        return view('admin.technology.add', $data);
    }



    // Add Technology

    public function add(Request $request)
    {
        $rules = [
            'heading'             => ['required', Rule::unique('tbl_technology')->ignore($request->post('id')), 'max:255'],
            'slug'              => ['required',Rule::unique('tbl_technology')->ignore($request->post('id'))],
            'content'       => 'required',

        ];
        if($request->post('id') > 0) {
            if ($request->hasFile('image')) {
                $rules['image'] = ['required', 'mimes:png,jpg,svg,jpeg'];
            } 
        } else {
            $rules['image']    = ['required', 'mimes:png,jpg,svg,jpeg'];
        }
        // $request->validate($rules, [
        //     'heading.required'            => 'The heading is required.',
        //     'heading.unique'              => 'The heading has already been taken.',
        //     'link.required'             => 'The link is required.',
        //     'link.unique'              => 'The link has already been taken.',
        //     'content.required'      => 'The content is required.',
        //     'image.mimes'              => 'The image must be a PNG, JPG, JPEG, SVG file.'
        // ]); 
        $tableName = 'tbl_technology';
        if($request->post('id') > 0) {
            $data = [
                "heading"         => $request->input("heading"),
                "slug"          => $request->input("slug"),
                "content"   => $request->input("content"),
                "status"   => $request->input("status"),
                "updated_at"    => date('Y-m-d H:i:s')
            ];
            if ($request->hasfile('image')) {
                $image      = $request->file('image');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/images/technology', $imageName);
                $data['image']  = $imageName;
            }
            $updated_id = $this->commonModel->updateData($tableName, $data, ['id' => $request->post('id')]);
            $message    = $updated_id ? 'Technology Updated Successfully' : 'Technology Updation Failed';
            Session::flash($updated_id ? 'success' : 'error', __($message));
            return redirect($updated_id ? 'admin/technology' : back()->withInput());
        } else {
            if($request->hasfile('image')) {
                $image      = $request->file('image');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/images/technology', $imageName);
                $data = [
                    "image"        => $imageName,
                    "heading"         => $request->input("heading"),
                    "slug"          => $request->input("slug"),
                    "content"   => $request->input("content"),
                    "created_at"    => date('Y-m-d H:i:s')
                ];
                $insertedId = $this->commonModel->storeData($tableName, $data);
                if ($insertedId != "") {
                    Session::flash('success', __('Technology Added Successfully'));
                    return redirect('admin/technology');
                } else {
                    Session::flash('error', __('Technology Addition Failed'));
                    return back()->withInput();
                }
            } else {
                Session::flash('error', __('Image not uploaded'));
                return back()->withInput();
            }
        }
    }


    public function deleteTechnology(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_technology';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        if ($deleteId != "") {
            Session::flash('error', __('Technology Deleted Successfully'));
            return redirect('admin/technology');
        } else {
            Session::flash('success', __('Technology Deletion Failed'));
            return back()->withInput();
        }
    }
}
