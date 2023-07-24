<div class="main_content">
    <!-- Start User Profile area -->
<div class="user-profile-area d-flex flex-wrap">
<!-- Left side -->
<div class="user-info d-flex flex-column">
<div class="user-info-basic d-flex flex-column justify-content-center">
<div class="user-graphic-element-1">
    <img src="{{ get_user_image(auth()->user()->photo),'optimized' }}" class="img-fluid rounded" alt="">
</div>

<div class="userImg">
    <img width="100%" src="{{ get_user_image(auth()->user()->photo),'optimized' }}" alt="">
</div>
<div class="userContent text-center">
    <h4 class="title mt-4">{{ auth()->user()->name }}</h4>
    <p class="info">{{ auth()->user()->user_role }}</p>
    <p class="user-status-verify">{{get_phrase('Verified')}}</p>
</div>
</div>
<div class="user-info-edit">
<div class="user-edit-title d-flex justify-content-between align-items-center">
    <h3 class="title">{{get_phrase('Details info')}}</h3>
</div>
<div class="user-info-edit-items">
    <div class="item">
    <p class="title">{{get_phrase('Email')}}</p>
    <p class="info">{{ auth()->user()->email }}</p>
    </div>
    <div class="item">
    <p class="title">{{get_phrase('Phone Number')}}</p>
    <p class="info">{{ auth()->user()->phone }}</p>
    </div>
    <div class="item">
    <p class="title">{{get_phrase('Address')}}</p>
    <p class="info">
    {{ auth()->user()->address }}
    </p>
    </div>
</div>
</div>
</div>
<!-- Right side -->
<div class="user-details-info">

<!-- Tab content -->
<div class="tab-content eNav-Tabs-content" id="myTabContent">
<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
    <div class="eForm-layouts">
    <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf                 
        <div class="fpb-7">
        <label for="eInputName" class="eForm-label">{{get_phrase('Name')}}</label>
        <input type="text" class="form-control eForm-control" id="eInputName" name="name" value="{{ auth()->user()->name }}" placeholder="{{get_phrase('Your name')}}" aria-label="Abu ishaqk">
        </div>
        <div class="fpb-7">
        <label for="eInputEmail" class="eForm-label">{{get_phrase('Email')}}</label>
        <input type="email" class="form-control eForm-control" id="eInputEmail" name="email" value="{{ auth()->user()->email }}" placeholder="example@email.com" aria-label="example@email.com">
        </div>

        <div class="fpb-7">
        <label for="designation" class="eForm-label">{{get_phrase('Profession')}}</label>
        <input type="text" class="form-control eForm-control" id="profession" name="profession" value="{{ auth()->user()->profession }}" placeholder="{{get_phrase('Enter your Profession')}}">
        </div>
        
        
        <div class="fpb-7">
        <label for="eBrithDay" class="eForm-label">{{get_phrase('Birthday')}}</label>
                            <input type="date" class="form-control eForm-control" id="eInputDate" name="dateofbirth" value="{{ auth()->user()->id }}">
        </div>
        <div class="fpb-7">
        <label for="eGenderList" class="eForm-label">{{get_phrase('Gender')}}</label>
        <select name="gender" class="form-control eForm-select">
            <option value="Male">{{get_phrase('Male')}}</option>
            <option value="Female">{{get_phrase('Female')}}</option>
        </select> </div>
        <div class="fpb-7">
        <label for="eInputPhone" class="eForm-label">{{get_phrase('Phone Number')}}</label>
        <input type="number" class="form-control eForm-control" id="eInputPhone" name="phone" value="{{ auth()->user()->phone }}" placeholder="00 (00) 12345 6789" aria-label="00 (00) 12345 6789">
        </div>
        <div class="fpb-7">
        <label for="eInputAddress" class="eForm-label">{{get_phrase('Address')}}</label>
        <input type="text" class="form-control eForm-control" id="eInputAddress" name="address" value="{{ auth()->user()->address }}" placeholder="{{get_phrase('Your address')}}" aria-label="Melbourne, S/A 120, Australia">
        </div>

        <div class="fpb-7">
        <label for="eInputAddress" class="eForm-label">{{get_phrase('Photo')}}</label>
        <input type="file" class="form-control" name="profile_photo" accept="image/*">
        </div>

    <button type="submit" class="userFormEdit-btn btn">{{get_phrase('Save Changes')}}</button>

    </form>
    </div>
</div>

</div>
</div>
</div>
<!-- End User Profile area -->
<!-- Start Footer -->
@include('backend.footer')
<!-- End Footer -->
</div>