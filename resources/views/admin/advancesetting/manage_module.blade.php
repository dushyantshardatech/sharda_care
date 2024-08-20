@extends('admin/admin_layout')
@section('title', 'Manage Module')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/dashboard')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/advancesetting/addmodule')}}" class="add-indent"> Add Module</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="header-admin">
            <div class="card-header card-header-new ">
        	    <h3>Add / Edit Module</h3>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
		<div class="card-body table-body-new">
		    <div class="table-responsive">
                <div class="indent-form">
                    <form method="post" action="{{ route('addmodule') }}">
                    @csrf
		                <input type="hidden" name="id" name="id" value="{{ $id }}" />
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
					                <label>Module Display Name</label>
					                <div class="form-label-group">
					                    <input type="text" name="display_name" id="display_name" value="{{ $display_name }}" class="form-control" required />
                                        @error('display_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
					                </div>
		                        </div>
                            </div>
                        </div>  
			            <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
					                <label>Module Name</label>
					                <div class="form-label-group">
					                    <input type="text" name="module_name" id="module_name" value="{{ $module_name }}" class="form-control" required />
                                        @error('module_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
					                </div>
		                        </div>
                            </div>
                        </div>
			            <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
					                <label>Display Icon</label>
					                <div class="form-label-group">
					                    <input type="text" name="display_icon" id="display_icon" value="{{ $display_icon }}" class="form-control" required />
                                        @error('display_icon')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
					                </div>
		                        </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
			                    <div class="col-md-6">
					                <label>Display Order</label>
					                <div class="form-label-group">
                                        <input type="number" name="display_order" id="display_order" value="{{ $display_order }}" class="form-control" required />
                                        @error('display_order')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
					                </div>
		                        </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
				                    <label>Visible Config Setup</label>
					                <div class="form-label-group">
					                    <select class="form-control" name="is_visible_configsetup" required>
					                        <option value="">Visible Config Setup</option>
											<option value="1" {{ isset($is_visible_configsetup) && $is_visible_configsetup == 1 ? 'selected' : '' }}>Yes</option>
					                        <option value="0" {{ isset($is_visible_configsetup) && $is_visible_configsetup == 0 ? 'selected' : '' }}>No</option>
					                    </select>
                                        @error('is_visible_configsetup')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
					                </div>
					                <div class="col-md-6"> &nbsp;</div>
				                </div>
				            </div>
			            </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
				                    <label>Setup Type</label>
					                <div class="form-label-group">
					                    <select class="form-control" name="setup_type" required>
					                        <option value="">Select Setup Type</option>
					                        <option value="1" {{ $setup_type == 1 ? 'selected' : '' }}>Advance Setting</option>
					                        <option value="2" {{ $setup_type == 2 ? 'selected' : '' }}>Dashboard Pages</option>
					                    </select>
                                        @error('setup_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
					                </div>
					                <div class="col-md-6"> &nbsp;</div>
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
					                <div class="col-md-6"> &nbsp;</div>
				                </div>
				            </div>
			            </div>
			            <div class="form-group">
                            <div class="form-row">
 				                <div class="col-md-4">
					                <a href="{{url('admin/advancesetting/module')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                    <button name="addmodule" value="Save Module" class="button2">Save Module</button>
				                </div> 
				                <div class="col-md-5">&nbsp;</div>
			                </div>
			            </div>
                    </form>
		        </div>
		    </div>
	    </div>
    </div>
</div>
@endsection