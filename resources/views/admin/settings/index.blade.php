@extends('admin/admin_layout')
@section('title', 'Settings')
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
                <li class="breadcrumb-item active">Manage Settings</li>
            </ol>
        </div>
        <div class="admin-container">   
            <div class="header-admin">
                <div class="card-header card-header-new">
                    <h3> <i class="fas fa-fw fa-tachometer-alt"></i> Manage Settings </h3>
                    <a href="{{ url('admin/managesettings/add') }}" class="add-indent"> Add Settings</a>
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
                                    <th>Logo</th>
                                    <th>Contact No</th>
                                    <th>Facebook Link</th>
                                    <th>Twitter Link</th>
                                    <th>Instagram Link</th>
                                    <th>Youtube Link</th>
                                    <th>Linkedin Link</th>
                                    <th>Display Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($settings))
                            @php $cnt = 1; @endphp
                            @foreach ($settings as $row)
                                <tr>
                                    <td>{{ $cnt }}</td>
                                    <td><img src="{{ asset('storage/images/logo/' . $row->logo) }}" style="width:100px"></td>
                                    <td>{{$row->contact_no}}</td>
                                    <td><a href="{{ $row->facebook_link }}" target="_blank">{{ $row->facebook_link }}</a></td>
                                    <td>{{$row->twitter_link}}</td>
                                    <td>{{$row->instagram_link}}</td>
                                    <td>{{$row->youtube_link}}</td>
                                    <td>{{$row->linkedin_link}}</td>
                                    <td>{{$row->display_order}}</td>
                                    <td>
                                        <a href="{{ url('admin/managesettings/add')}}/{{encrypt($row->id) }}" class="ad-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('deletesetting', ['id' => encrypt($row->id)]) }}" class="ad-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                <a href="{{ url('admin/managesettings/add') }}">+</a>
            </div>
        </div>
    </div>
</div>
@endsection