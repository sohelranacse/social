<?php
// import facade 
use Illuminate\Support\Facades\File;

// Global Settings
if (!function_exists('get_image')) {
    function get_image($url = null)
    {
        if(is_file(public_path($url)) && file_exists(public_path($url))){
            return asset($url);
        }elseif($url != null){
            $url_arr = explode('/', $url);
            $file_name = $url_arr[count($url_arr)-1];
            if(empty($file_name)){
                $url = $url.'default/default.png';
            }else{
                $url = str_replace($file_name,'default/default.png',$url);
            }
            return asset($url);
        }else{
            return asset($url);
        }
    }
}
// Global Settings
if (!function_exists('remove_file')) {
    function remove_file($url = null)
    {
        $url = $url = str_replace('optimized/','',$url);
        $url_arr = explode('/', $url);
        $file_name = $url_arr[count($url_arr)-1];

        if(is_file($url) && file_exists($url) && !empty($file_name)){
            unlink($url);

            $url = str_replace($file_name,'optimized/'.$file_name,$url);
            if(is_file($url) && file_exists($url)){
                unlink($url);
            }
        }
    }
}

//All common helper functions
if (! function_exists('get_user_image')) {
    function get_user_image($file_name_or_user_id = "", $optimized = "") {

        $optimized = $optimized.'/';
        if($file_name_or_user_id == ''){
            $file_name_or_user_id = 'default.png' ;
        }
        if(is_numeric($file_name_or_user_id)){
            $user_id = $file_name_or_user_id;
            $file_name = "";
        }else{
            $user_id = "";
            $file_name = $file_name_or_user_id;
        }

        if($user_id > 0){
            $user_id = $file_name_or_user_id;
            $file_name = DB::table('users')->where('id', $user_id)->value('photo');

            //this file comes from another online link as like amazon s3 server
            if(strpos($file_name, 'https://') !== false){
                return $file_name;
            }

            if(File::exists('public/storage/userimage/'.$optimized.$file_name) && is_file('public/storage/userimage/'.$optimized.$file_name)){
                return asset('storage/userimage/'.$optimized.$file_name);
            }else{
                return asset('storage/userimage/default.png');
            }
        }elseif(File::exists('public/storage/userimage/'.$optimized.$file_name) && is_file('public/storage/userimage/'.$optimized.$file_name)){
            return asset('storage/userimage/'.$optimized.$file_name);
        }elseif(strpos($file_name, 'https://') !== false){
            //this file comes from another online link as like amazon s3 server
            return $file_name;
        }else{
            return asset('storage/userimage/default.png');
        }
    }
}

if (! function_exists('get_cover_photo')) {
    function get_cover_photo($file_name_or_user_id = '', $optimized = "") {

        $optimized = $optimized.'/';
        if($file_name_or_user_id == ''){
            $file_name_or_user_id = Auth()->user()->photo;
        }
        if(is_numeric($file_name_or_user_id)){
            $user_id = $file_name_or_user_id;
            $file_name = "";
        }else{
            $user_id = "";
            $file_name = $file_name_or_user_id;
        }

        if($user_id > 0){
            $user_id = $file_name_or_user_id;
            $file_name = DB::table('users')->where('id', $user_id)->value('photo');

            //this file comes from another online link as like amazon s3 server
            if(strpos($file_name, 'https://') !== false){
                return $file_name;
            } 

            if(File::exists('public/storage/cover_photo/'.$optimized.$file_name) && is_file('public/storage/cover_photo/'.$optimized.$file_name)){
                return asset('storage/cover_photo/'.$optimized.$file_name);
            }else{
                return asset('storage/cover_photo/default.jpg');
            }
        }elseif(File::exists('public/storage/cover_photo/'.$optimized.$file_name) && is_file('public/storage/cover_photo/'.$optimized.$file_name)){
            return asset('storage/cover_photo/'.$optimized.$file_name);
        }elseif(strpos($file_name, 'https://') !== false){
            //this file comes from another online link as like amazon s3 server
            return $file_name;
        }else{
            return asset('storage/cover_photo/default.jpg');
        }
    }
}



