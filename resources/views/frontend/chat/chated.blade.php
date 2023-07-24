<aside class="sidebar">
    <div class="widget">
        <div class="chat-header mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="widget-title">{{ get_phrase('Chats') }} </h3>
                <div class="alter-link">
                    <a href="#"><i class="fas fa-message"></i></a>
                </div>
            </div>
            <form action="" class="search-form">
                <input class="bg-secondary rounded" type="search" id="chatSearch" placeholder="Search">
                <span><i class="fa fa-search"></i></span>
            </form>
        </div>
        <div class="contact-lists" id="chatFriendList">
            @include('frontend.chat.single-chated')
        </div>
    </div>
</aside>



