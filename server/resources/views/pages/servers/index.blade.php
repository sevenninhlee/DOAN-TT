@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3> Servers </h3>
        </div>

        <div class="title_right">
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4 style="color: transparent;">Servers</h4>
                    <div class="nav navbar-right panel_toolbox" style="margin-top: -3.5rem;">
                        <a class="btn btn-primary" href="{{ route('servers.create') }}">Add a server</a>
                    </div>
                </div>
                <div class="x_content">
                    <table id="servers" class="table table-striped table-bordered">
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-serverdelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Delete Server</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete the selected server?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="doDeleteServer()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script>

    var g_serverid = -1;

    $(document).ready(function() {
        getServers();
    });

    function getServers() {
        $('#servers').DataTable({
            ajax: {
                url: "{{ route('servers.index') }}" + "?format=datatable",
                type: "GET"
            },
            columns: [
                {
                    data: "id",
                    title: "ID"
                },
                {
                    data: "name",
                    title: "Name"
                },
                {
                    data: "hostname",
                    title: "Hostname"
                },
                {
                    data: "country_code",
                    title: "Country Code"
                },
                {
                    data: "primary_address",
                    title: "Primary Address"
                },
                {
                    data: function(d) {
                        var ret = "";
                        if (d.enabled == 1) {
                            ret = "<span class='label label-success' style='font-size: 11px;'>Yes</span>"
                        } else {
                            ret = "<span class='label label-danger' style='font-size: 11px;'>No</span>"
                        }
                        return ret;
                    },
                    title: "Enabled"
                },
                {
                    data: function(d) {
                        var ret = "";
                        ret = 
                            ("<a href='{{url('/servers/__id/edit')}}' title='Edit' style='margin-left: 8px;'").replace('__id', d.id) +
                                "<span class='fa fa-pencil'></span>" +
                            "</a>" +
                            "<a href='javascript:;' onclick='onDeleteServer(\"" + d.id + "\")' title='Delete' style='margin-left: 15px;' data-toggle='modal' data-target='#modal-serverdelete'>" +
                                "<span class='fa fa-trash'></span>" +
                            "</a>";
                        return ret;
                    },
                    title: "Action"
                },
            ],
        });
    }

    function onDeleteServer(serverid) {
        g_serverid = serverid;
    }

    function doDeleteServer() {
        $.ajax({
            type: "DELETE",
            url: ("{{ route('servers.destroy', '__id') }}").replace('__id', g_serverid),
            data: '_token={{ csrf_token() }}',
            success: function(data) {
                window.location.reload();
            }
        });
    }

</script>

@endsection
