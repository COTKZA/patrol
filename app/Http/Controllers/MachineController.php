<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request)
    {
        $search = $request->search;
        $machines = Machine::where(function ($query) use ($search) {
            $query->where('ModelName', 'like', '%' . $search . '%')
            ->orWhere('MachineNO', 'like', '%' . $search . '%');
        })->where('MachineDeleted', '=', '0')
            ->orderBy('MachineNO')->get();
        return view("machine", compact(['machines', 'search']));
    }
}
