@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Users</h3>
        </div>

        <div class="title_right">
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4 style="color: transparent;">Users</h4>
                    <div class="nav navbar-right panel_toolbox" style="margin-top: -3.5rem;">
                        <a class="btn btn-primary" href="javascript:;">Add a user</a>
                    </div>
                </div>
                <div class="x_content">
                    <table id="users" class="table table-striped table-bordered">
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-userdelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Delete User</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete the selected user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="doDeleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script>

    var g_id = -1;

    $(document).ready(function() {
        getUsers();
    });

    function getUsers() {
        $('#users').DataTable({
            ajax: {
                url: "{{ url('admin/users') }}" + "?format=datatable",
                type: "GET"
            },
            columns: [
                {
                    data: "id",
                    title: "ID"
                },
                {
                    data: "email",
                    title: "Email"
                },
                {
                    data: "name",
                    title: "Name"
                },
                {
                    data: function(d) {
                        var ret = "";
                        if (d.active == 1) {
                            ret = "<span class='label label-success' style='font-size: 11px;'>Yes</span>";
                        } else {
                            ret = "<span class='label label-danger' style='font-size: 11px;'>No</span>";
                        }
                        return ret;
                    },
                    title: "Active"
                },
                {
                    data: function(d) {
                        var ret = "";
                        if (d.id != "1") {
                            ret = 
                                ("<a href='javascript:;' title='Edit' style='margin-left: 8px;'").replace("__id", d.id) +
                                    "<span class='fa fa-pencil'></span>" +
                                "</a>" +
                                "<a href='javascript:;' onclick='onDeleteUser(\"" + d.id + "\")' title='Delete' style='margin-left: 15px;' data-toggle='modal' data-target='#modal-userdelete'>" +
                                    "<span class='fa fa-trash'></span>" +
                                "</a>";
                        }
                        return ret;
                    },
                    title: "Action"
                },
            ]
        });
    }

    function onDeleteUser(id) {
        g_id = id;
    }

    function doDeleteUser() {
        $.ajax({
            type: "DELETE",
            url: ("{{ route('users.destroy', '__id') }}").replace('__id', g_id),
            data: '_token={{ csrf_token() }}',
            success: function(data) {
                window.location.reload();
            }
        });
    }

</script>

@endsection
