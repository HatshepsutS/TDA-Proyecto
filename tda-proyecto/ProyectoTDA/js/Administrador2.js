const config2 = {
    type: 'bar',
    data,
    options: {
      indexAxis: 'y',
      plugins: {
        legend: {
          display: false
        }
      }
    }
  };
  
  
    var myChart = new Chart(
      document.getElementById('myChart2'),
      config2
    );
  