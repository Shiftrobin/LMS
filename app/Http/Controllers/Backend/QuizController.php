<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizResult;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    //instructor quiz manage
    public function StoreQuiz(Request $request){

        $instructor_id = $request->instructor_id;
        $course_id = $request->course_id;
        $section_id = $request->section_id;
        $lecture_id = $request->lecture_id;

        Quiz::insert(
            [
                'question'=> $request->question,
                'a'=> $request->a,
                'b'=> $request->b,
                'c'=> $request->c,
                'd'=> $request->d,
                'ans'=> $request->ans,
                'instructor_id' => $instructor_id,
                'course_id' => $course_id,
                'section_id' => $section_id,
                'lecture_id' => $lecture_id,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Quiz Question Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function UpdateQuiz(Request $request){

        $id = $request->quiz_id;

        Quiz::find($id)->update(
            [
                'question'=> $request->question,
                'a'=> $request->a,
                'b'=> $request->b,
                'c'=> $request->c,
                'd'=> $request->d,
                'ans'=> $request->ans,
                'updated_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Question Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function DeleteQuiz($id){

        $item = Quiz::find($id);
        $item->delete();

        $notification = array(
            'message' => 'Question Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    // user quiz desk view
    public function QuizDeskView($instructorId, $courseId, $sectionId, $lectureId){

            $quizes = Quiz::where('instructor_id', $instructorId)
                    ->where('course_id', $courseId)
                    ->where('section_id', $sectionId)
                    ->where('lecture_id', $lectureId)
                    ->get();

            return view('frontend.quiz.quizdesk_view',
                    compact(
                        'quizes',
                        'instructorId',
                        'courseId',
                        'sectionId',
                        'lectureId'
                    ));
        }


        // quiz result store
        public function QuizResultStore(Request $request){

            $data = new QuizResult();
            $data->user_id = Auth::user()->id;
            $data->result = "pass";
            $data->instructor_id = $request->instructorId;
            $data->course_id = $request->courseId;
            $data->section_id = $request->sectionId;
            $data->lecture_id = $request->lectureId;

            $data->created_at = Carbon::now();
            $data->save();

            $notification = array(
                'message' => 'You have passed the quiz successfully. The video is unlocked now check back!',
                'alert-type' => 'success',
            );
            return redirect()->route('quizresult.thankyou')->with($notification);
        }


        public function QuizResultThankYou(){

            return view('frontend.quiz.quizresult_thankyou');
        }




}
