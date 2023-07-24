 <div class="profile-cover group-cover rounded mb-3">
        @include('frontend.groups.cover-photo')
    </div>
    <div class="group-content profile-content">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                @php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); @endphp
                @if ($join>0||$group->user_id==auth()->user()->id)
                    @include('frontend.groups.iner-nav')
                    @include('frontend.main_content.create_post',['group_id'=>$group->id])
                    @php
                        $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'post')->where('comments.id_of_type', $group->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
                        $total_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $group->id)->where('comments.parent_id', 0)->get()->count();
                    @endphp

                    @include('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$group->id,'type'=>"group"])
                    
                    @if($comments->count() < $total_comments) 
                        <a class="btn p-3 pt-0" onclick="loadMoreComments(this, {{$group->id}}, 0, {{$total_comments}},'group')">{{get_phrase('View Comment')}}</a>
                    @endif
                    
                        @include('frontend.main_content.posts',['type'=>"group"])
                    
                    
                @else
                <div class="card">
                    <div class="card-body">
                        {{ get_phrase('join Group First') }}
                    </div>
                </div>
                @endif
            </div> <!-- COL END -->
            <!--  Group Content Inner Col End -->
            @include('frontend.groups.bio')
        </div>
    </div><!-- Group content End -->
@include('frontend.main_content.scripts')