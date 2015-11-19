<script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>

<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="signinModalLabel">Sign in</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('auth/register') }}" novalidate="novalidate" ng-model="formModel">
                    {!! csrf_field() !!}
                    <div class="form-group col-md-6">
                        {!! Form::label('name', 'Name') !!}
                        <input type="text"
                               class="form-control"
                               name="name"
                               ng-model="formModel.name"
                               id="name"
                               required="required" >
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('username', 'Username') !!}
                        <input type="text"
                               class="form-control"
                               name="username"
                               ng-model="formModel.username"
                               id="username"
                               required="required" >
                    </div>

                    <div class="form-group col-md-12">
                        {!! Form::label('email', 'Email') !!}
                        <input type="text"
                               class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-email"
                               ng-model="formModel.email"
                               name="email"
                               id="email"
                               required="required" >
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('password', 'Password') !!}
                        <input type="password"
                               class="form-control"
                               name="password"
                               ng-model="formModel.password"
                               id="password"
                               required="required"
                               ng-minlength="8">
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('password_confirmation', 'Confirm Password') !!}
                        <input type="password"
                               class="form-control"
                               name="password_confirmation"
                               ng-model="formModel.password_confirmation"
                               id="password"
                               required="required"
                               ng-minlength="8">
                    </div>

                    <div class="form-group col-md-12">
                        {!! Form::label('location', 'Location') !!} <small>(City, Country)</small>
                        <input type="text" name="location" id="location" class="form-control" g-places-autocomplete ng-model="place" required="required">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <a href="{{ url('auth/github') }}" class="btn btn-sm btn-social btn-github">
                    <i class="fa fa-github"></i>
                    Sign up with GitHub
                </a>
                <button type="button" class="btn btn-primary btn-sm">Sign Up</button>
            </div>
        </div>
    </div>
</div>