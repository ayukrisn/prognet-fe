@extends('layouts.app')

@section('title', 'Prognet | Dashboard ')

@section('content')

    <div class="card-body">
        <div class="table-responsive">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered user_datatable">
                    <thead>
              
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Identify Number</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                        <th width="50px" style="text-align: center; font-size: 15px;">
                            <button type="button" name="bulk_delete" id="bulk_delete"
                                class="btn btn-danger btn-xs">Delete</button>
                        </th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('AdminDashboard') }}",
                    method: "GET"
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_num',
                        name: 'phone_num'
                    },
                    {
                        data: 'birthdate',
                        name: 'birthdate'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'identify_number',
                        name: 'identify_number'
                    },
                    {
                        data: 'foto',
                        name: 'foto'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
