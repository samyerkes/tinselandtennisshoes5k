@extends('base')

@section('content')
    
    <div class="row">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                All registrations
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>E-Contact</th>
                        <th>E-Telephone</th>
                        <th>Relationship</th>
                        <th>Timestamp</th>
                    </thead>
                    <tbody>
                        @foreach($registrations as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->fname }} {{ $r->lname }}</td>
                                <td>{{ $r->email }}</td>
                                <td>{{ $r->telephone }}</td>
                                <td>{{ $r->dob }}</td>
                                <td>{{ $r->street }}, {{ $r->state }} {{ $r->zipo }}</td>
                                <td>{{ $r->emergency_fname }} {{ $r->emergency_lname }}</td>
                                <td>{{ $r->emergency_telephone }}</td>
                                <td>{{ $r->emergency_relationship }}</td>
                                <td>{{ $r->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection