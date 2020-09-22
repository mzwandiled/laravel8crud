@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-12 mt-5">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
            <h1 class="display-3 mt-5">Display Contacts</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>City</th>
                        <th>Country</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->first_name}}</td>
                            <td>{{$contact->last_name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->job_title}}</td>
                            <td>{{$contact->city}}</td>
                            <td>{{$contact->country}}</td>
                            <td><a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-primary ">Edit</a></td>
                            <td>
                                <form action="{{route('contacts.destroy',$contact->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection()

