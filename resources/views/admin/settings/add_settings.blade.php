@extends('admin/admin_layout')
@section('title', 'Add Settings')
@section('modules_active', 'active')
@section('contents')
<div id="page-head">
	<a href="{{url('admin/dashboard')}}" class="back-indent"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
    <a href="{{url('admin/managesettings/add')}}" class="add-indent"> Add Settings</a>
</div>
<div id="content-wrapper">
    <!-- Main content -->
    <div class="admin-roles">
        <div class="header-admin">
            <div class="card-header card-header-new ">
        	    <h3>Add / Edit Settings</h3>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
		<div class="card-body table-body-new">
		    <div class="table-responsive">
                <div class="indent-form">
                    <form method="post" action="{{ route('addsettings') }}" enctype="multipart/form-data">
                    @csrf
		                <input type="hidden" name="id" name="id" value="{{$id}}" />
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Upload Logo</label>
                                        <div class="form-label-group">
                                            <input type="file" name="logo" id="logo" class="form-control" value="{{$logo}}" accept="image/png" @if(!$logo) required @endif />
                                            @if($logo)
                                                <img src="{{ asset('storage/images/logo/' . $logo) }}" style="width:50px">
                                            @endif
                                            @error('logo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Contact No</label>
                                        <div class="form-label-group">
                                            <input type="number" name="contact_no" id="contact_no" value="{{$contact_no}}" class="form-control" required />
                                            @error('contact_no')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Facebook Icon</label>
                                        <div class="form-label-group">
                                            <input type="text" name="facebook_icon" id="facebook_icon" value="{{$facebook_icon}}" class="form-control" required />
                                            @error('facebook_icon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Facebook Link</label>
                                        <div class="form-label-group">
                                            <input type="text" name="facebook_link" id="facebook_link" value="{{$facebook_link}}" class="form-control" required />
                                            @error('facebook_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Twitter Icon</label>
                                        <div class="form-label-group">
                                            <input type="text" name="twitter_icon" id="twitter_icon" value="{{$twitter_icon}}" class="form-control" required />
                                            @error('twitter_icon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Twitter Link</label>
                                        <div class="form-label-group">
                                            <input type="text" name="twitter_link" id="twitter_link" value="{{$twitter_link}}" class="form-control" required />
                                            @error('twitter_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Instagram Icon</label>
                                        <div class="form-label-group">
                                            <input type="text" name="instagram_icon" id="instagram_icon" value="{{$instagram_icon}}" class="form-control" />
                                            @error('instagram_icon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Instagram Link</label>
                                        <div class="form-label-group">
                                            <input type="text" name="instagram_link" id="instagram_link" value="{{$instagram_link}}" class="form-control" />
                                            @error('instagram_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>YouTube Icon</label>
                                        <div class="form-label-group">
                                            <input type="text" name="youtube_icon" id="youtube_icon" value="{{$youtube_icon}}" class="form-control" />
                                            @error('youtube_icon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>YouTube Link</label>
                                        <div class="form-label-group">
                                            <input type="text" name="youtube_link" id="youtube_link" value="{{$youtube_link}}" class="form-control" />
                                            @error('youtube_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Linkedin Icon</label>
                                        <div class="form-label-group">
                                            <input type="text" name="linkedin_icon" id="linkedin_icon" value="{{$linkedin_icon}}" class="form-control" />
                                            @error('linkedin_icon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-row">
                                        <label>Linkedin Link</label>
                                        <div class="form-label-group">
                                            <input type="text" name="linkedin_link" id="linkedin_link" value="{{$linkedin_link}}" class="form-control" />
                                            @error('linkedin_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                        <a href="{{url('admin/dashboard/managesettings')}}" class="btn btn-block btn-cancel"> Cancel</a>
                                        <button name="add" value="Save" class="button2">Save Settings</button>
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