if (! function_exists('get_album_thumbnail')) {
    function get_album_thumbnail($id = '', $optimized = "") {
        $optimized = $optimized.'/';
        $file_name = DB::table('albums')->where('id', $id)->value('thumbnail');

        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        if(!empty($file_name) && File::exists('public/storage/thumbnails/album/'.$optimized.$file_name)){
            return asset('storage/thumbnails/album/'.$optimized.$file_name);
        }

        $file_name = DB::table('media_files')->where('album_id', $id)->orderBy('id', 'DESC')->value('file_name');
        if(!empty($file_name) && File::exists('public/storage/post/images/'.$optimized.$file_name)){
            return asset('storage/post/images/'.$optimized.$file_name);
        }else{
            return asset('storage/thumbnails/album/default.jpg');
        }
    }
}

if (! function_exists('get_post_image')) {
    function get_post_image($file_name = '', $optimized = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $optimized = $optimized.'/';
        if(File::exists('public/storage/post/images/'.$optimized.$file_name) && is_file('public/storage/post/images/'.$optimized.$file_name)){
            return asset('storage/post/images/'.$optimized.$file_name);
        }else{
            return asset('storage/post/images/default.jpg');
        }
    }
}

if (! function_exists('get_post_video')) {
    function get_post_video($file_name = '', $optimized = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        if($optimized != ""){
            $optimized = $optimized.'/';
        }
        if(File::exists('public/storage/post/videos/'.$optimized.$file_name)){
            return asset('storage/post/videos/'.$optimized.$file_name);
        }else{
            return asset('storage/post/videos/default.jpg');
        }
    }
}



if ( ! function_exists('get_all_language'))
{
    function get_all_language(){
        return DB::table('languages')->select('name')->distinct()->get();
    }
}



if ( ! function_exists('get_phrase'))
{
    function get_phrase($phrase = '', $value_replace = array()) {
        if(Session('active_language')){
            $active_language = Session('active_language');
        }else{
            $active_language = get_settings('system_language');
            Session(['active_language' => get_settings('system_language')]);
        }
        $query = DB::table('languages')->where('name', $active_language)->where('phrase', $phrase);
        if($query->count() > 0){
            $tValue = $query->value('translated');
        }else{
            $tValue = $phrase;
            $all_language = get_all_language();

            if($all_language->count() > 0){
                foreach($all_language as $language){

                    if(DB::table('languages')->where('name', $language->name)->where('phrase', $phrase)->get()->count() == 0){
                        DB::table('languages')->insert(array('name' => strtolower($language->name), 'phrase' => $phrase, 'translated' => $phrase));
                    }
                }
            }else{
                DB::table('languages')->insert(array('name' => 'english', 'phrase' => $phrase, 'translated' => $phrase));
            }
        }

        if(count($value_replace) > 0){
            $translated_value_arr = explode('____', $tValue);
            $tValue = '';
            foreach($translated_value_arr as $key => $value){

                if(array_key_exists($key,$value_replace)){
                    $tValue .= $value.$value_replace[$key];
                }else{
                    $tValue .= $value;
                }
            }
        }

        return $tValue;
    }
}



if (! function_exists('script_checker')) {
    function script_checker($string = '', $convert_string = true) {

        if($convert_string){
            return nl2br(htmlspecialchars(strip_tags($string)));
        }else{
            return $string;
        }

    }
}

if (! function_exists('is_image')) {
    function is_image($file_name = '') {
        if(empty($file_name))
            return false;

        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        if($file_extension == 'jpg' || $file_extension == 'png' || $file_extension == 'jpeg' || $file_extension == 'gif'){
            return true;
        }else{
            return false;
        }
    }
}


