<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Image;


class BannerSectionController extends Controller
{
    public function HomeBanner(){
        $homebanner = HomeBanner::find(1);
        return view('admin.home_banner', compact('homebanner'));
    }// End Method

    public function UpdateBanner(Request $request){
        $banner_id = $request->id;

        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(636, 852)->save('upload/home_banner/'.$image_gen);   
 
            $save_url ='upload/home_banner/'.$image_gen;

            HomeBanner::findOrFail($banner_id)->update([
                'title' => $request->title,
                'short_desc' => $request->short_desc,
                'video_url' => $request->video_url,
                'banner_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Home Banner With Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{
            HomeBanner::findOrFail($banner_id)->update([
                'title' => $request->title,
                'short_desc' => $request->short_desc,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Banner Without Image Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
        
    }// End Method
}
