{{ Form::open(array('route' => array('users.destroy', $u->id), 'method' => 'delete','id'=>'rmUser')) }}
<!-- Modal -->
<div class="modal fade" id="rmUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Remove User</h4>
            </div>
            <div class="modal-body">
                    <h3>Are you sure? </h3>
            </div><!-- /modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}