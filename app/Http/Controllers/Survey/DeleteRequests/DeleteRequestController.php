<?php

namespace App\Http\Controllers\Survey\DeleteRequests;

use App\Http\Controllers\Controller;
use App\Models\DeleteRequest;
use Illuminate\Http\Request;

class DeleteRequestController extends Controller
{
    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        // dd($request);
        DeleteRequest::create([
            'arta_id' => $request->arta_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ]);

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
