@extends('admin/admin_layout')
@section('title', 'Manage Menu')
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
                <li class="breadcrumb-item active">Manage Menu</li>
            </ol>
        </div>
        <div class="admin-container">   
            <div class="header-admin">
                <div class="card-header card-header-new">
                    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Menu </h3>
                    <a href="{{ url('admin/managemenu/add') }}" class="add-indent">+ Add Menu</a>
                    <a href="{{ url('admin/managesubmenu') }}" class="add-indent" style="margin-right:5px">+ Add Submenu</a>
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
                                    <th>Menu Name</th>
                                    <th>Display Name</th>
                                    <th>Menu Url</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($menus))
                                @php $cnt = 1; @endphp
                                @foreach ($menus as $row)
                                <tr>
                                    <td>{{$cnt}}</td>
                                    <td>{{$row->menu_name}}</td>
                                    <td>{{$row->display_name}}</td>
                                    <td>{{$row->manage_url}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>
                                        <a href="{{ url('admin/managemenu/add')}}/{{encrypt($row->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('deletemenu', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                <a href="{{ url('admin/managemenu/add') }}">+</a>
            </div>
        </div>
    </div>
</div>
@endsection