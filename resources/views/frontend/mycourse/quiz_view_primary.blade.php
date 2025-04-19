{{-- @foreach ($quizes as $keyquiz => $quiz) 

<form action="" method="POST">    
        @csrf
        <div class="row">    
            <div class="col-md-12">  
            <h4>{{$keyquiz+1}} {{ $quiz->question }}</h4>  
            <input value='a' type="radio" name="ans" checked='true'> (A)<small> {{ $quiz->a }} </small>  
            <br>
            <input value='b' type="radio" name="ans"> (B)<small> {{ $quiz->b }} </small>   
            <br>
            <input value='c' type="radio" name="ans"> (C)<small> {{ $quiz->c }} </small>  
            <br> 
            <input value='d' type="radio" name="ans"> (D)<small> {{ $quiz->d }} </small>  

            <input type="hidden" value="{{ $quiz->ans }}" name="dbans">        
            </div>             
        
            <div class="col-md-12">               
                <div class="d-md-flex d-grid align-items-center gap-3 mt-5">
                <button type="submit" class="btn btn-primary">Next</button> 
                </div>
                </div>
            </div>
    </form>   

@endforeach --}}

{{-- @foreach ($quizes as $keyquiz => $quiz) 

           <h4>{{$keyquiz+1}} {{ $quiz->question }}</h4>  
            <input value='a' type="radio" name="ans" checked='true'> (A)<small> {{ $quiz->a }} </small>  
            <br>
            <input value='b' type="radio" name="ans"> (B)<small> {{ $quiz->b }} </small>   
            <br>
            <input value='c' type="radio" name="ans"> (C)<small> {{ $quiz->c }} </small>  
            <br> 
            <input value='d' type="radio" name="ans"> (D)<small> {{ $quiz->d }} </small>  

            <input type="hidden" value="{{ $quiz->ans }}" name="dbans">     
    
@endforeach --}}




<div class="quiz-container">
    <div id="quiz"></div>
</div>
<br>
  <button id="previous">Previous Question</button>
  <button id="next">Next Question</button>
  <button id="submit">Submit Quiz</button>
  <div id="results"></div>
  <div id="sx"></div>
  




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
          document.getElementById('sx').innerHTML = "<button>unlock next video</button>";
      }else{
        document.getElementById('sx').innerHTML = "<button>try again</button>";
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