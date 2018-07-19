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
                    <a href="{{url('company/create')}}">
                        <button type="submit" class="btn btn-primary" style="margin-right: 20px;">
                        Add Company
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Logo</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->website}}</td>
                                    <td><img src="{{ Storage::url($company->logo) }}" width="60" /></td>
                                    <td>
                                        <a href="{{url('company/edit/'. $company->id)}}">
                                            <button type="submit" class="btn btn-success">
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url('company/destroy/'. $company->id)}}" method="POST">
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
                    {{ $companies->links('layouts.pagination_toolbar') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection