{
    type: "scatter",
    data: {
        datasets: [
            {
                label: "Watt",
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
            text: "Power consumption",
        },
        scales: {
            xAxes: [
                {
                    label: "Watt",
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
