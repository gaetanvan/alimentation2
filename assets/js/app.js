console.log('bonjour a tous');

const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            borderwidth: false,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 5
        }]
    },
        options: {
            responsive:true,
            cutout:"80%",
        },
        layout:{
            padding:20,
        }
});
