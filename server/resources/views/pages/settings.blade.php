@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3> Settings </h3>
        </div>

        <div class="title_right">
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>Change Password</h4>
                    </div>
                    <div class="x_content">
                        
                        <form id="form_password" class="form-horizontal form-label-left" novalidate>
                            <div class="item form-group" style="padding-bottom: 1.5rem;">
                                <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                                    <div id="message" class="ukalert" style="display: none;"></div>
                                </div>
                            </div>
                            {{csrf_field()}}
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current">Current Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="current" name="current" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter current password" type="password">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">New Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="new" name="new" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter new password" type="password">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm">Confirm Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="confirm" name="confirm" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter confirm password" type="password">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <input type="submit" class="btn btn-success" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>Change Profile</h4>
                    </div>
                    <div class="x_content">
                        
                        <form id="form_profile" class="form-horizontal form-label-left" novalidate>
                            <div class="item form-group" style="padding-bottom: 1.5rem;">
                                <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                                    <div id="message1" class="ukalert" style="display: none;"></div>
                                </div>
                            </div>
                            {{csrf_field()}}
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="email" name="email" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter user email" type="text" value="{{ Auth::User()->email}}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <input type="submit" class="btn btn-success" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendors/validator/validator.js') }}"></script>

<script>

$('#form_password').on('submit', function(e) {
    e.stopImmediatePropagation();
    e.preventDefault();

    if ($("#new").val() !== $("#confirm").val()) {
        $('#message').removeClass('alert-success');
        $('#message').addClass('alert-danger');
        $('#message').text("New password does not match.");
        $('#message').css('display', 'block');
        return;
    }

    $.ajax({
        type: "PUT",
        url: ("{{ route('admin.password') }}"),
        data: $('#form_password').serialize(),
        success: function(data) {
            if (data.status == 200) {
                $('#message').removeClass('alert-danger');
                $('#message').addClass('alert-success');
                $('#message').text('Your password has been changed successfully.');
            } else {
                $('#message').removeClass('alert-success');
                $('#message').addClass('alert-danger');
                $('#message').text("Could not change your password. Please enter the current password correctly.");
            }
            $('#message').css('display', 'block');

            setTimeout(function() {
                // $('#form_password input').val('');
            }, 2000);
        }
    });
});

$('#form_profile').on('submit', function(e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    
    $.ajax({
        type: "PUT",
        url: ("{{ route('admin.profile') }}"),
        data: $('#form_profile').serialize(),
        success: function(data) {
            if (data.status == 200) {
                $('#message1').addClass('alert-success');
                $('#message1').text('Your profile has been updated successfully.');
            } else {
                $('#message1').addClass('alert-danger');
                $('#message1').text("Could not update your profile.");
            }
            $('#message1').css('display', 'block');
        }
    });
})

</script>

@endsection