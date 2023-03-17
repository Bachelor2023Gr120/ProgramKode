fetch('data.json')
.then(response => response.json())
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
//https://www.chartjs.org/docs/latest/charts/bar.html
function createChart(id, data, label) {
  const chart = new Chart(id, {
    type: 'bar',
    data: {
      labels: [`Compliance : ${data[0]}%`, `Non-Compliance: ${data[1]}%`],
      datasets: [{
        label: label,
        data: data,
        backgroundColor: [
          'rgba(0,255,51,0.7)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(51,255,0)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        
      }]
    },
    options: {
      title: {
        display: true,
        text: label
      }
    }
  });

  return chart;
}