if (!function_exists('date_formatter')) {
    function date_formatter($strtotime = "", $format = "")
    {
        if($strtotime && !is_numeric($strtotime)){
            $strtotime = strtotime($strtotime);
        }elseif(!$strtotime){
            $strtotime = time();
        }

        if ($format == "") {
            return date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime);
        }

        if ($format == 1) {
            return date('D', $strtotime) . ', ' . date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime);
        }

        if($format == 2){
            $time_difference = time() - $strtotime;
            if( $time_difference <= 10 ) { return get_phrase('Just now'); }
            //864000 = 10 days
            if($time_difference > 864000){ return date_formatter($strtotime, 3); }

            $condition = array(
                12 * 30 * 24 * 60 * 60  => get_phrase('year'),
                30 * 24 * 60 * 60       =>  get_phrase('month'),
                24 * 60 * 60            =>  get_phrase('day'),
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
            );

            foreach( $condition as $secs => $str ){
                $d = $time_difference / $secs;
                if( $d >= 1 ){
                    $t = round( $d );
                    return $t .' '. $str . ( $t > 1 ? 's' : '' ) .' '. get_phrase('ago');
                }
            }
        }

        if ($format == 3) {
            $date = date('d', $strtotime);
            $date .= ' '. date('M', $strtotime);

            if(date('Y', $strtotime) != date('Y', time())){
                $date .= date(' Y', $strtotime);
            }

            $date .= ' '.get_phrase('at').' ';
            $date .= date('h:i a', $strtotime);
            return $date;
        }

        if ($format == 4) {
            return date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime). ', ' . date('h:i:s A', $strtotime);
        }
    }
}

if (!function_exists('currency')) {
    function currency($price = "")
    {
        return $price.'$';
    }
}

if (!function_exists('slugify')) {
    function slugify($string)
    {
        $string = preg_replace('~[^\\pL\d]+~u', '-', $string);
        $string = trim($string, '-');
        return strtolower($string);
    }
}

if (!function_exists('get_video_extension')) {
    function get_video_extension($url)
    {
        if (strpos($url, '.mp4') > 0) {
            return 'mp4';
        } elseif (strpos($url, '.webm') > 0) {
            return 'webm';
        } else {
            return 'unknown';
        }
    }
}

if (!function_exists('ellipsis')) {
    function ellipsis($long_string, $max_character = 30)
    {
        $long_string = strip_tags($long_string);
        $short_string = strlen($long_string) > $max_character ? mb_substr($long_string, 0, $max_character) . "..." : $long_string;
        return $short_string;
    }
}



// RANDOM NUMBER GENERATOR FOR ELSEWHERE
if (!function_exists('random')) {
    function random($length_of_string, $lowercase = false)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        $randVal = substr(str_shuffle($str_result), 0, $length_of_string);
        if($lowercase){
            $randVal = strtolower($randVal);
        }
        return $randVal;
    }
}

if (! function_exists('get_settings')) {
    function get_settings($type = "", $return_type = "") {
        $value = DB::table('settings')->where('type', $type)->value('description');
        if($return_type === true){
            return json_decode($value, true);
        }elseif($return_type === 'decode'){
            return json_decode($value, true);
        }elseif($return_type == "object"){
            return json_decode($value);
        }else{
            return $value;
        }
    }
}

// folder check and create
if (! function_exists('uploadTo')) {
    function uploadTo($folderpath = "") {
        $path = public_path('storage/'.$folderpath);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            return $path.'/';
    }
}



// file remove on delete and update 

if (! function_exists('removeFile')) {
    function removeFile($foldername = "",$imagename = "") {
        if (File::exists(public_path('public/storage/'.$foldername.'/coverphoto/'.$imagename))) {
            File::delete(public_path('public/storage/'.$foldername.'/coverphoto/'.$imagename));
        }
        if(File::exists(public_path('public/storage/'.$foldername.'/thumbnail/'.$imagename))){
            File::delete(public_path('public/storage/'.$foldername.'/thumbnail/'.$imagename));
        }
    }
}


// image view in blade 

