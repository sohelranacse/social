<div class="col-lg-5">
        <aside class="sidebar plain-sidebar">
            <div class="widget">
                    <button class="btn btn-primary d-block w-100" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.groups.create'])}}', '{{get_phrase(' Create New Group')}}');" data-bs-toggle="modal"
                        data-bs-target="#newGroup"><i class="fa fa-plus-circle"></i>{{get_phrase(' Create New Group')}}</button>
            </div>
            <div class="widget">
                <div class="gr-search">
                    <h3 class="h6">{{ get_phrase('Groups')}}</h3>
                    <form action="{{ route('search.group') }}">
                        <input type="text" class="bg-secondary rounded" name="search" value="@if(isset($_GET['search'])) {{ $_GET['search'] }} @endif" placeholder="Search Group">
                        <span class="i fa fa-search"></span>
                    </form>
                </div>
            </div><!--  Widget End -->

            <div class="widget group-widget">
                <h3 class="widget-title">{{ get_phrase('Group you Manage') }}</h3>
                    @foreach ($managegroups as $managegroup )
                        <div class="d-flex align-items-center mt-3">
                            <div class="widget-img">
                                <img src="{{ get_group_logo($managegroup->logo,'logo') }}" alt="" class="img-fluid img-radisu">
                            </div>
                            <div class="widget-info ms-2">
                                <h6><a href="{{ route('single.group',$managegroup->id) }}">{{ $managegroup->title }}</a></h6>
                            </div>
                        </div>
                    @endforeach
                    @if (count($managegroups)>8)
                        <a href="{{ route('group.user.created') }}" class="btn btn-primary mt-3 d-block w-100">{{ get_phrase('See All') }}</a>
                    @endif
            </div> <!-- Widget End -->
            <div class="widget group-widget">
                <h3 class="widget-title">{{ get_phrase('Group you Joined') }}</h3>
                    @foreach ($joinedgroups as $joinedgroup )
                        <div class="d-flex align-items-center mt-3">
                            <div class="widget-img">
                                <img src="{{ get_group_logo($joinedgroup->getGroup->logo,'logo') }}" alt="" class="img-fluid img-radisu">
                            </div>
                            <div class="widget-info ms-2">
                                <h6><a href="{{ route('single.group',$joinedgroup->group_id) }}"> {{ $joinedgroup->getGroup->title }} </a></h6>
                            </div>
                        </div>
                    @endforeach
                    @if (count($joinedgroups)>8)
                        <a href="{{ route('group.user.joined') }}" class="btn btn-primary mt-3 d-block w-100">{{ get_phrase('See All') }}</a>
                    @endif
            </div> <!-- Widget End -->
        </aside>
    </div> <!-- Group Sidebar End -->