@extends('admin/admin_layout')
@section('title', 'Module')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/dashboard')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/advancesetting/addmodule')}}" class="add-indent"> Add Module</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/Dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Module</li>
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
				    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Module </h3>
					<a href="{{url('admin/advancesetting/addmodule')}}">  <input type="button" name="button" id="button" value="Add New Module"></a>
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
                                    <th>Display Name</th>
                                    <th>Module Name</th>
                                    <th>Setup Display</th>
                                    <th>Display Order</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($moduleslist) > 0)
                                @php $cnt = 1; @endphp
                                @foreach ($moduleslist as $row)
                                <tr>
						            <td>{{ $cnt++ }}</td>
						            <td><i class="{{ $row->display_icon }}"></i>&nbsp;{{ $row->display_name }}</td>
						            <td>{{ $row->module_name }}</td>
						            <td>{!! $row->is_visible_configsetup == '1' ? '<span style="color:green;">Yes</span>' : '<span style="color:red;">No</span>' !!}</td>
						            <td>{{ $row->display_order }}</td>
						            <td>{!! $row->status == '1' ? '<span style="color:green;">Active</span>' : '<span style="color:red;">Inactive</span>' !!}</td>
						            <td>
                                        <a href="{{ url('admin/advancesetting/addmodule')}}/{{encrypt($row->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('deletemodule', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
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