// file remove on delete and update 

// just pass {folder name},{file name}and {image type} then feel the function 

if (! function_exists('viewImage')) {
    function viewImage($foldername = "",$imagename = "",$imagetype = "") {
        if (!empty($foldername)&&!empty($imagename)&&!empty($imagetype)){
            return asset('storage/'.$foldername.'/'.$imagetype.'/'.$imagename);
        }else{
           return asset('storage/'.$foldername.'/'.$imagetype.'/default/default.jpg');
        }
    }
}


// associative array sorting desending 

function aasort (&$array, $key) {
    $sorter = array();
    $ret = array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii] = $va[$key];
    }
    arsort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii] = $array[$ii];
    }
    $array = $ret;
}



//get marketplace product image
if (! function_exists('get_product_image')) {
    function get_product_image($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/marketplace/'.$foldername.$file_name)){
                return asset('storage/marketplace/'.$foldername.$file_name);
            }else{
                return asset('storage/marketplace/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/marketplace/'.$foldername.'default/default.jpg');
        }
    }
}



//get sponsor post  image
if (! function_exists('get_sponsor_image')) {
    function get_sponsor_image($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/sponsor/'.$foldername.$file_name)){
                return asset('storage/sponsor/'.$foldername.$file_name);
            }else{
                return asset('storage/sponsor/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/sponsor/'.$foldername.'default/default.jpg');
        }
    }
}

//get blog product image
if (! function_exists('get_blog_image')) {
    function get_blog_image($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/blog/'.$foldername.$file_name)){
                return asset('storage/blog/'.$foldername.$file_name);
            }else{
                return asset('storage/blog/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/blog/'.$foldername.'default/default.jpg');
        }
    }
}


//get page logo
if (! function_exists('get_page_logo')) {
    function get_page_logo($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/pages/'.$foldername.$file_name)){
                return asset('storage/pages/'.$foldername.$file_name);
            }else{
                return asset('storage/pages/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/pages/'.$foldername.'default/default.jpg');
        }
    }

}




//get page cover photo
if (! function_exists('get_page_cover_photo')) {
    function get_page_cover_photo($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/pages/'.$foldername.$file_name)){
                return asset('storage/pages/'.$foldername.$file_name);
            }else{
                return asset('storage/pages/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/pages/'.$foldername.'default/default.jpg');
        }
    }

}


//get page logo
if (! function_exists('get_group_logo')) {
    function get_group_logo($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/groups/'.$foldername.$file_name)){
                return asset('storage/groups/'.$foldername.$file_name);
            }else{
                return asset('storage/groups/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/groups/'.$foldername.'default/default.jpg');
        }
    }

}



//get group cover photo
if (! function_exists('get_group_cover_photo')) {
    function get_group_cover_photo($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }

        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/groups/'.$foldername.$file_name)){
                return asset('storage/groups/'.$foldername.$file_name);
            }else{
                return asset('storage/groups/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/groups/'.$foldername.'default/default.jpg');
        }
    }

}



//get system dark logo
if (! function_exists('get_system_logo_favicon')) {
    function get_system_logo_favicon($file_name = "", $foldername = "") {
        //this file comes from another online link as like amazon s3 server
        if(strpos($file_name, 'https://') !== false){
            return $file_name;
        }
        
        $foldername = $foldername.'/';

        if(!empty($file_name)){
            if(File::exists('public/storage/logo/'.$foldername.$file_name)){
                return asset('storage/logo/'.$foldername.$file_name);
            }else{
                return asset('storage/logo/'.$foldername.'default/default.jpg');
            }
        }else{
            return asset('storage/logo/'.$foldername.'default/default.jpg');
        }
    }
}





// Global Settings
if (!function_exists('set_config')) {
    function set_config($key = '', $value='')
    {
        $config = json_decode(file_get_contents(base_path('config/config.json')), true);

        $config[$key] = $value;

        file_put_contents(base_path('config/config.json'), json_encode($config));
    }
}




