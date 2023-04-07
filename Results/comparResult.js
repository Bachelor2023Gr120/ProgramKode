var ComparisontDescription="Take a look at the chart below, which highlights the contrast between two sets of test results. The chart specifically focuses on the compliance rate, showcasing the differences between the two sets of data. This information can be valuable for analyzing and comparing performance metrics and identifying areas for improvement.";
function checkFile() {
  let fileInput1 = document.getElementById('file1');
  let fileInput2 = document.getElementById('file2');
  if (fileInput1.files.length === 0 || fileInput2.files.length === 0) {
    document.getElementById('Titel').innerHTML = "";
    alert('Please choose files.');
  } else {
    document.getElementById('Titel').innerHTML = 'Comparison report';
    document.getElementById('Comparison-Description').innerHTML = ComparisontDescription;

    processFiles();

    document.getElementById('content').style.display = 'none';
  }
}


function processFiles() {
    let file1 = document.getElementById("file1").files[0];
    let file2 = document.getElementById("file2").files[0];
    let fileReader1 = new FileReader();
    let fileReader2 = new FileReader();
    fileReader1.onload = function() {
      let data1 = JSON.parse(fileReader1.result);
      fileReader2.onload = function() {
        let data2 = JSON.parse(fileReader2.result);
        plotChart(data1, data2, file1, file2);
      }
      fileReader2.readAsText(file2);
    }
    fileReader1.readAsText(file1);
  }
  
  function plotChart(data1, data2, file1, file2) {
    let labels = [];
    let complianceData1 = [];
    let complianceData2 = [];
    for (let section in data1) {
      labels.push(section);
      let questions = data1[section];
      let complianceCount = 0;
      for (let q in questions) {
        if (questions[q] === "1") {
          complianceCount++;
        }
      }
      let compliancePercent = (complianceCount / Object.keys(questions).length) * 100;
      complianceData1.push(compliancePercent.toFixed(2));
    }
    for (let section in data2) {
      let questions = data2[section];
      let complianceCount = 0;
      for (let q in questions) {
        if (questions[q] === "1") {
          complianceCount++;
        }
      }
      let compliancePercent = (complianceCount / Object.keys(questions).length) * 100;
      complianceData2.push(compliancePercent.toFixed(2));
    }
    let ctx = document.getElementById('chart').getContext('2d');
    let chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels:  labels,
        datasets: [{
          label: file1.name,
          backgroundColor: 'rgb(11, 132, 165)',
          data: complianceData1
        }, {
          label: file2.name,
          backgroundColor: 'rgb(246, 200, 95)',
          data: complianceData2
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              max: 100
            },
            scaleLabel: {
              display: true,
              labelString: 'Percentage'
            }
          }]
        }
      }
    });
  }
  