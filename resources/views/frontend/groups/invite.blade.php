<div class="modal fade" id="newGroup" tabindex="-1" aria-labelledby="newGroup"
                                aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">{{ get_phrase('Invite Group') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body p-3">
                <div class="entry-header d-flex justify-content-between">
                    <div class="ava-info d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ get_user_image(auth()->user()->photo,'optimized') }}" class="rounded-circle user_image_show_on_modal" alt="...">
                        </div>
                        <div class="ava-desc ms-2">
                            <h3 class="mb-0 h6">{{ auth()->user()->name }}</h3>
                            <span class="meta-time text-muted"><a href="#">{{ auth()->user()->profession }}</a></span>
                        </div>
                    </div>
                </div>
                

                <input class="mt-3" onkeyup="searchFriendsForInviting(this, '#friendsForInvitingGroup')" type="search" placeholder="{{get_phrase('Search more peoples')}}">

                <div class="progress suggestions-loaging-bar d-none"><div class="indeterminate"></div></div>
                
                <h6 class="mt-2">{{ get_phrase('Invite Friends')}} ({{ get_phrase('Optional')}})</h6>
                <form class="ajaxForm" action="{{ route('group.invition') }}" method="POST">
                    @csrf
                    <input type="hidden" name="group_id" value="{{ $group->id }}" id="">
                    <div class="invite-friends" id="invitedGroupUser">
                    
                    </div>
                <div class="group-suggestion mt-3" id="friendsForInvitingGroup">
                    <h6>{{ get_phrase('Suggestion') }}</h6>
                    <div class="sugest-wrap">
                        @php $users = \App\Models\User::orderBy('id','DESC')->limit('7')->get(); @endphp
                        @include('frontend.groups.invite-user',['users'=>$users,'group_id'=>$group->id])
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-block w-100 btn-lg">{{ get_phrase('Invite Group') }}</button>
            </form>
            </div>

        </div>
    </div>
</div>

@include('frontend.groups.script')

                            