<?php

namespace App\Http\Controllers;

use App\Models\ProcessLine;
use Illuminate\Http\Request;

class ProcessLineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
   {
       $searchTerm = $request->input('search');
       $processLines = ProcessLine::when($searchTerm, function ($query, $searchTerm) {
           return $query->where('LaneName', 'like', '%' . $searchTerm . '%');
       })->get();

       return view('process_lines', compact('processLines', 'searchTerm'));
   }

   public function store(Request $request)
   {
       $request->validate([
           'LaneName' => 'required|string|max:100|unique:process_lines,LaneName',
       ]);
       ProcessLine::create([
           'LaneName' => $request->input('LaneName'),
       ]);

       return redirect()->back()->with('success', 'LaneName added successfully!');
   }

   public function update(Request $request, $id)
  { 
        $request->validate([
            'LaneName' => 'required|string|max:100|unique:process_lines,LaneName,' . $id . ',LineID', // Ensure it's unique except for the current record
        ]);
        $processLine = ProcessLine::findOrFail($id);
        $processLine->update([
            'LaneName' => $request->input('LaneName'),
        ]);

        return redirect()->back()->with('success', 'LaneName updated successfully!');
    }

    public function destroy($id)
    {
        $processLine = ProcessLine::findOrFail($id);
        $processLine->delete();
        
        return redirect()->back()->with('success', 'LaneName deleted successfully!');
    }

}
