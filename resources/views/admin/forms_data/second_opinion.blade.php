@extends('admin/admin_layout')
@section('title', 'Second Opinion')
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
                <li class="breadcrumb-item active">Manage Second Opinion</li>
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
				    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Second Opinion </h3>
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
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Time to call</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                          
	                            @if(count($second_opinion_list) > 0)
                               
	                            @php $cnt = 1; @endphp
	                            @foreach ($second_opinion_list as $row)
                                <tr>
                                   
                                    <td>{{ $cnt++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    @php
                                        $date = new DateTime($row->time_to_call);
                                        $formattedDate = $date->format('d-m-Y');
                                    @endphp
                                    <td>{{ $formattedDate }}</td>
                                    <td><img src="{{asset('storage/images/second_opinion/'.$row->image)}}" style="width:50px"></td>
                                    <td>
                                        
                                    <a href="{{ route('deleteSecondOpinion', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a> 
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