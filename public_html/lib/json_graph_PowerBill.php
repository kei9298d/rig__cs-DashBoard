{
    type: "scatter",
    data: {
        datasets: [
            {
                label: "Yen",
                borderColor: "rgb(255, 99, 132)",
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                data: [
                    __DATA__
                ],
            },
        ],
    },

    options: {
        title: {
            display: true,
            text: "Power Billing",
        },
        scales: {
            xAxes: [
                {
                    label: "Yen",
                    position: "left",
                    ticks: {
                        min: 0,
                        max: __SCALES_X__,
                    },
                },
            ],
            yAxes: [
                {
                    label: "Time(sec)",
                    position: "bottom",
                    ticks: {
                        min: 0,
                        max: __SCALES_Y__,
                    },
                },
            ],
        },
    },
}
