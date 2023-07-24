
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('System Settings') }}</h4>
              
            </div>
            <div class="export-btn-area">
                
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-7">
        <div class="eSection-wrap-2">
            <div class="row">
                <div class="col-md-12 col-md-12 col-sm-12">
                  <div class="eForm-layouts">
                    <form method="POST" enctype="multipart/form-data" class="d-block" action="{{ route('admin.system.settings.view.save') }}">
                        @csrf
                        <div class="fpb-7">
                            <label for="system_name" class="eForm-label">{{ get_phrase('System Name') }} </label>
                            <input type="text" class="form-control eForm-control" value="{{ $system_name }}" id="system_name" name="system_name" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="system_title" class="eForm-label">{{ get_phrase('System Title') }} </label>
                             <input type="text" class="form-control eForm-control" value="{{ $system_title }}" id="system_title" name="system_title" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="system_email" class="eForm-label">{{ get_phrase('System Email') }}</label>
                            <input type="text" class="form-control eForm-control" value="{{ $system_email }}" id="system_email" name="system_email" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="system_phone" class="eForm-label">{{ get_phrase('System Phone') }}</label>
                            <input type="text" class="form-control eForm-control" value="{{ $system_phone }}" id="system_phone" name="system_phone" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="system_fax" class="eForm-label">{{ get_phrase('System Fax') }}</label>
                            <input type="text" class="form-control eForm-control" value="{{ $system_fax }}" id="system_fax" name="system_fax" >
                        </div>
                        <div class="fpb-7">
                            <label for="system_address" class="eForm-label">{{ get_phrase('Address') }}</label>
                            <input type="text" class="form-control eForm-control" value="{{ $system_address }}" id="system_address" name="system_address" required="">
                        </div>

                        <div class="fpb-7">
                            <label for="system_currency" class="eForm-label">{{ get_phrase('System currency') }}</label>
                            <select class="form-select select2" name="system_currency" id="system_currency">
                                @foreach(DB::table('currencies')->get() as $currency)
                                    <option value="{{$currency->code}}" <?php if(get_settings('system_currency') == $currency->code) echo 'selected'; ?>>{{$currency->code}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="fpb-7">
                            <label for="system_language" class="eForm-label">{{ get_phrase('System language') }}</label>
                            <select class="form-select select2" name="system_language" id="system_language">
                                @foreach(DB::table('languages')->select('name')->groupBy('name')->get() as $language)
                                    <option class="text-capitalize" value="{{$language->name}}" <?php if(get_settings('system_language') == $language->name) echo 'selected'; ?>>{{ucfirst($language->name)}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="fpb-7">
                            <label for="system_address" class="eForm-label">{{ get_phrase('Public signup') }}</label>
                            <select class="form-select eForm-control select2" name="public_signup">
                                <option value="1" <?php if(get_settings('public_signup') == 1) echo 'selected'; ?>>{{get_phrase('enabled')}}</option>
                                <option value="0" <?php if(get_settings('public_signup') != 1) echo 'selected'; ?>>{{get_phrase('disabled')}}</option>
                            </select> 
                        </div>

                        <div class="fpb-7">
                            <label for="ad_charge_per_day" class="eForm-label">{{ get_phrase('Ad charge per day') }}({{currency('')}})</label>
                            <input type="number" step="0.01" class="form-control eForm-control" value="{{ get_settings('ad_charge_per_day') }}" id="ad_charge_per_day" name="ad_charge_per_day">
                        </div>

                        <div class="fpb-7">
                            <label for="system_footer" class="eForm-label">{{ get_phrase('Footer') }}</label>
                            <input type="text" class="form-control eForm-control" value="{{ $system_footer }}" id="system_footer" name="system_footer" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="system_footer_link" class="eForm-label"> {{ get_phrase('Footer Link') }}</label>
                            <input type="text" class="form-control eForm-control" value="{{ $system_footer_link }}" id="system_footer_link" name="system_footer_link" >
                        </div>
                        <div class="fpb-7 pt-2">
                            <button type="submit" class="btn-form">{{ get_phrase('Update') }}</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-5">
        <div class="eSection-wrap-2">
            <div class="row">
                <div class="eForm-layouts">
                    <form method="POST" enctype="multipart/form-data" class="d-block" action="{{ route('admin.product.update') }}">
                        @csrf
                        <div class="fpb-7">
                            <label for="system_name" class="eForm-label">{{ get_phrase('Product Update') }} </label>
                            <input class="form-control eForm-control-file" id="formFileSm" type="file" name="file">
                        </div>
                        <div class="fpb-7 pt-2">
                            <button type="submit" class="btn-form">{{ get_phrase('Update') }}</button>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
      </div>
    </div>


    <div class="col-12 mt-5">
        <div class="eSection-wrap">
            <div class="eMain">
                <div class="row">
                    <div class="col-md-12 pb-3">
                        <p class="column-title">{{ get_phrase('SYSTEM LOGO') }}</p>
                        <div class="eForm-file">
                            <form method="POST" action="{{ route('admin.system.settings.logo.view.save') }}" enctype="multipart/form-data" class="d-block">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <label class="col-form-label" for="example-fileinput">{{ get_phrase('Dark logo') }}</label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="{{ get_system_logo_favicon($system_dark_logo,'dark') }}" class="mx-4 my-5" width="200px" alt="...">
                                            <div class="eCard-body">
                                                <input class="form-control eForm-control-file" id="formFileSm" type="file" name="dark_logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <label class="col-form-label" for="example-fileinput">{{ get_phrase('Light logo') }}</label>
                                        <div class="eCard d-block text-center bg-secondary">
                                            <img src="{{ get_system_logo_favicon($system_light_logo,'light') }}" class="mx-4 my-5" width="200px" alt="...">
                                            <div class="eCard-body">
                                            <input class="form-control eForm-control-file" id="formFileSm" type="file" name="light_logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <label class="col-form-label" for="example-fileinput">{{ get_phrase('Favicon') }}</label>
                                        <div class="eCard d-block text-center bg-light">
                                            <img src="{{ get_system_logo_favicon($system_fav_icon,'favicon') }}" class="mx-4 my-5" width="53px" height="60px" alt="...">
                                            <div class="eCard-body">
                                            <input class="form-control eForm-control-file" id="formFileSm" type="file" name="favicon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-form">{{ get_phrase('Update Logo') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.footer')
  </div>



