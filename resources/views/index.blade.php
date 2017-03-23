@extends('layouts.master')

@section('content')
<div class="row">
        <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> All posts </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($leads->isEmpty())
                    <p> There is no post.</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Updated At</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr>
                                <td>{!! $lead->id !!}</td>
                                <td>
                                    <a href="#">{!! $lead->title !!} </a>
                                </td>
                                <td>{!! $lead->first_name !!}</td>
                                <td>{!! $lead->created_at !!}</td>
                                <td>{!! $lead->updated_at !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection