var ChartDescription="The bar chart displays your compliance percentage for each section on the left, while the donut chart on the right shows your overall result.";
var text ="    Our platform offers a valuable feature that allows users to effectively compare and contrast two distinct test results.This functionality proves to be incredibly useful in identifying any modifications or adjustments made since the last test, thus enabling individuals to gain a deeper understanding of their progress over time. By utilizing this tool, users can easily track their development and make informed decisions based on their testing data.";

function button(){
          const button = document.createElement('button');
          button.innerText = 'Compare';
          button.id = 'CompareButton';
    
          // Attach the "click" event to your button
          button.addEventListener('click', () => {
            location.href='./comparResult.php';
          })
          document.body.appendChild(button)
}


function checkFile() {
    let fileInput = document.getElementById('file');
    if (fileInput.files.length === 0) {
      document.getElementById('Results').innerHTML = " ";
      alert('Please choose a file.');
    } else {
      document.getElementById('Results').innerHTML = 'Compliance Report';
      document.getElementById('chart-description').innerHTML = ChartDescription;
      DisplayResults();
      document.getElementById('Compare').innerHTML = text;
      button();
      document.getElementById('file-reader').style.display = 'none';
    }
  }
  


function DisplayResults() {
    let file = document.getElementById("file").files[0];
    let fileReader = new FileReader();
    fileReader.onload = function() {
        let data = JSON.parse(fileReader.result);
        plotChart(data);
      }
      fileReader.readAsText(file);
}

    
function plotChart(data) {
    var complianceData = [];
    var noncomplianceData = [];
    var labels = [];
  
    var totalCompliant = 0;
    var totalNonCompliant = 0;
  
    var i = 0;
  
    for (var section in data) {
      var sectionData = data[section];
      var numQuestions = Object.keys(sectionData).length;
  
      var numCompliant = 0;
  
      for (var question in sectionData) {
        if (sectionData[question] == "1") {
          numCompliant++;
        }
      }
  
      var compliancePercent = numCompliant / numQuestions;
  
      var noncompliancePercent = 1 - compliancePercent;
  
      complianceData.push(compliancePercent.toFixed(2));
      noncomplianceData.push(noncompliancePercent.toFixed(2));
  
      totalCompliant += numCompliant;
      totalNonCompliant += numQuestions - numCompliant;
  
      labels.push("A." + (i + 5));
      i++;
    }
  
    var totalData = [totalCompliant, totalNonCompliant];
    var totalColors = ["green", "red"];
  
    var ctx = document.getElementById("chart").getContext("2d");
  
    var myChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: labels,
        datasets: [
          {
            label: "Compliance",
            data: complianceData,
            backgroundColor: "green",
          },
          {
            label: "Non-Compliance",
            data: noncomplianceData,
            backgroundColor: "red",
          },
        ],
      },
      options: {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
                max: 100
              },
            },
          ],
        },
      },
    });
  
    var totalCtx = document.getElementById("donut-chart").getContext("2d");
  
    var totalChart = new Chart(totalCtx, {
      type: "doughnut",
      data: {
        labels: ["Compliance", "Non-Compliance"],
        datasets: [
          {
            label: "Total",
            data: totalData,
            backgroundColor: totalColors,
          },
        ],
      },
    })

}
  