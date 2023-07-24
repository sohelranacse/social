<div class="row gx-3">
    <div class="col-lg-7">
        <div class="group-inner bg-white border rounded p-3">
            <div class="gr-search">
                <h3 class="h6"><span><i class="fa-solid fa-users"></i></span>{{ get_phrase('Group') }}</h3>
                <form action="{{ route('search.group') }}" method="GET">
                    <input type="text" class="bg-secondary rounded" name="search" placeholder="{{ get_phrase('Search Group')}}">
                    <span class="i fa fa-search"></span>
                </form>
            </div>
            <div class="page-suggest mt-4">
                <h3 class="h6">{{ get_phrase('All Groups') }}</h3>
                <div class="ps-wrap mt-3 justify-content-between">
                    <div class="row gx-2" id="groupLodingView">
                        @include('frontend.groups.group-single')
                    </div>
                </div>
            </div>
        </div>
    </div><!--  Group Content Inner Col End -->
    @include('frontend.groups.right-sidebar')
</div>