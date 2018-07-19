@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{Session::get('success')}}
            </div>
        </div>
        @elseif(Session::has('fail'))
        <div class="container">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{Session::get('fail')}}
            </div>
        </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('employee/create')}}">
                        <button type="submit" class="btn btn-primary" style="margin-right: 20px;">
                        Add Employee
                        </button>
                    </a>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="col-md-12 col-md-offset-0">
                        <div style="overflow-x:auto;">
                            <table>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->company->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone_number}}</td>
                                    <td>
                                        <a href="{{url('employee/edit/'. $employee->id)}}">
                                            <button type="submit" class="btn btn-success">
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url('employee/destroy/'. $employee->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    {{ $employees->links('layouts.pagination_toolbar') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection