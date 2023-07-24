<div class="row gx-3">
    <div class="col-lg-7">
        <div class="group-inner bg-white border rounded p-3">
            <div class="gr-search">
                <h3 class="h6"><span><i class="fa-solid fa-users"></i></span>{{ get_phrase('Group') }}</h3>
                <form action="{{ route('search.group') }}" method="GET">
                    <input type="text" class="bg-secondary rounded" name="search" placeholder="Search Group">
                    <span class="i fa fa-search"></span>
                </form>
            </div>
            <div class="page-suggest mt-4">
                <h3 class="h6">{{ get_phrase('Your Joined Groups')}}</h3>
                <div class="ps-wrap mt-3 justify-content-between">
                    <div class="row gx-2">
                        @foreach ($groups as $group)
                            <div class="col-md-4 col-lg-4 col-sm-6">
                                <div class="card p-2 rounded">
                                    <div class="mb-2"> <img class="img-fluid img-radisu" src="{{ get_group_logo($group->getGroup->logo,'logo') }}" ></div>
                                    <a href="{{ route('single.group',$group->getGroup->id) }}"><h4>{{ $group->getGroup->title }}</h4></a>
                                    @php $joined = \App\Models\Group_member::where('group_id',$group->getGroup->id)->where('is_accepted','1')->count(); @endphp
                                    <span class="small text-muted">{{ $joined }} Member @if($joined>1) s @endif</span>
                                    @php $join = \App\Models\Group_member::where('group_id',$group->getGroup->id)->where('user_id',auth()->user()->id)->count(); @endphp
                                    @if ($join>0)
                                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->getGroup->id); ?>')" class="btn btn-primary">{{ get_phrase('Joined') }}</a>
                                    @else
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->getGroup->id); ?>')" class="btn btn-primary">{{ get_phrase('Join') }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!--  Group Content Inner Col End -->
        @include('frontend.groups.right-sidebar')
</div>