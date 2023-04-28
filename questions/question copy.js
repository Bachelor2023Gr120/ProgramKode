/**
 * fetch use to connect to the .json file.
 * and it will use .then to give the alternetives
 * if it failed (Not OK) to connect it will throw the Error message 
 * that will the value saved in ${response.status}
 * else it will return the .json file
 */
fetch('Questions copy.json')
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
      showQuestion(questions[i]);
    }
  }



  let currentQuestionIndex = 0;

    function showQuestion(question) {
      const main = document.querySelector('main');
      main.innerHTML = ''; // clear previous content
      const section = document.createElement('section');
      const heading = document.createElement('h1');
      const para = document.createElement('p');
      const form = document.createElement('form');

      const heading2 = document.createElement('h1');
      heading2.setAttribute("class", "pageNr");

      heading.textContent = question.section;
      para.textContent = question.sectionDescription;

      main.appendChild(section);
      section.appendChild(heading);
      section.appendChild(para);
      section.appendChild(form);
      section.appendChild(heading2);

    


      for (let i = 0; i < question.questionsList.length; i++) {
        const questionContainer = document.createElement('div');
        form.appendChild(questionContainer);
        
        if(question.questionsList[i].Tips){
          const tipContainer = document.createElement('h3');
          const tipTitle = document.createElement('h1');
          const tTitle = document.createTextNode(question.questionsList[i].TipsTitle);
          tipTitle.appendChild(tTitle);
          questionContainer.appendChild(tipTitle);

          tipContainer.style.display = 'inline-block';
          tipTitle.style.display = 'inline-block';

          tipContainer.innerText = '?';
          questionContainer.appendChild(tipContainer);
        
          const tipText = document.createElement('p');
          const tText = document.createTextNode(question.questionsList[i].Tips);
        
          tipText.style.display = 'none';
          tipText.appendChild(tText);
          questionContainer.appendChild(tipText);

          tipContainer.setAttribute("class", "tip-container");
          tipText.setAttribute("class", "tipText");
        
          tipContainer.addEventListener('mouseover', () => {
            tipText.style.display = 'block';
          });
        
          tipContainer.addEventListener('mouseout', () => {
            tipText.style.display = 'none';
          });
        }

        heading2.textContent = questions.indexOf(question) + 1 +"/"+questions.length;
        /*const qTitle = document.createElement('h2');
        const qTitleText = document.createTextNode(question.questionsList[i].questionTitle);
        qTitle.appendChild(qTitleText);
        form.appendChild(qTitle);*/

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
          radioYes.setAttribute('value', '1');
          radioDiv.appendChild(radioYes);

          const labelYes = document.createElement('label');
          labelYes.setAttribute('for', `q${index}`);
          const labelTextYes = document.createTextNode('Yes');
          labelYes.appendChild(labelTextYes);
          radioDiv.appendChild(labelYes);
          
          const radioPartial = document.createElement('input');
          radioPartial.setAttribute('type', 'radio');
          radioPartial.setAttribute('name', `q${index}`);
          radioPartial.setAttribute('value', '0.5');
          radioDiv.appendChild(radioPartial);

          const labelPartial = document.createElement('label');
          labelPartial.setAttribute('for', `q${index}`);
          const labelTextPartial = document.createTextNode('Partial');
          labelPartial.appendChild(labelTextPartial);
          radioDiv.appendChild(labelPartial);

          const radioNo = document.createElement('input');
          radioNo.setAttribute('type', 'radio');
          radioNo.setAttribute('name', `q${index}`);
          radioNo.setAttribute('value', '0');
          radioDiv.appendChild(radioNo);

          const labelNo = document.createElement('label');
          labelNo.setAttribute('for', `q${index}`);
          const labelTextNo = document.createTextNode('No');
          labelNo.appendChild(labelTextNo);
          radioDiv.appendChild(labelNo);


          return radioDiv;
      }

    

      function createJSONFile(answers, Username) {
          const jsonString = JSON.stringify(answers, null, 2); // add 2-space indentation for readability
          const formattedJsonString = jsonString.replace(/(?:\r\n|\r|\n)/g, '\n'); // add newline after each section
          const blob = new Blob([formattedJsonString], { type: 'application/json' });
        
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
              window.scrollTo(0, 0);
              showQuestion(questions[currentQuestionIndex]);
            } else {
              window.location.href = "../Results/displayResult.php";
              createJSONFile(userAnswers,Username);
            }
      }
          form.addEventListener('submit', submitAnswers);
    
    }

  showQuestion(questions[currentQuestionIndex]);



}





