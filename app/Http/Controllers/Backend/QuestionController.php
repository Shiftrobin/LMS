<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\CourseSection;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function UserQuestion(Request $request){

        $course_id = $request->course_id;
        $instructor_id = $request->instructor_id;

        Question::insert([
            'course_id' => $course_id,
            'user_id' => Auth::user()->id,
            'instructor_id' => $instructor_id,
            'subject' => $request->subject,
            'question' => $request->question,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Message Send Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function InstructorAllQuestion(){

        $id = Auth::user()->id;
        $question = Question::where('instructor_id', $id)->where('parent_id',null)->orderBy('id','desc')->get();

        return view('instructor.question.all_question',compact('question'));
    }

    public function QuestionDetails($id){

        $question = Question::find($id);
        $reply = Question::where('parent_id',$id)->orderBy('id','asc')->get();

        return view('instructor.question.question_details', compact('question','reply'));
    }

    public function InstructorReply(Request $request){

        $que_id = $request->qid;
        $user_id = $request->user_id;
        $course_id = $request->course_id;
        $instructor_id = $request->instructor_id;

        Question::insert([
            'course_id' => $course_id,
            'user_id' => $user_id,
            'instructor_id' => $instructor_id,
            'parent_id' => $que_id,
            'question' => $request->question,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Message Send Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

}
