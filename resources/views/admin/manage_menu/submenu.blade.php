@extends('admin/admin_layout')
@section('title', 'Manage Submenu')
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
                <li class="breadcrumb-item active">Manage Submenu</li>
            </ol>
        </div>
        <div class="admin-container">   
            <div class="header-admin">
                <div class="card-header card-header-new">
                    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Submenu </h3>
                    <a href="{{ url('admin/managesubmenu/add') }}" class="add-indent">+ Add Submenu</a>
                    <a href="{{ url('admin/managemenu') }}" class="add-indent" style="margin-right:5px"><- Back Mainmenu</a>
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
                                    <th>Main Menu Name</th>
                                    <th>Submenu Name</th>
                                    <th>Display Name</th>
                                    <th>Submenu Url</th>
                                    <th>Display Order</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($submenus))
                                @php $cnt = 1; @endphp
                                @foreach ($submenus as $row)
                                <tr>
                                    <td>{{$cnt}}</td>
                                    <td>{{$row['menu_name']}}</td>
                                    <td>{{$row['submenu']->submenu_name}}</td>
                                    <td>{{$row['submenu']->display_name}}</td>
                                    <td>{{$row['submenu']->submenu_url}}</td>
                                    <td>{{$row['submenu']->display_order}}</td>
                                    <td>{{$row['submenu']->status}}</td>
                                    <td>
                                        <a href="{{ url('admin/managesubmenu/add')}}/{{encrypt($row['submenu']->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('deletesubmenu', ['id' => encrypt($row['submenu']->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
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