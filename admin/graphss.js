$.ajax({
    url: "../includes/auth.php",
    type: "GET",
    success: function (data) {
        var labels = []; // Use an array for labels
        var available = [];

        for (var i = 0; i < data.length; i++) {
            labels.push(data[i].section_name); // Use "section_name" here
            available.push(data[i].countCluster);
        }

        // Fetching data to chart js
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels, // Use the "labels" array here
                datasets: [{
                    label: 'Available cluster/section',
                    data: available,
                    backgroundColor: [
                        'rgb(255,0,0)',
                        'rgb(128,0,0)',
                        'rgb(255,165,0)',
                        'rgb(255,215,0)',
                        'rgb(0,255,0)',
                        'rgb(135,206,235)',
                        'rgb(0,0,255)',
                        'rgb(25,25,112)',
                        'rgb(238,130,238)',
                        'rgb(139,0,139)',
                        'rgb(0,0,0)',
                        'rgb(128,128,128)',
                        'rgb(139,69,19)',
                        'rgb(255,20,147)',
                        'rgb(127,255,212)'
                    ],
                    borderColor: [
                        'rgb(255,255,255)'
                    ],
                    hoverOffset: 4,

                }]
            },
            options: {
                /*scales: {
                    y: {
                        beginAtZero: true
                    }
                }*/
            }
        });
    },
    error: function (data) {
        console.log(data);
    }
});
