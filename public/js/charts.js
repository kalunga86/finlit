// Expenses Graph
document.addEventListener('DOMContentLoaded', function () {
    const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // Assuming gradientStroke1 is defined somewhere in your code
    const ctx = document.getElementById('expensesGraph').getContext('2d');
    const gradientStroke1 = ctx.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

    const data = {
        labels: labels,
        datasets: [{
            label: 'Expenses',
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5e72e4",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: monthlyExpenses,
            maxBarThickness: 6
        },{
          label: 'Payments',
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#ff6384",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: monthlyPayments,
          maxBarThickness: 6
      }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: false,
                }
            },
            interaction: {
              intersect: false,
              mode: 'index',
            },
            scales: {
              y: {
                grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  padding: 10,
                  color: '#fbfbfb',
                  font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                  },
                }
              },
              x: {
                grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  color: '#ccc',
                  padding: 20,
                  font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                  },
                }
              },
            },
        }
    };

    const myChart = new Chart(
        document.getElementById('expensesGraph'),
        config
    );
});

// Budget Doughnut
document.addEventListener('DOMContentLoaded', function () {
    const data = {
        labels: ['Used Amount', 'Remaining Amount'],
        datasets: [{
            label: 'Budget Usage',
            backgroundColor: ['#FF6384', '#36A2EB'],
            // borderColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
            data: budgetData,
            // borderWidth: 1,
            borderRadius: 10
        }]
    };
    
    const config = {
        type: 'doughnut',
        data: data,
        options: {
            cutout: '80%',
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Budget Usage for the Month'
                }
            }
        }
    };

    const myChart = new Chart(
        document.getElementById('budgetChart'),
        config
    );
});