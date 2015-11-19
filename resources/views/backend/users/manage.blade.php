@extends('layouts.backend')

@section('page_title')
    Manage Users
@stop

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.bootstrap.min.css">
@stop

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#manage').DataTable();
        } );
    </script>
@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Manage Users</h1>
        </div>

        <table id="manage" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Username</th>
                <th>Location</th>
                <th>Status</th>
                <th>Partner</th>
                <th>Sponsor</th>
                <th>SitePoint</th>
                <th>Signed up</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            @foreach($users as $user)
                <tr>
                    <td><strong>{{ $user->id }}</strong></td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->location }}</td>
                    <td>
                        @if($user->is_admin == true)
                            <span class="label label-primary">Administrator</span>
                            @else
                            <span class="label label-info">Artisan</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_partner == true)
                            <span class="label label-success">True</span>
                        @else
                            <span class="label label-info">False</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_sponsor == true)
                            <span class="label label-success">True</span>
                        @else
                            <span class="label label-info">False</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_sitepoint == true)
                            <span class="label label-success">True</span>
                        @else
                            <span class="label label-info">False</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a> <a target="_blank" href="{{ url('@'. $user->username) }}" class="btn btn-sm btn-default">Public Profile</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop