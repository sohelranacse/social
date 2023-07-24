<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Dashboard') }} </h4>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>


    <div class="row justify-content-evenly g-3">

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-1">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('My friends')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-people-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                    @php
                      $total_friends = DB::table('friendships')->where(function($query){
                        $query->where('accepter', auth()->user()->id)->orWhere('requester', auth()->user()->id);
                      })
                      ->where('is_accepted', 1);
                    @endphp
                      <h4>{{$total_friends->count()}}</h4>
                      <p>{{get_phrase('Your total friends')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-2">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('My Post')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-postcard-heart-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('posts')->where('user_id', auth()->user()->id)->get()->count()}}</h4>
                      <p>{{get_phrase('Your total posts')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-3">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('My Page')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-file-richtext-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('pages')->where('user_id', auth()->user()->id)->get()->count()}}</h4>
                      <p>{{get_phrase('Your total pages')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>


      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-4">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('My Blog')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-file-text-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('blogs')->where('user_id', auth()->user()->id)->get()->count()}}</h4>
                      <p>{{get_phrase('Your total Blogs')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-5">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('My Ad')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-badge-ad-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('sponsors')->where('user_id', auth()->user()->id)->get()->count()}}</h4>
                      <p>{{get_phrase('Your total ads')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-6">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('Marketplace Products')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-bag-heart-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('marketplaces')->where('user_id', auth()->user()->id)->get()->count()}}</h4>
                      <p>{{get_phrase('Your total products')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>
    </div>

    
</div>