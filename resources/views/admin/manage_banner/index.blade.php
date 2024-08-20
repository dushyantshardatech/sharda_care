@extends('admin/admin_layout')
@section('title', 'Manage Banner')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/managebanners')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/managebanner/add')}}" class="add-indent"> Add Banner</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/Dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Banner</li>
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
				    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Banner </h3>
					<a href="{{url('admin/managebanner/add')}}">  <input type="button" name="button" id="button" value="Add New Banner"></a>
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
                                    <th>Banner Name</th>
                                    <th>Banner Image</th>
                                    <th>Banner Text</th>
                                    <th>Banner Link</th>
                                    <th>For Menu</th>
                                    <th>For Submenu</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
	                            @if(count($banner_list) > 0)
	                            @php $cnt = 1; @endphp
	                            @foreach ($banner_list as $row)
                                <tr>
                                    <td>{{ $cnt++ }}</td>
                                    <td>{{ $row['banners']->banner_name }}</td>
                                    <td><img src="{{ asset('storage/images/banners/'.$row['banners']->banner_images)}}" style="width:60px"></td>
                                    <td>{{ $row['banners']->banner_text }}</td>
                                    <td>{{ $row['banners']->banner_url }}</td>
                                    <td>{{$row['main_menu']->menu_name}}</td>
                                    <td>
                                        @if(!empty($row['sub_menu']))
                                           {{$row['sub_menu']->submenu_name}}
                                        @else
                                           No
                                        @endif
                                    </td>
                                    <td>{!! $row['banners']->status == '1' ? '<span style="color:green;">Active</span>' : '<span style="color:red;">Inactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ url('admin/managebanner/add')}}/{{encrypt($row['banners']->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('deletebanner', ['id' => encrypt($row['banners']->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
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