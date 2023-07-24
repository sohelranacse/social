
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title">{{ get_phrase('Search Results') }}</h3>
            @include('frontend.search.header')
        </div> <!-- Search Card End -->
        
        
        
        <div class="card p-4 mt-4">
            <h3 class="sub-title">{{get_phrase('Groups')}}</h3>
                <div class="suggest-wrap d-flex gap-3 flex-wrap my-3">
                    @foreach ($groups as $key => $group )
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="card sugg-card p-2 rounded">
                                <div class="mb-2 thumbnail-103-103" style="background-image: url('{{ get_group_logo($group->logo,'logo') }}');"></div>
                                            <a href="{{ route('single.group',$group->id) }}"><h4>{{ ellipsis($group->title,10) }}</h4></a>
                                @php $joined = \App\Models\Group_member::where('group_id',$group->id)->where('is_accepted','1')->count(); @endphp
                                <span class="small text-muted">{{ $joined }} {{ get_phrase('Member') }} @if($joined>1) s @endif</span>
                                @php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); @endphp
                                @if ($join>0)
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')" class="btn btn-primary">{{ get_phrase('Joined') }}</a>
                                @else
                                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->id); ?>')" class="btn btn-primary">{{ get_phrase('Join') }}</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div> 
        </div><!--  Group Card End -->
    </div>



    @include('frontend.main_content.scripts')
    @include('frontend.initialize')
    @include('frontend.common_scripts')
