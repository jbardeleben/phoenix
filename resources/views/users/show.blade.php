@extends('templates.pages')

@section('pagetitle')
- Administrator
@endsection

<!-- These will need to be available on the ADMIN-ONLY accounts ONLY! 
<div class="btn-group">
  <a href="" class="btn btn-default">Suspend *</a>
  <a href="" class="btn btn-default">Delete *</a>
</div> btn-group
-->
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <p class="text-danger">Status: Testing/Debugging (as: Admin)</p>
      <h1>Viewing: {{ $user->name }}</h1>
      <hr>
      <div class="col-md-10">
        <table class="table table-hover table-condensed">
          <thead>
            <tr>
              <th>Field</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#</td>
              <td>{{ $user->id }}</td>
            </tr>
            <tr>
              <td>Full Name</td>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <td>Email Address</td>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <td>Registered</td>
              <td>{{ date('M d, Y, H:i:s', strtotime($user->created_at)) }}</td>
            </tr>
            <tr>
              <td>Modified</td>
              <td>{{ date('M d, Y, H:i:s', strtotime($user->updated_at)) }}</td>
            </tr>
          </tbody>
        </table>
      </div><!-- col-md-10 -->

      <!-- table sidebar (I'm going to have to create my own vertical stack "bar" here) -->
      <div class="col-md-2" role="group" aria-label="User Account Control Buttons">
        <p>
          <a href="{{ route('users.index') }}" class="btn btn-primary btn-block" aria-label="View All Users Button">View All</a>
        </p>
        <p>
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block" aria-label="Edit User Information Button">Edit</a>
        </p>
        <p>
          {!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'POST']) !!}
            {!! Form::submit('Suspend', ['class'=>'btn btn-danger btn-block']) !!}
          {!! Form::close() !!}
        </p>
        <p>
          {!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'DELETE']) !!}
            {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
          {!! Form::close() !!}
        </p>
      </div><!-- col-md-2 -->
    </div><!-- col-md-8 col-md-offset-2 -->
  </div><!-- row (parent) -->
@endsection