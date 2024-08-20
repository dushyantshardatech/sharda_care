<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)
    {
        $this->commonModel = $commonModel;
    }
    public function index()
    {
        $data['banners']            = $this->commonModel->viewData('tbl_banners','*',['mainmenu_id' => 1, 'status' => '1', 'is_deleted' => '0']);
        $data['medical_packages']   = $this->commonModel->viewData('tbl_medical_packages','*',['status' => '1', 'is_deleted' => '0']);
        $data['stories_list']       = $this->commonModel->viewData('tbl_ourstories','*',['status' => '1', 'is_deleted' => '0']);
        return view('pages.home', $data);
    }
    public function About()
    {
        return view('pages.about');
    }
    

    public function find_doctor(Request $request)
    {
        $query = \DB::connection('mysql2')
                    ->table('sh_doctorprofile')
                    ->leftJoin('sh_departments', 'sh_doctorprofile.DoctorDepartment', '=', 'sh_departments.DepartmentID')
                    ->select('sh_doctorprofile.DoctorID', 'sh_doctorprofile.DoctorTitle', 'sh_doctorprofile.DoctorName', 'sh_doctorprofile.DoctorGender', 'sh_doctorprofile.DoctorProfilePic', 'sh_departments.DepartmentID', 'sh_departments.DepartmentName');
        
        if ($request->ajax()) {
            $department = $request->input('department');
            
            $gender = $request->input('gender');
            $doctorName = $request->input('doctorName');
           
            if (!empty($department)) {
                 $query->where('sh_doctorprofile.DoctorDepartment', $department);
                
            }
            
            if (!empty($gender) && $gender !== 'All' && empty($department)) {
                $query->where('sh_doctorprofile.DoctorGender', $gender);
            }

            if (!empty($gender) && $gender !== 'All' && !empty($department)) {
                $query->where('sh_doctorprofile.DoctorGender', $gender);
            }
    
            if(!empty($doctorName)){
                $query->where('sh_doctorprofile.DoctorName', 'LIKE', '%' . $doctorName . '%');
            }
           
            
            $data = $query->get();
        
            return response()->json(['success' => true, 'data' => $data]);
        }
        
        // If not an AJAX request, just for default case
        $data = $query->get();
        $doctorDepartments = \DB::connection('mysql2')
                                    ->table('sh_departments')
                                    ->pluck('DepartmentName', 'DepartmentID');
        
        return view('pages.find_doctor', ['data' => $data, 'doctorDepartments' => $doctorDepartments]);
    }


//   Fetch State

    public function fetchState(Request $request) {
        try {
            $countryId = $request->input('country_id');
            $states = \DB::connection('mysql')->table('states')->where('country_id', $countryId)->get();
            return response()->json(['states' => $states]);
        } catch (\Exception $e) {
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }


     //  Fetch City

     public function fetchCity(Request $request)
    {
        try {
            $cities =  \DB::connection('mysql')->table('cities')->where("state_id",$request->state_id)->get();
            return response()->json(['cities' => $cities]);
        } catch (\Exception $e) {
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }


    public function contacts (Request $request)
    { 
        $contact = \DB::connection('mysql')->table('countries')->pluck('name','id');
       
        return view('pages.contact', ['contact' => $contact]);
    }    
    public function store_contact (Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:100',
            'last_name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:100',
            'phone' => 'required|numeric|digits:10', 
            'email' => 'required|email|max:60',
            'country_id' => 'required|string|max:150',
            'state_id' => 'required|string|max:80',
            'city_id' => 'required|string|max:80',
            'message' => 'required|string',
            
        ]);
    
        
        $validatedData = $validator->validated();
    
        try {
          
            \DB::connection('mysql')->table('tbl_contact')->insert([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'country_id' => $validatedData['country_id'],
                'state_id' => $validatedData['state_id'],
                'city_id' => $validatedData['city_id'],
                'message' => $validatedData['message'],
                
            ]);
            
    
            // Session::flash('message', "Thanks For Contacting Us!");
            // return redirect()->back();
            return response()->json(['success' => true, 'message' => 'Thanks For Contacting Us!']);
    
        } catch (\Exception $e) {
            return response()->json(['success' => $e->getMessage(), 'message' => 'Failed to Enquire.']);
        }
        
    }
    public function patient_visits()
    {
        return view('pages.patient_visit');
    }
    public function Medicalpackage()
    {
        return view('pages.medical_packages');
    }

    
    public function doctorDetails($id = null)
    {
        
       $doctor_details = \DB::connection('mysql2')
                                ->table('sh_doctorprofile')
                                ->leftJoin('sh_departments', 'sh_doctorprofile.DoctorDepartment', '=', 'sh_departments.DepartmentID')
                                ->leftJoin('sh_designations', 'sh_doctorprofile.DoctorDesignation', '=', 'sh_designations.DesignationID')
                                ->where('sh_doctorprofile.DoctorID',$id)
                                ->get();
                        
        return view('pages.doctor_details', ['doctor_details' => $doctor_details]);
    }


    // Quick Enquery

    public function quickEnquiry(Request $request){
        
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
                'phone' => 'required|numeric|digits:10', 
                'email' => 'required|email|max:60',
                
            ]);
          
        $validatedData = $validator->validated();
       
        try {
        
              \DB::connection('mysql')->table('tbl_quick_enquiry')->insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'time_to_call' => now(),
            ]);
            
            return response()->json(['success' => true, 'message' => 'Enquiry submitted successfully!']);

        } catch (\Exception $e) {
            return response()->json(['success' => $e->getMessage(), 'message' => 'Failed to Enquire.']);
         
        }
     }


    public function bookAppointment(Request $request){

       $validator = Validator::make($request->all(), [
        'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
        'phone' => 'required|numeric|digits:10', 
        'email' => 'required|email|max:70',
        'doctor_name' => 'required|string|max:255',
    ]);
    
    $validatedData = $validator->validated();

    try {
      
        \DB::connection('mysql2')->table('sh_book_appointment')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'doctor_name' => $request->doctor_name,
        ]);

        return response()->json(['success' => true, 'message' => "Appointment booked successfully!"]);
    } catch (\Exception $e) {
        return response()->json(['success' => $e->getMessage(), 'message' => 'Failed to Enquire.']);
    }
    }


    // Second Opinion

    public function secondOpinion(Request $request){
        // return response()->json(['success' => $request->all()]);

        $validator = Validator::make($request->all(), [
         'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
         'phone' => 'required|numeric|digits:10', 
         'time_to_call' => 'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);
     
     $validatedData = $validator->validated();
 
     try {

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/images/second_opinion', $imageName); 
        }
      
         \DB::connection('mysql')->table('tbl_second_opinion')->insert([
             'name' => $request->name,
             'phone' => $request->phone,
             'time_to_call' => $request->time_to_call,
             'image' => $imageName, 
             
         ]);
 
         return response()->json(['success' => true, 'message' => "Second Opinion successfully!"]);
     } catch (\Exception $e) {
         return response()->json(['success' => $e->getMessage(), 'message' => 'Failed to Second Opinion.']);
     }
     }


    public function Packagedetails($slug)
    {
        $package_details    = $this->commonModel->viewData('tbl_medical_packages', '*', ['slug' => $slug])->first();
        if (!$package_details) {
            abort(404);
        }
        return view('pages.medi_pkg_details', compact('package_details'));
    }


    public function technology(){
        $technologys    = $this->commonModel->viewData('tbl_technology', '*');
         return view('pages.technology', ['technologys' => $technologys]);
    }
}
