const data = {
    labels: [
      'P1',
      'P2',
      'P3',
      'P4',
      'P5'
    ],
    datasets: [{
      data: [100, 500, 400, 400,150],
      backgroundColor: [
        '#0771D3',
        '#1CCAD8',
        '#0CF574',
        '#F1BE42',
        '#5185EC'
      ],
      hoverOffset: 4
    }]
  };

  const config = {
    type: 'doughnut',
    data: data,
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
