@extends('layouts.layout')
@section('head')
@parent
@stop
@section('content')
{{ Form::model($user, array('route' => array('user.selfupdate'),'method' => 'put')) }}
<section class="content">
<div class="box">
    <div class="box-header">
        <h3>User Profile</h3>
    </div>
    <div class="box-body clearfix">
        <div class="form-group col-md-6">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" placeholder="Enter ..." class="form-control" value="{{ $user->first_name }}">
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" placeholder="Enter ..." class="form-control" value="{{ $user->last_name }}">
        </div>
        <div class="form-group col-md-6">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Enter ..." class="form-control" readonly="readonly"  value="{{ $user->username }}">
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input name="email" id="email" type="text" class="form-control" placeholder="email" readonly="readonly"  value="{{ $user->email }}">
        </div>
        <div class="form-group col-md-6">
            <label for="password">Password:</label>
            <input name="password" id="password" type="password" class="form-control" autocomplete="off" placeholder="Password" value="">
        </div>
        <div class="form-group col-md-6">
            <label for="password2">Re-Password:</label>
            <input name="password2" id="password2" type="password" class="form-control" autocomplete="off"  placeholder="Password" value="">
        </div>
    </div>
    <div class="box-footer clearfix">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</div>
</section>
{{ Form::token() }}
{{ Form::close() }}
@stop
