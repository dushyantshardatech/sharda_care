@extends('admin/admin_layout')
@section('title', 'Add / Edit User')
@section('users_active', 'active')
@section('contents')

<div id="page-head">
    <a href="{{ url('admin/advancesetting/user') }}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    <a href="{{ url('admin/advancesetting/user') }}" class="add-indent1"> View All Users</a>
</div>
<div id="content-wrapper">
    <div class="admin-roles">
        <div class="header-admin">
            <div class="card-header card-header-new">
                <h3>Add / Edit User</h3>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body table-body-new">
            <div class="table-responsive">
                <div class="indent-form">
                    @if (session('success'))
                    <p style="color:green; font-size:18px;">{{ session('success') }}</p>
                    @endif
                    @if (session('error'))
                    <p style="color:red; font-size:18px;">{{ session('error') }}</p>
                    @endif
                    <form method="post" action="{{ route('adduser') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}" />
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Employee ID</label>
                                        <div class="form-label-group">
                                            <input type="text" name="employee_id" id="employee_id" value="{{$employee_id}}" class="form-control" required />
                                            @error('employee_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Name</label>
                                        <div class="form-label-group">
                                            <input type="text" name="name" id="name" value="{{$name}}" class="form-control" required />
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Email</label>
                                        <div class="form-label-group">
                                            <input type="email" name="email" id="email" value="{{$email}}" class="form-control" required autocomplete="off"/>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Password</label>
                                        <div class="form-label-group">
                                            <input type="password" name="password" id="password" value="" class="form-control" required autocomplete="off"/>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Contact No</label>
                                        <div class="form-label-group">
                                            <input type="number" name="contact_no" id="contact_no" value="{{$contact_no}}" class="form-control" required />
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Assigned Role</label>
                                        <div class="form-label-group">
                                            <div class="form-row">
                                            @if (!empty($sd))
                                                @php $rolesArrays = explode(',',$sd->role_id); @endphp
                                                @foreach ($rolesArray as $row)
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="role_id[]" id="role_id" value="{{$row->id}}" {{ in_array($row->id, $rolesArrays) ? 'checked' : '' }}/>  {{ $row->role_name }}
						                        </div>
                                                @endforeach
                                            @else
                                            @foreach ($rolesArray as $row)
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="role_id[]" id="role_id" value="{{$row->id}}"/>  {{ $row->role_name }}
						                        </div>
                                            @endforeach
                                            @endif
                                            </div>
                                            @error('role_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Permission Access</label>
                                        <div class="form-label-group">
                                            @if (!empty($access_id))
                                            <div class="form-row">
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="all" {{ in_array('all', $access_id) ? 'checked' : '' }}/> All
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="1" {{ in_array('1', $access_id) ? 'checked' : '' }}/> Add Record
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="2" {{ in_array('2', $access_id) ? 'checked' : '' }}/> Edit Record
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="3" {{ in_array('3', $access_id) ? 'checked' : '' }}/> View Record
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="4" {{ in_array('4', $access_id) ? 'checked' : '' }}/> Delete Record
						                        </div>
                                            </div>
                                            @else
                                            <div class="form-row">
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="all"/> All
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="1"/> Add Record
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="2"/> Edit Record
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="3"/> View Record
						                        </div>
                                                <div class="col-md-4" style="margin-bottom:5px; margin-top:5px;">
						                            <input type="checkbox" name="accessed_id[]" value="4"/> Delete Record
						                        </div>
                                            </div>
                                            @endif
                                            @error('accessed_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
					                    <a href="{{url('admin/advancesetting/user')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                        <button name="adduser" value="Save Module" class="button2">Save User</button>
				                    <div class="col-md-5">&nbsp;</div>
			                    </div>
			                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
