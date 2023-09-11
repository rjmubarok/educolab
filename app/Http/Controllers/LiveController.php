<?php

namespace App\Http\Controllers;
use App\Models\Live;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function index(Request $request)
    {
            // if ($request->ajax()) {
            $datas = Live::orderBy('id','DESC')->get();
           // return $datas;
        //     return DataTables::of($datas)
        //         ->addColumn('action', function ($row) {
        //             return '<a href="#" class="btn btn-info btn-sm">Edit</a> <a href="#" class="btn btn-danger btn-sm">Delete</a>';
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('lives.index', compact('datas'));
    }

    public function create()
    {
        return view('lives.create');
    }

    public function store(Request $request)
    {
      //  return $request->all();
         $request->validate([
            'intro' => 'required|string|max:255',
            'video_link' => 'required|string',
        ]);

        //Live::create($validatedData);
        $live = new Live();
        $live->intro=$request->intro;
        $live->video_link=$request->video_link;
      $status=  $live->save();
      if($status){
        return redirect()->route('lives.index')->with('success', 'Live session created successfully');
      }else{
        return back()->with('error', 'Something went wrong !');
      }


    }

    public function edit($id)
    {
        $live = Live::findOrFail($id);
        return view('lives.edit', compact('live'));
    }

    public function update(Request $request, $id)
    {
        $live = Live::findOrFail($id);

        $validatedData = $request->validate([
            'intro' => 'required|string|max:255',
            'video_link' => 'required|string',
        ]);

        $live->update($validatedData);

        return redirect()->route('lives.index')->with('success', 'Live session updated successfully');
    }

    public function show($id)
    {
        $live = Live::findOrFail($id);
        return view('lives.show', compact('live'));
    }

    public function destroy($id)
    {
        $live = Live::findOrFail($id);
        $live->delete();

        return redirect()->route('lives.index')->with('success', 'Live session deleted successfully');
    }
}
