@extends('instructor.instructor_dashboard')
@section('instructor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">

    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <img src="{{ asset('public/'.$course->course_image) }}" class="rounded-circle p-1 border" width="90" height="90" alt="...">

                        <div class="flex-grow-1 ms-3">
                            <h5 class="mt-0">{{ $course->course_name }}</h5>
                            <p class="mb-0">{{ $course->course_title }}</p>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Section</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('add.course.section') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $course->id }}" />

                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="input1" class="form-label">Course Section</label>
                                                <input type="text" class="form-control" name="section_title" id="input1">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Add Section and Lecture --}}

            @foreach ( $section as $key => $item)

                <div class="container">

                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-body p-4 d-flex justify-content-between">
                                        <h6>{{ $item->section_title }}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            {{-- delete section --}}
                                            <form action="{{ route('delete.section', ['id'=> $item->id]) }}" method="POST">
                                              @csrf
                                              <button type="submit" class="btn btn-danger px-2 ms-auto">Delete Section</button>
                                            </form>

                                            &nbsp;
                                            <a class="btn btn-primary px-2 ms-auto" onclick="addLectureDiv({{ $course->id }}, {{ $item->id }}, 'lectureContainer{{ $key }}')" id="addLectureBtn($key)">Add Lecture</a>
                                        </div>
                                    </div>

                                    <div class="courseHide" id="lectureContainer{{ $key }}">
                                        <div class="container">
                                            @foreach ($item->lectures as $lecture )
                                                <div class="lectureDiv mb-3 d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <strong> {{ $loop->iteration }}.{{ $lecture->lecture_title ?? '' }} </strong>


                                                            <div class="py-3">

                                                                <!-- add quiz -->
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModalAddQuiz{{ $lecture->id }}">Add Quiz Question</button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleLargeModalAddQuiz{{ $lecture->id }}" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Add Quiz Question</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <form action="{{ route('store.quiz') }}" method="POST" class="row g-3" id="myForm">
                                                                                    @csrf

                                                                                    <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}">
                                                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                                                    <input type="hidden" name="section_id" value="{{ $item->id }}">
                                                                                    <input type="hidden" name="lecture_id" value="{{ $lecture->id }}">

                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="input1" class="form-label">Question</label>
                                                                                        <input type="text" class="form-control" name="question" id="input1" placeholder="Enter Question">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="input1" class="form-label">Option A</label>
                                                                                        <input type="text" class="form-control" name="a" id="input1">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="input1" class="form-label">Option B</label>
                                                                                        <input type="text" class="form-control" name="b" id="input1">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="input1" class="form-label">Option C</label>
                                                                                        <input type="text" class="form-control" name="c" id="input1">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="input1" class="form-label">Option D</label>
                                                                                        <input type="text" class="form-control" name="d" id="input1">
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label for="input1" class="form-label">Answer</label>
                                                                                        <select name="ans" class="form-select mb-3" aria-label="Default select example">
                                                                                            <option selected="" disabled>Open this select menu</option>
                                                                                            <option  value="a">A</option>
                                                                                            <option  value="b">B</option>
                                                                                            <option  value="c">C</option>
                                                                                            <option  value="d">D</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="col-md-6 mt-5">
                                                                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                                                                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                @php

                                                                $quizzes = App\Models\Quiz::where('lecture_id', $lecture->id)->get();

                                                                @endphp

                                                                @foreach($quizzes as $quiz)

                                                                    <div class="py-2">
                                                                        <span>  {{ $quiz->question }} </span>
                                                                        &nbsp;&nbsp;
                                                                        <!-- edit quiz -->
                                                                         <!-- Button trigger modal -->
                                                                         <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleLargeModalEditQuiz{{ $quiz->id }}">Edit Quiz Question</button>
                                                                         &nbsp;
                                                                          <!--  delete quiz -->
                                                                          <a href="{{ route('delete.quiz', $quiz->id) }}" class="btn btn-sm btn-danger px-5" id="delete">Delete Quiz Question</a>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="exampleLargeModalEditQuiz{{ $quiz->id }}" tabindex="-1" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">Update Quiz Question</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">

                                                                                            <form action="{{ route('update.quiz') }}" method="POST" class="row g-3" id="myForm">
                                                                                                @csrf

                                                                                                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

                                                                                                <div class="form-group col-md-12">
                                                                                                    <label for="input1" class="form-label">Question</label>
                                                                                                    <input type="text" class="form-control" name="question" id="input1" value="{{ $quiz->question }}">
                                                                                                </div>
                                                                                                <div class="form-group col-md-6">
                                                                                                    <label for="input1" class="form-label">Option A</label>
                                                                                                    <input type="text" class="form-control" name="a" id="input1" value="{{ $quiz->a }}">
                                                                                                </div>
                                                                                                <div class="form-group col-md-6">
                                                                                                    <label for="input1" class="form-label">Option B</label>
                                                                                                    <input type="text" class="form-control" name="b" id="input1" value="{{ $quiz->b }}">
                                                                                                </div>
                                                                                                <div class="form-group col-md-6">
                                                                                                    <label for="input1" class="form-label">Option C</label>
                                                                                                    <input type="text" class="form-control" name="c" id="input1" value="{{ $quiz->c }}">
                                                                                                </div>
                                                                                                <div class="form-group col-md-6">
                                                                                                    <label for="input1" class="form-label">Option D</label>
                                                                                                    <input type="text" class="form-control" name="d" id="input1" value="{{ $quiz->d }}">
                                                                                                </div>
                                                                                                <div class="form-group col-md-6">
                                                                                                    <label for="input1" class="form-label">Answer</label>
                                                                                                    <select name="ans" class="form-select mb-3" aria-label="Default select example">
                                                                                                        <option selected="" disabled>Open this select menu</option>
                                                                                                        <option  value="a" {{ $quiz->ans == 'a' ? 'selected' : '' }}>A</option>
                                                                                                        <option  value="b" {{ $quiz->ans == 'b' ? 'selected' : '' }}>B</option>
                                                                                                        <option  value="c" {{ $quiz->ans == 'c' ? 'selected' : '' }}>C</option>
                                                                                                        <option  value="d" {{ $quiz->ans == 'd' ? 'selected' : '' }}>D</option>
                                                                                                    </select>
                                                                                                </div>

                                                                                                <div class="col-md-6 mt-5">
                                                                                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                                                                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                    </div>

                                                                @endforeach



                                                            </div>





                                                    </div>
                                                    <div class="btn-group">
                                                        <a href="{{ route('edit.lecture', ['id' => $lecture->id]) }}" class="btn btn-sm btn-primary">Edit Lecture</a>
                                                        &nbsp;
                                                        <a href="{{ route('delete.lecture', ['id' => $lecture->id]) }}" class="btn btn-sm btn-danger" id="delete">Delete Lecture</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            @endforeach


        </div>
    </div>

