<div class="row gx-3">
    <div class="col-lg-7">
        <div class="group-inner bg-white border rounded p-3">
            <div class="gr-search">
                <h3 class="h6"><span><i class="fa-solid fa-users"></i></span>{{ get_phrase('Group') }} </h3>
                <form action="{{ route('search.group') }}" method="GET">
                    <input type="text" class="bg-secondary rounded" name="search" value="@if(isset($_GET['search'])) {{ $_GET['search'] }} @endif" placeholder="Search Group">
                    <span class="i fa fa-search"></span>
                </form>
            </div>
            <div class="page-suggest mt-4">
                <h3 class="h6">{{ get_phrase('All Groups') }}</h3>
                <div class="ps-wrap mt-3 justify-content-between">
                    <div class="row">
                        @foreach ($groups as $group)
                            <div class="col-md-3 col-lg-6 col-xl-6 col-sm-4 col-6">
                                <div class="card p-2 rounded">
                                    <div class="mb-2 thumbnail-103-103" style="background-image: url('{{ get_group_logo($group->logo,'logo') }}');"></div>
                                    <a href="{{ route('single.group',$group->id) }}"><h4>{{ ellipsis($group->title,10) }}</h4></a>
                                    @php $joined = \App\Models\Group_member::where('group_id',$group->id)->where('is_accepted','1')->count(); @endphp
                                    <span class="small text-muted">{{ $joined }} {{ get_phrase('Member') }}{{ $joined>1?"s":"" }}</span>
                                    @php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); @endphp
                                    @if ($join>0)
                                        @if ($group->user_id==auth()->user()->id)
                                            <a href="javascript:void(0)" class="btn btn-secondary">{{ get_phrase('Admin') }}</a>
                                        @else
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')" class="btn btn-secondary">{{ get_phrase('Joined') }}</a>
                                        @endif
                                    @else
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->id); ?>')" class="btn btn-primary">{{ get_phrase('Join') }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if (count($groups)>15)
                    <a href="{{ route('all.group.view') }}" class="btn btn-secondary btn-lg d-block mt-3">{{ get_phrase('See More') }}</a>
                @endif
            </div>
        </div>
    </div><!--  Group Content Inner Col End -->
    
    @include('frontend.groups.right-sidebar')
</div>