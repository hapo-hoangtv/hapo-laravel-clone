<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    

    public function create()
    {
        //
    }

    public function store(ReviewRequest $request)
    {
        $review = $request->all();
        $review['user_id'] = Auth::user()->id;
        Review::create($review);
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(ReviewRequest $request, $id)
    {
        // $review = Review::findOrFail($id);
        // $data = $request->all();
        // $review->update($data);
        // return redirect()->back();
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->back();
    }
}
