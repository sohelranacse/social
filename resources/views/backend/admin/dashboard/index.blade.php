



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
                  <p>{{get_phrase('Users')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-people-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('users')->whereNot('user_role', 'admin')->count()}}</h4>
                      <p>{{get_phrase('Total Users')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-2">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('Post')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-postcard-heart-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('posts')->get()->count()}}</h4>
                      <p>{{get_phrase('Total Posts')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-3">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('Page')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-file-richtext-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('pages')->get()->count()}}</h4>
                      <p>{{get_phrase('Total Pages')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-4">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('Blog')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-file-text-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('blogs')->get()->count()}}</h4>
                      <p>{{get_phrase('Total Blogs')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="single-dash-box">
           <div class="card colors-5">
              <div class="card-head d-flex justify-content-between align-items-center">
                  <p>{{get_phrase('Ad')}}</p>
                  <span><i class="bi bi-arrow-right"></i></span>
              </div>
              <div class="card-body d-flex justify-content-between">
                  <div class="reader-book">
                      <i class="bi bi-badge-ad-fill text-30px"></i>
                  </div>
                  <div class="reader-count">
                      <h4>{{DB::table('sponsors')->get()->count()}}</h4>
                      <p>{{get_phrase('Total Sponsored Posts')}}</p>
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
                      <h4>{{DB::table('marketplaces')->get()->count()}}</h4>
                      <p>{{get_phrase('Total Products')}}</p>
                  </div>
              </div>
           </div>
        </div>
      </div>


    </div>


    <div class="graph-area mt-5">
      <div class="row">
          <div class="col-sm-12 col-xl-12">
              <div class="graph-control  text-center rounded p-4">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0">New users this year</h6>
                  </div>
                  <canvas id="visitors" style="display: block; box-sizing: border-box; height: 232px; width: 465px;" width="465" height="232"></canvas>
              </div>
          </div>
        </div>
    </div>

    <!-- Start Footer -->
    @include('backend.footer')
    <!-- End Footer -->
  </div>
<?php
  if(isset($_GET['year']) && !empty($_GET['year'])){
    $year = $_GET['year'];
  }else{
    $year = date('Y');
  }
?>
<script type="text/javascript">
  "use strict";
  $(document).ready(function(){
    // Chart Global Color
    Chart.defaults.color = "#5b2ff9";
    Chart.defaults.borderColor = "#fafaff";
    
    

    // Worldwide Sales Chart
    var ctx1 = $("#visitors").get(0).getContext("2d");
      var myChart1 = new Chart(ctx1, {
          type: "bar",
          data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              datasets: [{
                      label: "{{get_phrase('Number of user')}}",
                      data: [
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-01-01')->whereDate('created_at', '<=', $year.'-01-'.date('t', strtotime($year.'-01-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-02-01')->whereDate('created_at', '<=', $year.'-02-'.date('t', strtotime($year.'-02-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-03-01')->whereDate('created_at', '<=', $year.'-03-'.date('t', strtotime($year.'-03-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-04-01')->whereDate('created_at', '<=', $year.'-04-'.date('t', strtotime($year.'-04-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-05-01')->whereDate('created_at', '<=', $year.'-05-'.date('t', strtotime($year.'-05-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-06-01')->whereDate('created_at', '<=', $year.'-06-'.date('t', strtotime($year.'-06-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-07-01')->whereDate('created_at', '<=', $year.'-07-'.date('t', strtotime($year.'-07-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-08-01')->whereDate('created_at', '<=', $year.'-08-'.date('t', strtotime($year.'-08-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-09-01')->whereDate('created_at', '<=', $year.'-09-'.date('t', strtotime($year.'-09-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-10-01')->whereDate('created_at', '<=', $year.'-10-'.date('t', strtotime($year.'-10-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-11-01')->whereDate('created_at', '<=', $year.'-11-'.date('t', strtotime($year.'-11-01')))->count(); ?>,
                          <?php echo DB::table('users')->whereDate('created_at', '>=', $year.'-12-01')->whereDate('created_at', '<=', $year.'-12-'.date('t', strtotime($year.'-12-01')))->count(); ?>,

                        ],
                      backgroundColor: "#5A2FF9"
                  }
              ]
              },
          options: {
              responsive: true
          }
      });
  });
</script>

