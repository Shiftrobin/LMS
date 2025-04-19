@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"> Quiz Desk </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> Quiz Desk </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">

            <h5 class="mb-4"> Quiz Desk </h5>


            <div class="quiz-container">
                <div id="quiz"></div>
            </div>
            <br>
              <button id="previous">Previous Question</button>
              <button id="next">Next Question</button>
              <button id="submit">Submit Quiz</button>
              <div id="results" class="text text-danger"></div>
              <div id="unlock_video"></div>
              <div id="try_again"></div>


        <script type="text/javascript">

            const quizContainer = document.getElementById('quiz');
            const resultsContainer = document.getElementById('results');
            const submitButton = document.getElementById('submit');
            (function(){
                // Functions
                function buildQuiz(){
                  // variable to store the HTML output
                  const output = [];

                  // for each question...
                  myQuestions.forEach(
                    (currentQuestion, questionNumber) => {

                      // variable to store the list of possible answers
                      const answers = [];

                      // and for each available answer...
                      for(letter in currentQuestion.answers){

                        // ...add an HTML radio button
                        answers.push(
                          `<label>
                            <input type="radio" name="question${questionNumber}" value="${letter}">
                            ${letter} :
                            ${currentQuestion.answers[letter]}
                          </label>`
                        );
                      }

                      // add this question and its answers to the output
                      output.push(
                        `<div class="slide">
                          <div class="question"> ${currentQuestion.question} </div>
                          <div class="answers"> ${answers.join("")} </div>
                        </div>`
                      );
                    }
                  );

                  // finally combine our output list into one string of HTML and put it on the page
                  quizContainer.innerHTML = output.join('');
                }

                function showResults(){

                  // gather answer containers from our quiz
                  const answerContainers = quizContainer.querySelectorAll('.answers');

                  // keep track of user's answers
                  let numCorrect = 0;

                  // for each question...
                  myQuestions.forEach( (currentQuestion, questionNumber) => {

                    // find selected answer
                    const answerContainer = answerContainers[questionNumber];
                    const selector = `input[name=question${questionNumber}]:checked`;
                    const userAnswer = (answerContainer.querySelector(selector) || {}).value;

                    // if answer is correct
                    if(userAnswer === currentQuestion.correctAnswer){
                      // add to the number of correct answers
                      numCorrect++;

                      // color the answers green
                      answerContainers[questionNumber].style.color = 'lightgreen';
                    }
                    // if answer is wrong or blank
                    else{
                      // color the answers red
                      answerContainers[questionNumber].style.color = 'red';
                    }
                  });

                  // show number of correct answers out of total
                  resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;


                  if (`${numCorrect}` === `${myQuestions.length}`) {
                      document.getElementById('unlock_video').innerHTML = `
                        <form action="{{ route('quizresult.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="instructorId" value="{{ $instructorId }}" />
                            <input type="hidden" name="courseId" value="{{ $courseId }}" />
                            <input type="hidden" name="sectionId" value="{{ $sectionId }}" />
                            <input type="hidden" name="lectureId" value="{{ $lectureId }}" />
                            <button type="submit">Unlock Next Video</button>
                        </form>
                      `;
                  }else{
                    document.getElementById('try_again').innerHTML = `<span class='badge badge-info'>If you put wrong answer. Check previous questions and make those correct</span>`;
                  }


                }

                function showSlide(n) {
                  slides[currentSlide].classList.remove('active-slide');
                  slides[n].classList.add('active-slide');
                  currentSlide = n;
                  if(currentSlide === 0){
                    previousButton.style.display = 'none';
                  }
                  else{
                    previousButton.style.display = 'inline-block';
                  }
                  if(currentSlide === slides.length-1){
                    nextButton.style.display = 'none';
                    submitButton.style.display = 'inline-block';
                  }
                  else{
                    nextButton.style.display = 'inline-block';
                    submitButton.style.display = 'none';
                  }
                }

                function showNextSlide() {
                  showSlide(currentSlide + 1);
                }

                function showPreviousSlide() {
                  showSlide(currentSlide - 1);
                }

                // Variables
                const quizContainer = document.getElementById('quiz');
                const resultsContainer = document.getElementById('results');
                const submitButton = document.getElementById('submit');
                const myQuestions = [
                    @foreach ($quizes as $quiz)
                    {
                        question: "{{ $quiz['question'] }}",
                        answers: {
                            a: "{{ $quiz['a'] }}",
                            b: "{{ $quiz['b'] }}",
                            c: "{{ $quiz['c'] }}",
                            d: "{{ $quiz['d'] }}"
                        },
                        correctAnswer: "{{ $quiz['ans'] }}"
                    },
                    @endforeach
                ];


                // Kick things off
                buildQuiz();

                // Pagination
                const previousButton = document.getElementById("previous");
                const nextButton = document.getElementById("next");
                const slides = document.querySelectorAll(".slide");
                let currentSlide = 0;

                // Show the first slide
                showSlide(currentSlide);

                // Event listeners
                submitButton.addEventListener('click', showResults);
                previousButton.addEventListener("click", showPreviousSlide);
                nextButton.addEventListener("click", showNextSlide);
              })();

        </script>



        <style>

            /* @import url(https://fonts.googleapis.com/css?family=Work+Sans:300,600);
            * {
              box-sizing: border-box;
              margin: 0;
              padding: 0;
            }
            body {
              font-size: 20px;
              font-family: "Work Sans", sans-serif;
              color: #333;
              font-weight: 300;
              text-align: center;
              background-color: #279;
            }
            h1 {
              font-weight: 300;
              margin: 0px;
              padding: 10px;
              font-size: 40px;
              background-color: #444;
              color: #fff;
            } */
            /* .question {
              font-size: 30px;
              margin-bottom: 10px;

            }
            .answers {
              margin-bottom: 20px;
              text-align: left;
              display: inline-block;

            }
            */
            .answers label {
              display: block;
              margin-bottom: 10px;
            }
            button {
              font-size: 22px;
              background-color: #444;
              color: #fff;
              border: 0px;
              border-radius: 3px;
              padding: 20px;
              cursor: pointer;
              margin-bottom: 20px;
            }
            button:hover {
              background-color: #38a;
            }

            .slide {
              position: absolute;
              left: 0px;
              top: 0px;
              width: 100%;
              z-index: 1;
              opacity: 0;
              transition: opacity 0.5s;
            }
            .active-slide {
              opacity: 1;
              z-index: 2;
            }
            .quiz-container {
              position: relative;
              height: 200px;
              /*margin-top: 40px;*/
            }


        </style>





        </div>
    </div>
</div>





@endsection

