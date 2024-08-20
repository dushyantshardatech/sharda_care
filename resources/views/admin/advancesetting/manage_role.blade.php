@extends('admin/admin_layout')
@section('title', 'Role')
@section('roles_active', 'active')
@section('contents')
<div id="page-head">
    <a href="{{ url('admin/advancesetting/role') }}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{ url('admin/advancesetting/role') }}" class="add-indent1"> VIEW ALL ROLES</a>
</div>
<div id="content-wrapper">
    <div class="admin-roles">
        <div class="header-admin">
            <div class="card-header card-header-new">
                <h3>Add / Edit Role</h3>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Success and Error Messages -->
        <div class="card-body table-body-new">
            <div class="table-responsive indent-form">
                @if (session('success'))
                    <p style="color:green; font-size:18px;">{{ session('success') }}</p>
                @endif
                @if (session('error'))
                    <p style="color:red; font-size:18px;">{{ session('error') }}</p>
                @endif
                <form method="post" action="{{ route('addrole') }}">
                @csrf
                    <input type="hidden" name="id" name="id" value="{{ $id }}" />
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Role Name</label>
                                <div class="form-label-group">
                                    <input type="text" class="form-control" name="role_name" required value="{{$role_name}}">
                                    @error('role_name')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Assign Module</label>
                                <div class="form-label-group">
                                    <div class="form-row">
                                        @if (!empty($sd))
                                            @php $moduleidsArray = explode(',', $sd->module_ids); @endphp
                                            <div class="col-md-4" style="margin-top:10px;">
                                                <input type="checkbox" name="module_ids[]" id="module_ids" value="All" {{ in_array('All', $moduleidsArray) ? 'checked' : '' }} /> <span class="alert alert-danger">All</span>
                                            </div>
                                            @foreach($moduleArray as $row)
                                                <div class="col-md-4" style="margin-bottom:10px;margin-top:10px;">
                                                    <input type="checkbox" name="module_ids[]" id="module_ids" value="{{ $row->id }}" {{ in_array($row->id, $moduleidsArray) ? 'checked' : '' }} /> <span class="alert alert-info">{{ $row->display_name }}</span>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-4" style="margin-top:10px;">
                                                <input type="checkbox" name="module_ids[]" id="module_ids" value="All" /> <span class="alert alert-danger">All</span>
                                            </div>
                                            @foreach($moduleArray as $row)
                                                <div class="col-md-4" style="margin-bottom:10px;margin-top:10px;">
                                                    <input type="checkbox" name="module_ids[]" id="module_ids" value="{{ $row->id }}" /> <span class="alert alert-info">{{ $row->display_name }}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Status</label>
                                    <div class="form-label-group">
                                        <select class="form-control" name="status" required>
                                            <option value="">Select Status</option>
                                            <option value="1" {{ isset($status) && $status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ isset($status) && $status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                <div class="col-md-6">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <a href="{{url('admin/advancesetting/role')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                <button name="addrole" value="Save Role" type="submit" class="button2">Save Role</button>
                            </div> 
                            <div class="col-md-5">&nbsp;</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection