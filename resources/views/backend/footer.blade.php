
@php
  $site_footer = \App\Models\Setting::where('type','system_footer')->value('description');
  $site_footer_url = \App\Models\Setting::where('type','system_footer_link')->value('description');
@endphp
 <!-- Start Footer -->
 <div class="copyright-text">
   <p>{{ date('Y') }} &copy;  <a href="{{ $site_footer_url }}"><span>{{get_phrase('By ____', [$site_footer])}}</span></a></p>
 </div>
 <!-- End Footer -->