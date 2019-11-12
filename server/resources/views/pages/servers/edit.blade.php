@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3> Server / edit </h3>
        </div>

        <div class="title_right">
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>{{ $server->id=="" ? 'Add a Server' : 'Edit Server' }}</h4>
                    </div>
                    <div class="x_content">
                        
                        <form id="form_serveredit" class="form-horizontal form-label-left" novalidate>
                            <div class="item form-group" style="padding-bottom: 1.5rem;">
                                <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                                    <div id="message" class="ukalert" style="display: none;"></div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{ $server->id }}">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" name="name" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter name" type="text" value="{{ $server->name }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hostname">Hostname <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="hostname" name="hostname" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter host name" type="text" value="{{ $server->hostname }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_code">Country Code <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="country_code" name="country_code" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter country code" type="text" value="{{ $server->country_code }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="primary_address">Primary Address <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="primary_address" name="primary_address" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter primary address" type="text" value="{{ $server->primary_address }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="secondary_addresses">Secondary Addresses </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="secondary_addresses" name="secondary_addresses" class="form-control col-md-7 col-xs-12" placeholder="Enter secondary addresses" type="text" value="{{ $server->secondary_addresses }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="username" name="username" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter user name" type="text" value="{{ $server->username }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ifname">Interface Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="ifname" name="ifname" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter interface name" type="text" value="{{ $server->ifname }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" name="password" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter password" type="text" value="{{ $server->password }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enabled">Enalbed </label>
                                <div class="checkbox col-md-7 col-xs-12">
                                    <label>
                                        <input type="checkbox" id="enabled" {{ $server->enabled==1 || $server->id=='' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a type="button" class="btn btn-primary" href="{{ route('servers.index') }}">Cancel</a>
                                    <button id="send" type="" class="btn btn-success">Save Changes</button>
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

$(document).ready(function() {
});

$('#send').on('click', function(e) {
    e.preventDefault();
    $('#message').css('display', 'none');

    var enabled = $('#enabled').prop('checked') ? 1 : 0;

    var id = $('#id').val();
    if (id == '') {
        $.ajax({
            type: "POST",
            url: ("{{ route('servers.store') }}"),
            data: $('#form_serveredit').serialize() + '&enabled=' + enabled,
            success: function(data) {
                $('#message').removeClass('alert-danger');
                $('#message').addClass('alert-success');
                $('#message').text('Server has been successfully added.');

                setTimeout(function() {
                    window.location.href = "{{ route('servers.index') }}";
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
            url: ("{{ route('servers.update', '__id') }}").replace('__id', id=='' ? 0 : id),
            data: $('#form_serveredit').serialize() + '&enabled=' + enabled,
            success: function(data) {
                $('#message').removeClass('alert-danger');
                $('#message').addClass('alert-success');
                $('#message').text('Server information has been successfully updated.');

                setTimeout(function() {
                    window.location.href = "{{ route('servers.index'); }}";
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
    }
});

</script>

@endsection