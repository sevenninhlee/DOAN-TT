@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3> User / {{ $user->id=="" ? 'Add' : 'Edit' }} </h3>
        </div>

        <div class="title_right">
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>{{ $user->id=="" ? 'Add a User' : 'Edit User' }}</h4>
                    </div>
                    <div class="x_content">
                        
                        <form id="form_useredit" class="form-horizontal form-label-left" novalidate>
                            <div class="item form-group" style="padding-bottom: 1.5rem;">
                                <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                                    <div id="message" class="ukalert" style="display: none;"></div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="email" name="email" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter email" type="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" name="password" class="form-control col-md-7 col-xs-12" placeholder="Enter new password" required value="{{ $user->plain_password }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="first_name" name="first_name" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter first name" type="text" value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="last_name" name="last_name" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter last name" type="text" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="order_number">Order Number <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="order_number" name="order_number" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter order number" type="text" value="{{ $user->order_number }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site">Site </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="site" name="site" class="form-control col-md-7 col-xs-12" placeholder="Enter site" type="text" value="{{ $user->site }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enabled">Enalbed </label>
                                <div class="checkbox col-md-7 col-xs-12">
                                    <label>
                                        <input type="checkbox" id="check_enable" {{ $user->enabled==1 || !$user->id ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a type="button" class="btn btn-primary" href="{{ route('users.index') }}">Cancel</a>
                                    <button id="send" class="btn btn-success">Save Changes</button>
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

$('#send').on('click', function(e) {
    e.preventDefault();
    $('#message').css('display', 'none');

    var enabled = $('#check_enable').prop('checked') ? 1 : 0;

    var id = $('#id').val();
    if (id == '') {
        $.ajax({
            type: "POST",
            url: ("{{ route('users.store') }}"),
            data: $('#form_useredit').serialize() + '&enabled=' + enabled,
            success: function (data) {
                $('#message').removeClass('alert-danger');
                $('#message').addClass('alert-success');
                $('#message').text('User has been successfully added.');

                setTimeout(function() {
                    window.location.href = "{{ route('users.index') }}";
                }, 1000);

                $('#message').css('display', 'block');
            },
            error: function (xhr, exception) {
                $('#message').removeClass('alert-success');
                $('#message').addClass('alert-danger');
                $('#message').text(xhr.responseJSON.errors[0]);

                $('#message').css('display', 'block');
            }
        });
    } else {
        $.ajax({
            type: "PUT",
            url: ("{{ route('users.update', '__id') }}").replace('__id', id),
            data: $('#form_useredit').serialize() + '&enabled=' + enabled,
            success: function(data) {
                $('#message').removeClass('alert-danger');
                $('#message').addClass('alert-success');
                $('#message').text('User information has been successfully updated.');

                setTimeout(function() {
                    window.location.href = "{{ route('users.index') }}";
                }, 1000);

                $('#message').css('display', 'block');
            },
            error: function(xhr, exception) {
                $('#message').removeClass('alert-success');
                $('#message').addClass('alert-danger');
                $('#message').text(xhr.responseJSON.errors[0]);

                $('#message').css('display', 'block');
            }
        });
    }
});

</script>

@endsection