<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_goal;
use App\Models\Category;
use App\Models\CourseSection;
use App\Models\CourseLecture;
use App\Models\SubCategory;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){

        $course = $request->course_id;
        $instructor = $request->instructor_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([

            'course_id' => $course,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rate,
            'instructor_id' => $instructor,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Review Will Approve By Admin',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    } // end method

    public function AdminPendingReview(){

        $review = Review::where('status',0)->orderBy('id','desc')->get();
        return view('admin.backend.review.pending_review', compact('review'));
    }

    public function UpdateReviewStatus(Request $request){

        $reviewId = $request->input('review_id');
        $isChecked = $request->input('is_checked',0);

        $review = Review::find($reviewId);
        if($review){
            $review->status = $isChecked;
            $review->save();
        }
        return response()->json(['message' => 'Review Status Updated Successfully']);
    }

    public function AdminActiveReview(){
        $review = Review::where('status',1)->orderBy('id','desc')->get();
        return view('admin.backend.review.active_review', compact('review'));
    }

    public function InstructorAllReview(){
        $id = Auth::user()->id;
        $review = Review::where('instructor_id', $id)->where('status',1)->orderBy('id','DESC')->get();
        return view('instructor.review.active_review', compact('review'));
    }

}
