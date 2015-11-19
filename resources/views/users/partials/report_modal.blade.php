<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reportModalLabel">Create Report</h4>
            </div>
            <form action="{{ url('@'.$user->username.'/report') }}" method="post">
                <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="reason" class="control-label">Reason:</label>
                            <input type="text" name="reason" class="form-control" id="reason">
                        </div>
                        <div class="form-group">
                            <label for="meta" class="control-label">Message:</label>
                            <textarea class="form-control" name="meta" id="meta"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Send Report</button>
                </div>
            </form>
        </div>
    </div>
</div>