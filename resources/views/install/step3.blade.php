@extends('install.index')
   
@section('content')
<?php if(isset($db_connection) && $db_connection != "") { ?>
  <div class="row ins-seven">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        <strong>{{ $db_connection }}</strong>
      </div>
    </div>
  </div>
<?php } ?>
<div class="row justify-content-center ins-two">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body px-4">
        <div class="panel panel-default ins-three" data-collapsed="0">
          <!-- panel body -->
          <div class="panel-body ins-four">
            <p class="ins-four">
              {{ __('Below you should enter your database connection details.').' '.__('If you’re not sure about these, contact your host.') }}
            </p>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal form-groups" method="post"
                  action="{{ route('step3') }}">
                  @csrf 
                  <hr>
                  <div class="form-group">
            				<label class="control-label">{{ __('Database Name') }}</label>
            					<input type="text" class="form-control eForm-control" name="dbname" placeholder=""
                        required autofocus>
                    <div>
                      {{ __('The name of the database you want to use with this application') }}
                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label">{{ __('Username') }}</label>
            					<input type="text" class="form-control eForm-control" name="username" placeholder=""
                        required>
                    <div>
                      {{ __('Your database Username') }}
                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label">{{ __('Password') }}</label>
            				<input type="password" class="form-control eForm-control" name="password" placeholder="">
                    <div>
                      {{ __('Your database Password') }}
                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label">{{ __('Database Host') }}</label>
            					<input type="text" class="form-control eForm-control" name="hostname" placeholder=""
                        required>
                    <div>
                      {{ __("If 'localhost' does not work, you can get the hostname from web host") }}
                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label"></label>
            					<button type="submit" class="btn btn-primary">{{ __('Continue') }}</button>
            			</div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection