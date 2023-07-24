<div class="post-inner" id="tab-feeling">
    
    <div class="tag-wrap">
        <a href="javascript:void(0)" onclick="$('#tab-feeling').removeClass('current')" class="prev-btn"><i class="fa fa-long-arrow-left"></i></a>

        <div class="post-tagged mt-3">
            <div class="tag-card" id="feeling_and_activities">
            </div>
        </div>

        <h5 class="w-100 text-center py-4">
            {{get_phrase('What are you doing')}} ?
        </h5>

        <h6>{{get_phrase('Activities')}}</h6>

        <div class="feeling-list">
            @php $all_activities = DB::table('feeling_and_activities')->where('type', 'activity')->get(); @endphp
            <ul>
                @foreach($all_activities as $all_activity)
                    @php $icon_ext = pathinfo($all_activity->icon, PATHINFO_EXTENSION); @endphp
                    <li>
                        <a href="javascript:void(0)" onclick="addFeelingActivity('{{$all_activity->feeling_and_activity_id}}', '{{$all_activity->title}}', '{{$all_activity->icon}}', '{{$icon_ext}}')">
                            @if($icon_ext == 'png' || $icon_ext == 'jpg' || $icon_ext == 'ico')
                                <img src="{{asset('storage/images/'.$all_activity->icon)}}">
                            @else
                                <i class="{{$all_activity->icon}}"></i>
                            @endif
                            {{$all_activity->title}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <h4 class="h5">
        {{get_phrase('How are you feeling')}} ?
    </h4>
    <div class="tag-wrap">
        <h6 class="pb-2">{{get_phrase('Feelings')}}</h6>

        @php $all_feelings = DB::table('feeling_and_activities')->where('type', 'feeling')->get(); @endphp
        <div class="feeling-list feeling-alt d-flex">
            <ul class="w-100">
                @foreach($all_feelings as $all_feeling)
                    @php $icon_ext = pathinfo($all_feeling->icon, PATHINFO_EXTENSION); @endphp
                    <li class="float-start w-50">
                        <a href="javascript:void(0)" class="px-2 py-1" onclick="addFeelingActivity('{{$all_feeling->feeling_and_activity_id}}', '{{$all_feeling->title}}', '{{$all_feeling->icon}}', '{{$icon_ext}}')">
                            @if($icon_ext == 'png' || $icon_ext == 'jpg' || $icon_ext == 'ico')
                                <span><img src="{{asset('storage/images/'.$all_feeling->icon)}}"></span>
                            @else
                                <i class="{{$all_feeling->icon}}"></i>
                            @endif
                            {{$all_feeling->title}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>