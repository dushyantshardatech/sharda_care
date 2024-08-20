@extends('admin/admin_layout')
@section('title', 'Manage Contact')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/contact_index')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
   
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/Dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Contact</li>
            </ol>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <div class="admin-container">
            <div class="header-admin">
				<div class="card-header card-header-new ">
				    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Contact </h3>
					
					<div class="clearfix"></div>
				</div> 
			</div>
            <div class="card-body table-body-new">
                <div class="table-responsive">
                    <div class="student-detail-table" >
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                          
	                            @if(count($contact_list) > 0)
                               
	                            @php $cnt = 1; @endphp
	                            @foreach ($contact_list as $row)
                                <tr>
                                   
                                    <td>{{ $cnt++ }}</td>
                                    <td>{{ $row->first_name }}</td>
                                    <td>{{ $row->last_name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->country_name }}</td>
                                    <td>{{ $row->state_name }}</td>
                                    <td>{{ $row->city_name }}</td>
                                    <td>{{ $row->message }}</td>
                                    <td>
                                        
                                    <a href="{{ route('deleteContacts', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a> 
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">No Record found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection