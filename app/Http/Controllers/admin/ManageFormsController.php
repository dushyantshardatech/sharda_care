<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CommonModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ManageFormsController extends Controller
{
    protected $CommonModel;
    public function __construct(CommonModel $commonModel)  
    {
        $this->commonModel = $commonModel;
    }

    public function contact_index()
    {
       
        $contact_list    = \DB::connection('mysql')->table('tbl_contact')
                                                    ->leftJoin('countries', 'tbl_contact.country_id', '=', 'countries.id')
                                                    ->leftJoin('states', 'tbl_contact.state_id', '=', 'states.id')
                                                    ->leftJoin('cities', 'tbl_contact.city_id', '=', 'cities.id')
                                                    ->select(
                                                        'tbl_contact.*', 
                                                        'countries.name as country_name', 
                                                        'states.name as state_name', 
                                                        'cities.name as city_name'
                                                    )
                                                    ->where('tbl_contact.is_deleted',0)
                                                    ->get();
                                               
        return view('admin.forms_data.contact_index', ['contact_list' => $contact_list]);
    }

    public function deleteContacts(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $tableName  = 'tbl_contact';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);
        
        if ($deleteId != "") {
            Session::flash('error', __('Contact Deleted Successfully'));
            return redirect('admin/contactlist');
        } else {
            Session::flash('success', __('Contact Deletion Failed'));
            return back()->withInput();
        }
    }



    // Quick Enquire

    public function enquire_index()
    {
    
        $enquire_list    = $this->commonModel->viewData('tbl_quick_enquiry','*')->where('is_deleted',0);
        return view('admin.forms_data.quick_enquire', ['enquire_list' => $enquire_list]);
    }


    public function deleteEnquire(Request $request, $id)
    {
        $d_id       = decrypt($id);
        
        $tableName  = 'tbl_quick_enquiry';
        $deleteId   = $this->commonModel->deleteData($tableName, ['id' => $d_id]);

        if ($deleteId != "") {
            Session::flash('error', __('Enquire Deleted Successfully'));
            return redirect('admin/enquire');
        } else {
            Session::flash('success', __('Enquire Deletion Failed'));
            return back()->withInput();
        }
    }


    // Book Appointment

    public function book_appointment_index()
    {
     
        $book_appointment_list    = \DB::connection('mysql2')
                                        ->table('sh_book_appointment')
                                        ->where('is_deleted', '0')
                                        ->get();
        return view('admin.forms_data.book_appointment', ['book_appointment_list' => $book_appointment_list]);
    }

    public function deleteBookAppointment(Request $request, $id)
    {
        $d_id       = decrypt($id);
        $deleteAppointment = \DB::connection('mysql2')->table('sh_book_appointment')->where('id',$d_id)->update(['status' => '0', 'is_deleted' => '1']);

        if ($deleteAppointment != "") {
            Session::flash('error', __('Appointment Deleted Successfully'));
            return redirect('admin/bookappointment');
        } else {
            Session::flash('success', __('Appointment Deletion Failed'));
            return back()->withInput();
        }
    }


    public function second_opinion_index(Request $request){
        
        
        $second_opinion_list = $this->commonModel->viewData('tbl_second_opinion','*')->where('is_deleted',0);
        return view('admin.forms_data.second_opinion', ['second_opinion_list' => $second_opinion_list]);                                
    }


    public function deleteSecondOpinion($id){
        
        $d_id = decrypt($id);
        
        $tableName = 'tbl_second_opinion';
        $deleteOpinion = $this->commonModel->deleteData($tableName, ['id' => $d_id]);

        if($deleteOpinion != ""){
             Session::flash('error',__('Second Opinion Delete Successfully'));
             return redirect('admin/second_opinion');
        } else {
             Session::flash('success',__('Second Delete Failed'));
             return back()->withInput();
        }

    }
}
