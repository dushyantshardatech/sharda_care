@extends('admin/admin_layout')
@section('title', 'Add Privacy Policy')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/privacy-policy')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/privacy-policy/add')}}" class="add-indent"> Add Privacy Policy</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="header-admin">
            <div class="card-header card-header-new ">
        	    <h3>Add / Edit Privacy Policy</h3>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
		<div class="card-body table-body-new">
		    <div class="table-responsive">
                <div class="indent-form">
                    <form method="post" action="{{ route('addpolicies') }}" enctype="multipart/form-data">
                    @csrf
		                <input type="hidden" name="id" name="id" value="{{$id}}" />
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Tab Name</label>
                                        <select name="tab_id" class="form-control">
                                            <option>--- Select an option ---</option>
                                            <option value="1" {{ isset($tab_id) && $tab_id == 1 ? 'selected' : '' }}>Privacy Policy</option>
                                            <option value="2" {{ isset($tab_id) && $tab_id == 2 ? 'selected' : '' }}>Terms & Condition</option>
                                        </select>
                                        @error('tab_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Description</label>
                                        <textarea name="description" id="editor" class="form-control">{{$description}}</textarea> 
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Display Order</label>
                                        <div class="form-label-group">
                                            <input type="number" name="display_order" id="display_order" value="{{$display_order}}" class="form-control" required />
                                            @error('display_order')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
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
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <a href="{{url('admin/privacy-policy')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                        <button name="add" value="Save" class="button2">Save Privacy Policy</button>
                                    </div> 
                                    <div class="col-md-5">&nbsp;</div>
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