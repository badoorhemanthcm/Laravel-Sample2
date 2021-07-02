<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon; 
class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    	$gallery = DB::table('gallery')
                        ->orderby('created_at','desc')
                        ->get();

        return view('gallery.index',compact('gallery'));
    }

    public function viewImageAdd(){

    	return view('gallery.create');
    }

    public function addImage(Request $request){

    	
    	$request->validate([
            'file'       =>  'required|mimes:jpeg,jpg,png|max:10000',
        ]);

    	//dd($request->all());

        //$image      = $request->file('file');
        $image = $request->file('file');

        $name = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/gallery');

        $image->move($destinationPath, $name);

        DB::table('gallery')
                ->insert([
                    'image'     => $name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

        return redirect()->route('gallery')->with('message', 'Image Uploaded Successfully');

    	//Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');

    }

    public function viewEditImage($id){

    	$gallery = DB::table('gallery')
                        ->where('id',$id)
                        ->first();

        if($gallery){

            return view('gallery.edit',compact('gallery'));
        }
        else{

            return redirect()->route('gallery');
        }
    }

    public function updateImage(Request $request){

    	
    	$request->validate([
            'file'       =>  'required|mimes:jpeg,jpg,png|max:10000',
        ]);

    	$gallery = DB::table('gallery')->where('id',$request->image_id)->first();

    	$destinationPath = public_path('/gallery');

    	if((file_exists($destinationPath.'/'.$gallery->image)) && $gallery->image){

            unlink( $destinationPath.'/'.$gallery->image);
       	}

    	//dd($request->all());

        //$image      = $request->file('file');
        $image = $request->file('file');

        $name = time() . '.' . $image->getClientOriginalExtension();

        $image->move($destinationPath, $name);

        DB::table('gallery')
        		->where('id',$request->image_id)
                ->update([
                    'image'     => $name,
                    'updated_at' => Carbon::now(),
                ]);

        return redirect()->route('gallery')->with('message', 'Image updated Successfully');

    	//Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');

    }

    public function deleteImage($id){

        $gallery = DB::table('gallery')->where('id',$id)->first();

        if($gallery){

            $destinationPath = public_path('/gallery');

            if((file_exists($destinationPath.'/'.$gallery->image)) && $gallery->image){

                unlink( $destinationPath.'/'.$gallery->image);
            }

            DB::table('gallery')->where('id',$id)->delete();

            return redirect()->route('gallery')->with('message', 'Image deleted!');
        }
        else{

            return redirect()->route('gallery');
        }

    }
}
