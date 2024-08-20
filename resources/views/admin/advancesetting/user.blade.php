@extends('admin/admin_layout')
@section('title', 'Manage Users')
@section('users_active', 'active')
@section('contents')
<div id="page-head">
    <a href="{{ url('admin/dashboard') }}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    <a href="{{ url('admin/advancesetting/adduser') }}" class="add-indent"> Add User</a>
</div>
<div id="content-wrapper">
    <div class="admin-roles">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Manage Users</li>
            </ol>
        </div>
        <div class="admin-container">
            <div class="header-admin">
                <div class="card-header card-header-new">
                    <h3><i class="fas fa-fw fa-tachometer-alt"></i> Manage Users</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="dash-4sec for-map">
                        <div class="empsearchs">
                            <h3>Add User</h3>
                            <a href="{{ url('admin/advancesetting/adduser') }}" class="addemployee"><strong>+</strong></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="dash-4sec for-map">
                        <form method="post" name="user_search" action="">
                            <div class="empsearchs">
                                <h3>User Search</h3>
                                <div class="clearfix"></div>
                                <div class="empl-left">
                                    <input type="text" name="email" id="email" value="" placeholder="Enter Email">
                                </div>
                                <div class="empl-left-or">
                                    <strong>or</strong>
                                </div>
                                <div class="empl-left">
                                    <input type="text" name="name" id="name" value="" placeholder="Enter Name">
                                </div>
                                <div class="clearfix"></div>
                                <input type="submit" class="button2" name="Search" value="Search" />
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="card-body table-body-new">
                <div class="table-responsive">
                    <div class="student-detail-table">
                        <!-- Success Message -->
                        @if (session('success'))
                            <p style="color:green; font-size:18px;">{{ session('success') }}</p>
                        @endif
                        <table id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($userdetails))
                                    @php $cnt = 1; @endphp
                                    @foreach ($userdetails as $row)
                                        <tr>
                                            <td>{{ htmlentities($cnt) }}</td>
                                            <td>{{ htmlentities($row->name) }}</td>
                                            <td>{{ htmlentities($row->email) }}</td>
                                            <td>{{ $row->role_id }}</td>
                                            <td>
                                                <a href="{{ url('admin/advancesetting/adduser')}}/{{encrypt($row->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="{{ route('deleteuser', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @php $cnt++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No Record found</td>
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