</div>







<script>
    function addLectureDiv(courseId, sectionId, containerId) {

            const lectureContainer = document.getElementById(containerId);

            const newLectureDiv = document.createElement('div');
            newLectureDiv.classList.add('lectureDiv','mb-3');

            newLectureDiv.innerHTML = `
                <div class="container">
                    <h6>Lecture Title</h6>
                    <input type="text" name='video_title' class="form-control" placeholder="Enter Lecture Title" />
                    <textarea class="form-control mt-2"  placeholder="Enter Lecture Content" ></textarea>

                    <h6 class="mt-3">Add video</h6>
                    <input type="file" class="form-control" name="video_url" id="input1" accept="video/mp4, video/webm">

                    <button class="btn btn-primary mt-3" onclick="saveLecture('${courseId}','${sectionId}','${containerId}')">Save Lecture</button>
                    <button class="btn btn-secondary mt-3" onclick="hideLectureContainer('${containerId}')">Cancel</button>
                </div>
            `;

            lectureContainer.appendChild(newLectureDiv);

    }

    function hideLectureContainer(containerId){
        const lectureContainer = document.getElementById(containerId);
        lectureContainer.style.display = 'none';
        location.reload();
    }
</script>

<script>
    function saveLecture(courseId, sectionId, containerId){

        const lectureContainer = document.getElementById(containerId);
        const lectureTitle = lectureContainer.querySelector('input[name="video_title"]').value;
        const lectureContent = lectureContainer.querySelector('textarea').value;
        const lectureVideoInput = lectureContainer.querySelector('input[name="video_url"]');
        const lectureVideoFile = lectureVideoInput.files[0];
       //console.log(lectureVideoFile);

        const formData = new FormData();
        formData.append('course_id', courseId);
        formData.append('section_id', sectionId);
        formData.append('lecture_title', lectureTitle);
        formData.append('content', lectureContent);
        formData.append('video', lectureVideoFile);


        fetch('{{ route('save-lecture') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);


            lectureContainer.style.display = 'none';
            location.reload();


              // Start Message

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 6000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    title: data.success,
                    })

            }else{

           Toast.fire({
                    type: 'error',
                    title: data.error,
                    })
                }

              // End Message


        })
        .catch(error => {
            console.log(error);
        });

    }
</script>


@endsection

