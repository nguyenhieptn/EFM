
{{ Form::open(array('route'=>'users.store')) }}
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">New Project</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="form-group col-md-6">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" placeholder="Enter ..." class="form-control" value="{{ Input::old('first_name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" placeholder="Enter ..." class="form-control" value="{{ Input::old('last_name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Enter ..." class="form-control" value="{{ Input::old('username') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="email" value="{{ Input::old('email') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password:</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" value="{{ Input::old('password') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="password2">Re-Password:</label>
                    <input name="password2" id="password2" type="password" class="form-control" placeholder="Password" value="{{ Input::old('password') }}">
                </div>

                <div class="form-group  col-md-6">
                    <label for="group_id">User Group</label>
                    {{ Form::select("group_id",$groupList, Input::old("group_id"),['class'=>'form-control']) }}
                </div>
            </div><!-- /modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{ Form::hidden('manager_id',Sentry::getUser()->id) }}
{{ Form::token() }}
{{ Form::close() }}