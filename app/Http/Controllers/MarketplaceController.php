<?php

namespace App\Http\Controllers;

use App\Models\Marketplace;
use App\Models\Media_files;
use App\Models\SavedProduct;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Image;
use Session;
use Illuminate\Support\Facades\Validator;
use DB;

class MarketplaceController extends Controller
{
    public function allproducts(){
        $page_data['products'] = Marketplace::orderBy('id','DESC')->limit('10')->get();
        $page_data['view_path'] = 'frontend.marketplace.products';
        return view('frontend.index', $page_data);
    }

    public function userproduct(){
        $products = Marketplace::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $page_data['products'] = $products;
        $page_data['view_path'] = 'frontend.marketplace.user_products';
        return view('frontend.index', $page_data);
    }


    public function store(Request $request){
        $rules = array(
            'title' => 'required|max:255',
            'price' => 'required',
            'location' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'status' => 'required',
            'brand' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }

        $marketplace = new Marketplace();
        $marketplace->user_id = auth()->user()->id;
        $marketplace->title = $request->title;
        $marketplace->currency_id = $request->currency;
        $marketplace->price = $request->price;
        $marketplace->location = $request->location;
        $marketplace->category = $request->category;
        $marketplace->condition = $request->condition;
        $marketplace->brand = $request->brand;
        $marketplace->buy_link = $request->buy_link;
        $marketplace->status = $request->status;
        $marketplace->description = $request->description;
        $marketplace->save();
        $product_id = $marketplace->id;
        if ($product_id) {
            if(is_array($request->multiple_files) && $request->multiple_files[0] != null){
                //Data validation
                $rules = array('multiple_files' => 'mimes:jpeg,jpg,png,gif');
                $validator = Validator::make($request->multiple_files, $rules);
                if ($validator->fails()){
                     return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
                }
    
                foreach ($request->multiple_files as $key => $media_file) {
                        
                    $file_name = FileUploader::upload($media_file,'public/storage/marketplace/thumbnail', 315);
                    FileUploader::upload($media_file,'public/storage/marketplace/coverphoto/'.$file_name, 315);

                    $file_type = 'image';

                    $productupdate = Marketplace::find($product_id);
                    $media_file_data = array('user_id' => auth()->user()->id, 'product_id' => $product_id, 'file_name' => $file_name, 'file_type' => $file_type);
                    $media_file_data['created_at'] = time();
                    $media_file_data['updated_at'] = $media_file_data['created_at'];
                    Media_files::create($media_file_data);
                    if($key=='0'){
                        $productupdate = Marketplace::find($product_id);
                        $productupdate->image = $file_name;
                        $productupdate->save();
                    }
                }
            }
            Session::flash('success_message', get_phrase('Marketplace Product Added Successfully'));
            return json_encode(array('reload' => 1));
        }
    }


    public function update(Request $request,$id){
        $rules = array(
            'title' => 'required|max:255',
            'price' => 'required',
            'location' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'status' => 'required',
            'brand' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }

        $marketplace = Marketplace::find($id);
        $marketplace->user_id = auth()->user()->id;
        $marketplace->title = $request->title;
        $marketplace->currency_id = $request->currency;
        $marketplace->price = $request->price;
        $marketplace->location = $request->location;
        $marketplace->category = $request->category;
        $marketplace->condition = $request->condition;
        $marketplace->brand = $request->brand;
        $marketplace->status = $request->status;
        $marketplace->description = $request->description;
        $marketplace->save();
        $product_id = $id;
        if ($product_id) {
            if(is_array($request->multiple_files) && $request->multiple_files[0] != null){
                //Data validation
                $rules = array('multiple_files' => 'mimes:jpeg,jpg,png,gif');
                $validator = Validator::make($request->multiple_files, $rules);
                if ($validator->fails()){
                     return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
                }

                if(isset($request->multiple_files)){
                     // this for deleting previous data file 
                     $previousfile = Media_files::where('product_id',$id)->get();
                     foreach($previousfile as $previousfile){
                         $market = Media_files::find($previousfile->id);
                         // store image name for delete file operation 
                         $imagename = $market->banner;
                         $done = $market->delete();
                         if ($done) {
                             // just put the file name and folder name nothing more :) 
                             removeFile('marketplace', $imagename);
                         }
                     }
                 // end code sec 
                }
    
                foreach ($request->multiple_files as $key => $media_file) {
                    $file_name = FileUploader::upload($media_file,'public/storage/marketplace/thumbnail', 315);
                    FileUploader::upload($media_file,'public/storage/marketplace/coverphoto/'.$file_name, 315);
                    $file_type = 'image';
    
                    $productupdate = Marketplace::find($product_id);
                    $media_file_data = array('user_id' => auth()->user()->id, 'product_id' => $product_id, 'file_name' => $file_name, 'file_type' => $file_type);
                    $media_file_data['created_at'] = time();
                    $media_file_data['updated_at'] = $media_file_data['created_at'];
                    Media_files::create($media_file_data);
                    if($key=='0'){
                        $productupdate = Marketplace::find($product_id);
                        $productupdate->image = $file_name;
                        $productupdate->save();
                    }
                }
            }
            Session::flash('success_message', get_phrase('Marketplace Product Updated Successfully'));
            return json_encode(array('reload' => 1));
        }
    }



