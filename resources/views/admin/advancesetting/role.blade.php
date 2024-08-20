@extends('admin/admin_layout')
@section('title', 'Role')
@section('roles_active', 'active')
@section('contents')
<div id="page-head">
    <a href="{{ url('admin/dashboard') }}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>

<div id="content-wrapper">
    <div class="admin-roles">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}">Central Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Manage Role</li>
            </ol>
        </div>
        <div class="admin-container">   
            <div class="header-admin">
                <div class="card-header card-header-new">
                    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Role </h3>
                    <a href="{{ url('admin/advancesetting/addrole') }}" class="add-indent"> Add Role</a>
                    <div class="clearfix"></div>
                </div> 
            </div>
            
            <div class="card-body table-body-new">
                <div class="table-responsive">
                    <div class="student-detail-table">
                        @if (session('success'))
                            <p style="color:green; font-size:18px;">{{ session('success') }}</p>
                        @endif
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Module Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($roleslist))
                                    @php $cnt = 1; @endphp
                                    @foreach ($roleslist as $row)
                                        @php $moduleidsArray = explode(',', $row->module_ids); @endphp
                                        <tr>
                                            <td>{{ $cnt }}</td>
                                            <td>{{ $row->role_name }}</td>
                                            <td>
                                                @if ($row->module_ids != 'All')
                                                    @foreach ($moduleidsArray as $key => $val)
                                                        @if (!empty($val))
                                                            <span class="alert alert-info">{{ $moduleArray[$key]->display_name }}</span>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <span class="alert alert-danger">{{ $row->module_ids }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/advancesetting/addrole')}}/{{encrypt($row->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="{{ route('deleterole', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @php $cnt++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No Record found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="bottom-indent">
                <a href="{{ url('admin/advancesetting/addrole') }}">+</a>
            </div>
        </div>
    </div>
</div>
@endsection