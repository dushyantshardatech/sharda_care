@extends('admin/admin_layout')
@section('title', 'Add Menu')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/managemenu')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/managesubmenu/add')}}" class="add-indent"> Add Submenu</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="header-admin">
            <div class="card-header card-header-new ">
        	    <h3>Add / Edit Menu</h3>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
		<div class="card-body table-body-new">
		    <div class="table-responsive">
                <div class="indent-form">
                    <form method="post" action="{{ route('addsubmenu') }}" enctype="multipart/form-data">
                    @csrf
		                <input type="hidden" name="id" name="id" value="{{$id}}" />
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Menu Name</label>
                                        <select name="menu_id" class="form-control">
                                            <option value="">Select a menu</option>
                                            @foreach($menu_list as $row)
                                            <option value="{{ $row->id }}" {{ $menu_id == $row->id ? 'selected' : '' }}>{{ $row->menu_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('menu_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Submenu Name</label>
                                        <input type="text" name="submenu_name" id="submenu_name" value="{{$submenu_name}}" class="form-control" required />
                                        @error('menu_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Display Name</label>
                                        <input type="text" name="display_name" id="display_name" value="{{$display_name}}" class="form-control" required />
                                        @error('display_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Submenu URL</label>
                                        <input type="text" name="submenu_url" id="submenu_url" value="{{$submenu_url}}" class="form-control" required />
                                        @error('submenu_url')
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
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>SEO Title</label>
                                        <div class="form-label-group">
                                            <input type="text" name="seo_title" id="seo_title" value="{{$seo_title}}" class="form-control" />
                                            @error('seo_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>SEO Keywords</label>
                                        <div class="form-label-group">
                                            <textarea name="seo_keywords" class="form-control">{{$seo_title}}</textarea>
                                            @error('seo_keywords')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>SEO Description</label>
                                        <div class="form-label-group">
                                            <textarea name="seo_description" class="form-control">{{$seo_title}}</textarea>
                                            @error('seo_description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <a href="{{url('admin/managesubmenu')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                        <button name="add" value="Save" class="button2">Save Submenu</button>
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