<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Configure amazon s3 settings') }}</h4>
            </div>
            <div class="export-btn-area">
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="eSection-wrap-2">
          <div class="eForm-layouts">
            <form method="POST" class="d-block ajaxForm" action="{{ route('admin.settings.amazon_s3.update') }}">
                
                @csrf
                <div class="fpb-7">
                    <label for="AWS_ACCESS_KEY_ID" class="eForm-label">{{ get_phrase('Status') }}</label>
                    <br>
                    <input type="radio" id="active" name="active" value="1" @if($amazon_s3_data['active'] == 1) checked @endif> <label for="active" class="text-13px">{{get_phrase('Active')}}</label>&nbsp;&nbsp;
                    <input type="radio" id="deactive" name="active" value="0" @if($amazon_s3_data['active'] == 0) checked @endif> <label for="deactive" class="text-13px">{{get_phrase('Deactive')}}</label>
                </div>
                <div class="fpb-7">
                    <label for="AWS_ACCESS_KEY_ID" class="eForm-label">{{ get_phrase('Access key id') }}</label>
                    <input type="text" class="form-control eForm-control" value="{{ $amazon_s3_data['AWS_ACCESS_KEY_ID'] }}" id="AWS_ACCESS_KEY_ID" name="AWS_ACCESS_KEY_ID" required="">
                </div>
                <div class="fpb-7">
                    <label for="AWS_SECRET_ACCESS_KEY" class="eForm-label">{{ get_phrase('Secret access key') }}</label>
                    <input type="text" class="form-control eForm-control" value="{{ $amazon_s3_data['AWS_SECRET_ACCESS_KEY'] }}" id="AWS_SECRET_ACCESS_KEY" name="AWS_SECRET_ACCESS_KEY" required="">
                </div>
                <div class="fpb-7">
                    <label for="AWS_DEFAULT_REGION" class="eForm-label">{{ get_phrase('Default region') }}</label>
                    <input type="text" class="form-control eForm-control" value="{{ $amazon_s3_data['AWS_DEFAULT_REGION'] }}" id="AWS_DEFAULT_REGION" name="AWS_DEFAULT_REGION" required="">
                </div>
                <div class="fpb-7">
                    <label for="AWS_BUCKET" class="eForm-label">{{ get_phrase('AWS bucket') }}</label>
                    <input type="text" class="form-control eForm-control" value="{{ $amazon_s3_data['AWS_BUCKET'] }}" id="AWS_BUCKET" name="AWS_BUCKET" required="">
                </div>
                <div class="fpb-7 pt-2">
                    <button type="submit" class="btn-form">{{ get_phrase('Save') }}</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="alert alert-success" role="alert">
            <h6 class="alert-heading">{{get_phrase('Heads up')}}!</h6>
            <hr class="my-1">
            <p class="mb-0 text-14px">When you activate Amazon s3, all types of files will be uploaded to your S3 bucket</p>
        </div>
      </div>
    </div>
    <!-- Start Footer -->
    @include('backend.footer')
    <!-- End Footer -->
</div>



