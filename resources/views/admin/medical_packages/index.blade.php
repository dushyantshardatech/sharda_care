@extends('admin/admin_layout')
@section('title', 'Manage Package')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/medicalpackages')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/medicalpackages/add')}}" class="add-indent"> Add Medical Package</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/Dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Medical Package</li>
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
				    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Medical Package </h3>
					<a href="{{url('admin/medicalpackages/add')}}">  <input type="button" name="button" id="button" value="Add New Package"></a>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Display Order</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($package_list) > 0)
                                @php $cnt = 1; @endphp
                                @foreach ($package_list as $row)
                                <tr>
                                    <td>{{ $cnt++ }}</td>
                                    <td><img src="{{asset('storage/images/medical_packages/'.$row->images)}}" style="width:50px"></td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>{!! substr($row->description, 0, 60) !!}...</td>
                                    <td>{{ $row->display_order }}</td>
                                    <td>{!! $row->status == '1' ? '<span style="color:green;">Active</span>' : '<span style="color:red;">Inactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ url('admin/medicalpackages/add')}}/{{encrypt($row->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('deletepackage', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
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