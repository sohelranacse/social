
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title">{{ get_phrase('Search Results') }}</h3>
            @include('frontend.search.header')
        </div> <!-- Search Card End -->
        
        <div class="card people-card p-4 mt-4 mb-3">
            <h3 class="sub-title">{{ get_phrase('People') }}</h3>
            @foreach ($peoples as $key=> $people)
            @php
                if($people->id==auth()->user()->id){
                    continue;
                }
            @endphp
            <div class="people-wrap mt-2">
                <div class="people-item d-flex mb-3 justify-content-between w-100">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar">
                            <a href="{{ route('user.profile.view',$people->id) }}"><img class="avatar-img rounded-circle w-100 user_image_show_on_modal" src="{{ get_user_image($people->photo,'optimized') }}" alt=""
                                    ></a>
                        </div>
                        <div class="avatar-info ms-2">
                            <h6 class="mb-1"><a href="{{ route('user.profile.view',$people->id) }}">{{ $people->name }}</a></h6>
                            <div class="activity-time small-text text-muted">{{ ellipsis($people->about,'30') }}
                            </div>
                        </div>
                    </div>
                    
                    @php
                        $user_id = $people->id;
                        $friend = \App\Models\Friendships::where(function($query) use ($user_id){
                            $query->where('requester', auth()->user()->id);
                            $query->where('accepter', $user_id);
                        })
                        ->orWhere(function($query) use ($user_id) {
                            $query->where('accepter', auth()->user()->id);
                            $query->where('requester', $user_id);
                        })
                        ->count();

                        $friendAccepted = \App\Models\Friendships::where(function($query) use ($user_id){
                            $query->where('requester', auth()->user()->id);
                            $query->where('accepter', $user_id);
                            $query->where('is_accepted',1);
                        })
                        ->orWhere(function($query) use ($user_id) {
                            $query->where('accepter', auth()->user()->id);
                            $query->where('requester', $user_id);
                            $query->where('is_accepted',1);
                        })
                        ->count();
                        
                    @endphp

                    @if ($friend>0)
                        @if ($friendAccepted>0)
                            <a href="#" class="btn btn-secondary align-self-start"><i class="fa-solid fa-user-group"></i> {{ get_phrase('Friend') }} </a>
                        @else
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.unfriend',$people->id); ?>')" class="btn btn-primary align-self-start"><i class="fa-solid fa-xmark"></i> {{ get_phrase('Cancel') }}</a>
                        @endif
                    @else   
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.friend',$people->id); ?>')" class="btn btn-primary align-self-start"><i class="fa-solid fa-plus"></i> {{ get_phrase('Add Friend') }} </a>
                    @endif
                </div>
            </div>
            @endforeach
            
        </div> 
    </div>



