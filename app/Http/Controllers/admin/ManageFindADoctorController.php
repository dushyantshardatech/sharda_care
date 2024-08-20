<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ManageFindADoctorController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }
    public function index()
    {
        
        $data['doctor']    = $this->commonModel->viewData('tbl_finddoctor','*',['status' => '1','is_deleted' => '0']);
        return view('admin.find_doctor.index', $data);
    }
}
