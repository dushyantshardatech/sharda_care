@extends('admin/admin_layout')
@section('title', 'Add Banner')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/managemenu')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/managebanner/add')}}" class="add-indent"> Add Banner</a>
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
                    <form method="post" action="{{ route('addbanner') }}" enctype="multipart/form-data">
                    @csrf
		                <input type="hidden" name="id" name="id" value="{{$id}}" />
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Banner Name</label>
                                        <input type="text" name="banner_name" id="banner_name" value="{{$banner_name}}" class="form-control" required />
                                        @error('banner_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Banner URL</label>
                                        <input type="text" name="banner_url" id="banner_url" value="{{$banner_url}}" class="form-control" required />
                                        @error('banner_url')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Upload Banner</label>
                                        <input type="file" name="banner_images" id="banner_images" value="{{$banner_images}}" accept="image/png, image/jpg, image/jpeg" class="form-control" @if(!$banner_images) required @endif />
                                        @if($banner_images)
                                            <img src="{{ asset('storage/images/banners/' . $banner_images) }}" style="width:60px">
                                        @endif
                                        @error('banner_images')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Banner for Main menu</label>
                                        <select class="form-control" name="mainmenu_id" id="mainmenu_id" required>
                                            <option selected>Select an Option</option>
                                            @foreach($main_menu as $menu)
                                            <option value="{{$menu->id}}" {{ $mainmenu_id == $menu->id ? 'selected' : '' }}>{{$menu->menu_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('mainmenu_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Banner for Sub menu</label>
                                        <select class="form-control"  name="submenu_id" id="submenu_id">
                                            <option selected value="0">Select an Option</option>
                                            @foreach($sub_menu as $menu)
                                                <option value="{{$menu->id}}" {{ $submenu_id == $menu->id ? 'selected' : '' }}>{{$menu->submenu_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('submenu_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Banner Heading</label>
                                        <input type="text" name="banner_text" id="banner_text" value="{{$banner_text}}" class="form-control" required />
                                        @error('banner_text')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Banner Description</label>
                                        <input type="text" name="banner_desc" id="banner_desc" value="{{$banner_desc}}" class="form-control" required />
                                        @error('banner_desc')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Button URL</label>
                                        <input type="text" name="button_url" id="button_url" value="{{$button_url}}" class="form-control" required />
                                        @error('button_url')
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
                                        <a href="{{url('admin/managebanners')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                        <button name="add" value="Save" class="button2">Save Banner</button>
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
        $(`#mainmenu_id`).on('change', function() {
            let menu_id     = $(this).val();
            if(menu_id) {
                $.ajax({
                    type:"POST",
                    url:"{{ route('getsubmenus') }}",
                    data: { _token: "{{ csrf_token() }}", menu_id: menu_id},
                    dataType: 'json',
                    success:function(data){
                        if(data) {
                            $('#submenu_id').empty();
                            $.each(data, function(key, value){
                                $('#submenu_id').append('<option value="'+value.id+'">'+value.submenu_name+'</option>');
                            });
                        } else {
                            $('#submenu_id').empty();
                            $('#submenu_id').append('<option value="0">Select a option</option>');
                        }
                    }
                });
            } else {
                $('#submenu_id').empty();
            }
        });
    });
</script>
@endsection