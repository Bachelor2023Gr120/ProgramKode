fetch('data.json')
.then(response => response.json())
/*.then(data => {
  const sections = Object.keys(data);
  const charts = [];
  const sectionData = [];
  const compliance = [];
  const nonCompliance = [];

  for (let i = 0; i < sections.length; i++) {
    const dataValues = Object.values(data[sections[i]]);
    const sectionPercentage = calculatePercentage(dataValues);
    sectionData.push({ label: sections[i], compliance: sectionPercentage[0], 
                                           nonCompliance: sectionPercentage[1] });
    compliance.push(sectionPercentage[0]);
    nonCompliance.push(sectionPercentage[1]);
  }

  const chart = createChart('chart', sectionData, compliance, nonCompliance);
  charts.push(chart);
});

*/
.then(data => {
  const sections = Object.keys(data);
  const charts = [];

  for (let i = 0; i < sections.length; i++) {
    const sectionData = Object.values(data[sections[i]]);
    const sectionPercentage = calculatePercentage(sectionData);
    const chart = createChart(`chart${i+1}`, sectionPercentage, sections[i]);
    charts.push(chart);
    
  }
});

 

function calculatePercentage(data) {
  const total = data.length;
  const correct = data.filter(answer => answer === 1).length;
  const percentage = Math.round((correct / total) * 100);
  const incorrect = total - correct;
  return [percentage, incorrect];
}

/*function createChart(id, data, compliance, nonCompliance) {
  const chart = new Chart(id, {
    type: 'bar',
    data: {
      labels: data.map(d => d.label),
      datasets: [
        {
          label: 'Compliance',
          data: compliance,
          backgroundColor: 'rgba(0,255,51,0.7)',
        },
        {
          label: 'Non-Compliance',
          data: nonCompliance,
          backgroundColor: 'rgba(255, 0, 0, 0.7)',
        }
      ],
    },
    options: {
      title: {
        display: true,
        text: 'Compliance Chart'
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

  return chart;
}
*/
//https://www.chartjs.org/docs/latest/charts/bar.html
function createChart(id, data, labels) {
  const chart = new Chart(id, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Compliance',
        data: data.map(section => section[0]),
        backgroundColor: 'rgba(0, 255, 0, 0.7)',
        borderColor: 'rgb(51, 204, 51)',
        borderWidth: 1
      },
      {
        label: 'Non-Compliance',
        data: data.map(section => section[1]),
        backgroundColor: 'rgba(255, 0, 0, 0.7)',
        borderColor: 'rgb(204, 51, 51)',
        borderWidth: 1
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Compliance Summary'
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            callback: function(value) {return value + "%"}
          }
        }]
      },
      legend: {
        labels: {
          fontSize: 14
        }
      }
    }
  });

  return chart;
}