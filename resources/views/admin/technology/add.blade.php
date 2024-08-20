@extends('admin/admin_layout')
@section('title', 'Add Technology')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/technology')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/managetechnology/add')}}" class="add-indent"> Add Technology</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles"> 
        <div class="header-admin">
            <div class="card-header card-header-new ">
        	    <h3>Add / Edit Technology</h3>
                <div class="clearfix"></div>
            </div> 
            <div class="clearfix"></div>
        </div>
		<div class="card-body table-body-new">
		    <div class="table-responsive">
                <div class="indent-form">
                    <form method="post" action="{{ route('addtechnology') }}" enctype="multipart/form-data">
                    @csrf
		                <input type="hidden" name="id" name="id" value="{{$id}}" />
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Upload an Image</label>
                                        <input type="file" name="image" id="image" value="{{$image}}" accept="image/png, image/jpg, image/jpeg" class="form-control" @if(!$image) required @endif />
                                        @if($image)
                                            <img src="{{ asset('storage/images/technology/' . $image) }}" style="width:60px">
                                        @endif
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Heading</label>
                                        <input type="text" name="heading" id="heading" value="{{$heading}}" class="form-control" />
                                        @error('heading')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Slug</label>
                                        <input type="text" name="slug" id="slug" value="{{$slug}}" class="form-control" readonly/>
                                        @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Technology Description</label>
                                        <textarea name="content" id="editor" class="form-control">{{$content}}</textarea> 
                                        @error('content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        <a href="{{url('admin/technology')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                        <button name="add" value="Save" class="button2">Save Technology</button>
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
        $(`#heading`).on('change', function() {
            let title   = $(this).val().trim();
            if(title) {
                title   = title.replace(/\s+/g, '-');
                $(`#link`).val(title.toLowerCase());
            }
        });
    });
</script>
@endsection