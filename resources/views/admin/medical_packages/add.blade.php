@extends('admin/admin_layout')
@section('title', 'Add Banner')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/medicalpackages')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/medicalpackages/add')}}" class="add-indent"> Add Medical Packages</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="header-admin">
            <div class="card-header card-header-new ">
        	    <h3>Add / Edit Medical Packages</h3>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
		<div class="card-body table-body-new">
		    <div class="table-responsive">
                <div class="indent-form">
                    <form method="post" action="{{ route('addpackage') }}" enctype="multipart/form-data">
                    @csrf
		                <input type="hidden" name="id" name="id" value="{{$id}}" />
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Upload an Image</label>
                                        <input type="file" name="images" id="images" value="{{$images}}" accept="image/png, image/jpg, image/jpeg" class="form-control" @if(!$images) required @endif />
                                        @if($images)
                                            <img src="{{ asset('storage/images/medical_packages/' . $images) }}" style="width:60px">
                                        @endif
                                        @error('images')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Title</label>
                                        <input type="text" name="title" id="title" value="{{$title}}" class="form-control" />
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Slug</label>
                                        <input type="text" name="slug" id="slug" value="{{$slug}}" class="form-control" />
                                        @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Medical Package Description</label>
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
                                        <a href="{{url('admin/medicalpackages')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                        <button name="add" value="Save" class="button2">Save Package</button>
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
<script>
    $(document).ready(function() {
        $(`#title`).on('change', function() {
            let title   = $(this).val().trim();
            if(title) {
                title   = title.replace(/\s+/g, '-');
                $(`#slug`).val(title.toLowerCase());
            }
        });
    });
</script>
@endsection