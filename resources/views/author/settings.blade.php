@extends('layouts.backend.app')

@section('title','Settings')

@push('css')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
  height: 10px;
}
@endpush

@section('content')
	<div class="container-fluid">
		<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SETTINGS
                            </h2>
                         
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i> PROFILE UPDATE
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#change_password_with_icon_title" data-toggle="tab" aria-expanded="true">
                                        <i class="material-icons">lock</i> CHANGE PASSWORD
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="profile_with_icon_title">
                                  	<form method="POST" class="form-horizontal" action="{{ route('author.profile.update') }}" enctype="multipart/form-data">
                                  		@csrf
                                  		@method('PUT')
                                  		<div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="name">Name</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="text" id="name" class="form-control" placeholder="Enter your name" name="name" value="{{ Auth::user()->name }}">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!--div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="email_address_2">Email Address</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="text" id="email_address_2" class="form-control" placeholder="Enter your email address" name="email" value="{{ Auth::user()->email }}">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div-->
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="email_address_2">Profile Image</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="file" name="image" id="profile-img">
		                                                <img src="" id="profile-img-tag" width="200px" />
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="email_address_2">About</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <textarea rows="5" name="about" class="form-control">{{ Auth::user()->about }}</textarea>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
		                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
		                                    </div>
		                                </div>
                            		</form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="change_password_with_icon_title">
                                    <form method="POST" class="form-horizontal" action="{{ route('author.password.update') }}">
                                  		@csrf
                                  		@method('PUT')
                                  		<div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="old_password">Old Password</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="password" id="old_password" class="form-control" placeholder="Enter your old password" name="old_password">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="password">New Password</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="password" id="password" class="form-control" placeholder="Enter your new password" name="password">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row clearfix">
		                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
		                                        <label for="confirm_password">Confirm Password</label>
		                                    </div>
		                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
		                                        <div class="form-group">
		                                            <div class="form-line">
		                                                <input type="password" id="confirm_password" class="form-control" placeholder="Enter your confirm password" name="password_confirmation">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <p id="passwordHelpBlock" class="form-text text-muted">
        									Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
										</p>
		                                <div class="row clearfix">
		                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
		                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
		                                    </div>
		                                </div>
                            		</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	</div>

@endsection

@push('js')
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();  

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });

</script>
@endpush