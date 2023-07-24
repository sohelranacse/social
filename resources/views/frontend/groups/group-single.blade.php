 @foreach ($groups as $key => $group)
        <div class="col-md-4 col-lg-4 col-sm-6 single-item-countable" id="group-{{ $group->id }}">
            <div class="card p-2 rounded">
                <div class="mb-2"> <img class="img-fluid img-radisu" src="{{ get_group_logo($group->logo,'logo') }}" ></div>
                <a href="{{ route('single.group',$group->id) }}"><h4>{{ ellipsis($group->title,20) }}</h4></a>
                @php $joined = \App\Models\Group_member::where('group_id',$group->id)->where('is_accepted','1')->count(); @endphp
                <span class="small text-muted">{{ get_phrase('____ Members', $joined)}}</span>
                @php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); @endphp
                @if ($join>0)
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')" class="btn btn-primary">{{ get_phrase('Joined')}}</a>
                @else
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->id); ?>')" class="btn btn-primary">{{ get_phrase('Join')}}</a>
                @endif
            </div>
        </div>
        @if (isset($search)&&!empty($search))
            @if ($key==2)
                @break
            @endif
        @endif
@endforeach     