    public function product_delete(){
        $response = array();
        $market = Marketplace::find($_GET['product_id']);
        // store image name for delete file operation 
        $imagename = $market->banner;

        $done = $market->delete();
        if ($done) {
            $response = array('alertMessage' => get_phrase('Product Deleted Successfully'), 'fadeOutElem' => "#product-" . $_GET['product_id']);
            // just put the file name and folder name nothing more :) 
            removeFile('marketplace', $imagename);
        }
        return json_encode($response);
    }



    public function load_product_by_scrolling(Request $request){
        $products =  Marketplace::orderBy('id', 'DESC')->skip($request->offset)->take(6)->get();

        $page_data['products'] = $products;
        return view('frontend.marketplace.product-single', $page_data);
    }



    public function single_product($id){
        
        $product = Marketplace::find($id);
        

        if($product){
            $page_data['related_product'] = Marketplace::Where('brand',$product->brand)->orWhere('category',$product->category)->get();
            $page_data['product'] = $product;
            $page_data['product_image'] = Media_files::where('product_id',$id)->where('file_type','image')->get();
            $page_data['view_path'] = 'frontend.marketplace.single_product';
            return view('frontend.index', $page_data);
        }else{
            if(isset($_GET['shared'])){
                $page_data['post'] = '';
                return view('frontend.marketplace.custom_shared_view', $page_data);
            }else{
                return redirect()->back()->with('error_message', 'This product is not available');
            }
        }
    }

   


    // on key up product search 
    public function filter(){
        $search =  $_GET['search'];
        $category =  $_GET['category'];
        $condition =  $_GET['condition'];
        $min =  $_GET['min'];
        $max =  $_GET['max'];
        $brand =  $_GET['brand'];
        $location =  $_GET['location'];


        $query = Marketplace::where('status', 1);

        if(isset($search) && !empty($search)){
            $query->where(function ($query) use ($search){
                $query->where('title', 'like', '%'. $search .'%')
                ->orWhere('description', 'like', '%'. $search .'%');
            });
        }

        if(isset($condition) && !empty($condition)){
            $query->where('condition', $condition);
        }

        if(isset($category) && !empty($category)){
            $query->where('category', $category);
        }

        if(isset($min) && !empty($min)){
            $query->where('price', '>=', $min);
        }

        if(isset($max) && !empty($max)){
            $query->where('price', '<=', $max);
        }

        if(isset($brand) && !empty($brand)){
            $query->where('brand', $brand);
        }

        if(isset($location) && !empty($location)){
            $query->where('location', 'like', '%'.$location.'%');
        }

        $page_data['products'] = $query->get();
        $page_data['view_path'] = 'frontend.marketplace.products';
        return view('frontend.index', $page_data); 

    }




    public function saved_product(){
        $page_data['saved_products'] = SavedProduct::all();
        $page_data['view_path'] = 'frontend.marketplace.saved_product';
        return view('frontend.index', $page_data);
    }

    public function save_for_later($id){
        $saveproduct = new SavedProduct();
        $saveproduct->user_id = auth()->user()->id;
        $saveproduct->product_id = $id;
        $saveproduct->save();

        Session::flash('success_message', get_phrase('Saved Successfully'));
        $response = array('reload' => 1);
        return json_encode($response);
    }


    public function unsave_for_later($id){
        $done = SavedProduct::where('product_id',$id)->where('user_id',auth()->user()->id)->delete();
        if($done){
            Session::flash('success_message', get_phrase('Unsaved Successfully'));
            $response = array('reload' => 1);
            return json_encode($response);
        }
    }



    public function single_product_ifrane($id){
        $product = Marketplace::find($id);
        $page_data['product'] = $product;
        $page_data['product_image'] = Media_files::where('product_id',$id)->where('file_type','image')->get();

        if($product){

            if(isset($_GET['shared'])){
                return view('frontend.marketplace.single_product_iframe', $page_data);
            }else{
                return redirect(route('single.product', $id));
            }
        }else{

            if(isset($_GET['shared'])){
                $page_data['post'] = '';
                return view('frontend.main_content.custom_shared_view', $page_data);
            }else{
                $page_data['post'] = '';
                $page_data['view_path'] = 'frontend.main_content.custom_shared_view';
                return view('frontend.index', $page_data);
            }
        }
    }


}
