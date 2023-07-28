<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutMultiImage;
use App\Models\HomeAboutContent;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutContentController extends Controller
{
    public function UpdateContent(Request $request){
        $content_id = $request->id;
        HomeAboutContent::findOrFail($content_id)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'description' => $request->description,
        ]);
        $notification = array(
            'message' => 'About Content Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//End Method

    public function UpdateMultiImage(Request $request){
        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $image_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            
            Image::make($multi_image)->resize(220, 220)->save('upload/home_about_multi-image/'.$image_gen);   
 
            $save_url ='upload/home_about_multi-image/'.$image_gen;

            AboutMultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'MultiImage Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//End Method

    public function EditMultiImage($id){
        $multi_image = AboutMultiImage::findOrFail($id);
        return view('admin.edit_multi_image', compact('multi_image'));
    }//Edit Method


    
    public function UpdateImage(Request $request){
        $image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(636, 852)->save('upload/home_about_multi-image/'.$image_gen);   
 
            $save_url ='upload/home_about_multi-image/'.$image_gen;

            AboutMultiImage::findOrFail($image_id)->update([
                'multi_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Single Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('home.banner')->with($notification);
        }
    }//Edit Method

    public function DeleteMultiImage($id){
        $multi = AboutMultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        AboutMultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Delete This Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//End method
}
