console.log('bonjour a tous');

const ctx = document.getElementById('myChart');
var ChartUpdate = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: 'kcal',
                data: [],
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

//size
var items = document.getElementsByClassName("foodCalories");
var len = items.length;
var kcal = document.getElementById('kcal')
var calcCalories = 0

// loop through all elements having class name ".my-class"

for (var i = 0; i < len; i++) {
    var item = items[i].innerHTML
    ChartUpdate.data.datasets[0].data.push(item);
    ChartUpdate.update();
    calcCalories = parseInt(calcCalories) + parseInt(items[i].innerHTML);
    kcal.innerHTML = calcCalories;
}