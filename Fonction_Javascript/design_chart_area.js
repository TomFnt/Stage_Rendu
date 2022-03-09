 let ctx = document.getElementById("Graph2");
    let graph = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
            datasets: [{
                label: "Service1",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.8)",
                data: [3, 2, 6, 4, 1, 1, 7, 0, 2, 3, 5, 0]
            },
                {
                    label: "Service2",
                    lineTension: 0.3,
                    backgroundColor: "rgba(248,15,53, 0.8)",
                    borderColor: "rgba(248,15,53, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(248,15,53, 1)",
                    pointBorderColor: "rgba(248,15,53, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(248,15,53, 1)",
                    pointHoverBorderColor: "rgba(248,15,53, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [9, 4, 2, 7, 0, 0, 1, 3, 5, 2, 9, 10],
                }],
            options: {
                responsive: true,
            },
        },
    });

