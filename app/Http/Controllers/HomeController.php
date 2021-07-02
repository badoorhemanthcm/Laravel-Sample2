<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon; 
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = DB::table('students')
                        ->orderby('created_at','desc')
                        ->get();

        return view('home',compact('students'));
    }

    public function viewCreate(){

        return view('create');
        //dd('');
    }

    public function createStudent(Request $request){

        $request->validate([
            'name'       =>  'required',
            'term'       =>  'required',   
            'physics'    =>  'required|numeric|min:0',
            'chemistry'  =>  'required|numeric|min:0',
            'biology'    =>  'required|numeric|min:0',
        ]);

        $totalMark = $request->physics + $request->chemistry + $request->biology;

        DB::table('students')
                ->insert([

                    'name'     => $request->name,
                    'term'      => $request->term,
                    'physics'   => $request->physics,
                    'chemistry' => $request->chemistry,
                    'biology'   => $request->biology, 
                    'total'     => $totalMark,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

        return redirect()->route('home')->with('message', 'Student Created Successfully');
        //dd($request->all());

    }

    public function viewEdit($id){

        $student = DB::table('students')
                        ->where('id',$id)
                        ->first();

        if($student){
            return view('edit',compact('student'));
        }
        else{
            return redirect()->route('home');
        }
    }

    public function updateStudent(Request $request){

        $request->validate([
            'name'       =>  'required',
            'term'       =>  'required',   
            'physics'    =>  'required|numeric|min:0',
            'chemistry'  =>  'required|numeric|min:0',
            'biology'    =>  'required|numeric|min:0',
        ]);

        $totalMark = $request->physics + $request->chemistry + $request->biology;

        DB::table('students')
                ->where('id',$request->student_id)
                ->update([

                    'name'      => $request->name,
                    'term'      => $request->term,
                    'physics'   => $request->physics,
                    'chemistry' => $request->chemistry,
                    'biology'   => $request->biology, 
                    'total'     => $totalMark,
                    'updated_at' => Carbon::now(),
                ]);

        return redirect()->route('home')->with('message', 'Student Updated Successfully');
    }

    public function deleteStudent($id){

        $student = DB::table('students')->where('id',$id)->first();

        if($student){

            DB::table('students')->where('id',$id)->delete();
            return redirect()->route('home')->with('message', 'Student data deleted!');
        }
        else{

            return redirect()->route('home');
        }

    }

    public function editfile(){

        $destinationPath = public_path('/');

        $myFile = "sampleFile.txt";

        $contents = file_get_contents($destinationPath."/".$myFile);

        //dd($contents);

        $fh = fopen($destinationPath."/".$myFile, 'w') or die("can't open file");

        $stringData = "Bobby Bopper\n";

        

        fwrite($fh, $contents.$stringData);
        //$stringData = "Tracy Tanner\n";
        //fwrite($fh, $stringData);
        fclose($fh);

    }

    public function showfile(){

        $myFile = "sampleFile.txt";

        $destinationPath = public_path('/');

        $contents = file_get_contents($destinationPath."/".$myFile);

        //dd($contents);

        return view('file.index',compact('contents'));
    }

    public function updatefile(Request $request){

        //dd($request->all());

        $destinationPath = public_path('/');

        $myFile = "sampleFile.txt";

        $fh = fopen($destinationPath."/".$myFile, 'w') or die("can't open file");

        fwrite($fh, $request->text);

        fclose($fh);

        return redirect()->route('show.file')->with('message', 'File Content Updated!');
        //dd($request->all());

    }
}
