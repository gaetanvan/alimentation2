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

function sizeChange(val) {
    document.getElementById('output').innerHTML = val;
}
document.getElementById("customRange1").value = 160;

function weightChange(val) {
    document.getElementById('output1').innerHTML = val;
}
document.getElementById('customRange2').value = 70;