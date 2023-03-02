/**
 * fetch use to connect to the .json file.
 * and it will use .then to give the alternetives
 * if it failed (Not OK) to connect it will throw the Error message 
 * that will the value saved in ${response.status}
 * else it will return the .json file
 */
fetch('Questions.json')
  .then( response => {
    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    return response.json();
  })
  .then( json => initialize(json) )
  .catch( err => console.error(`Fetch problem: ${err.message}`) );


function initialize(questions) {

  let userAnswers = {};
  updateDisplay();

 

  function updateDisplay() {
     for( i=0; i<questions.length; i++){
    showProduct(questions[i]);
  }
}



let currentQuestionIndex = 0;
function showProduct(question) {
  const main = document.querySelector('main');
  main.innerHTML = ''; // clear previous content
  const section = document.createElement('section');
  const heading = document.createElement('h1');
  const para = document.createElement('p');
  const form = document.createElement('form');

  heading.textContent = question.section.replace(question.section.charAt(0), question.section.charAt(0).toUpperCase());
  para.textContent = question.sectionDescription;

  main.appendChild(section);
  section.appendChild(heading);
  section.appendChild(para);
  section.appendChild(form);

  for (let i = 0; i < question.questionsList.length; i++) {
    const qTitle = document.createElement('h2');
    const qTitleText = document.createTextNode(question.questionsList[i].questionTitle);
    qTitle.appendChild(qTitleText);
    form.appendChild(qTitle);

    const q = document.createElement('p');
    const qText = document.createTextNode(question.questionsList[i].q);
    q.appendChild(qText);
    form.appendChild(q);

    const radioButtons = createQuestionForm(i);
    form.appendChild(radioButtons);
  }

  const submitButton = document.createElement('button');
  submitButton.textContent = 'Submit';
  form.appendChild(submitButton);

  

  let nextQuestionIndex = questions.indexOf(question) + 1;
  if (nextQuestionIndex >= questions.length) {
    nextQuestionIndex = 0;
  }


  function createQuestionForm(index) {
    const radioDiv = document.createElement('div');

    const radioYes = document.createElement('input');
    radioYes.setAttribute('type', 'radio');
    radioYes.setAttribute('name', `q${index}`);
    radioYes.setAttribute('value', 'yes');
    radioDiv.appendChild(radioYes);

    const labelYes = document.createElement('label');
    labelYes.setAttribute('for', `q${index}`);
    const labelTextYes = document.createTextNode('Yes');
    labelYes.appendChild(labelTextYes);
    radioDiv.appendChild(labelYes);

    const radioNo = document.createElement('input');
    radioNo.setAttribute('type', 'radio');
    radioNo.setAttribute('name', `q${index}`);
    radioNo.setAttribute('value', 'no');
    radioDiv.appendChild(radioNo);

    const labelNo = document.createElement('label');
    labelNo.setAttribute('for', `q${index}`);
    const labelTextNo = document.createTextNode('No');
    labelNo.appendChild(labelTextNo);
    radioDiv.appendChild(labelNo);

    return radioDiv;
  }



  function createJSONFile(answers, Username) {
    const jsonString = JSON.stringify(answers);
    const blob = new Blob([jsonString], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = `${Username}_${new Date().toLocaleDateString()}.json`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
  }
  

  function submitAnswers(e) {
    e.preventDefault();
  
    const formData = new FormData(form);
    const questionAnswers = {};
  
    for (let i = 0; i < question.questionsList.length; i++) {
      const answer = formData.get(`q${i}`);
      if (answer) {
        questionAnswers[i+1] = answer;
      } else {
        alert('Please answer all questions before submitting.');
        return;
      }
    }
  
    userAnswers[question.section] = questionAnswers;
  
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
      showProduct(questions[currentQuestionIndex]);
    } else {
      const endMessage = document.createElement('p');
      endMessage.textContent = 'Thank you for answering all the questions!';
      main.appendChild(endMessage);
      createJSONFile(userAnswers,"USERNAME");
    }
  }
      form.addEventListener('submit', submitAnswers);
 
}

showProduct(questions[currentQuestionIndex]);



}

