<?php include("header.php"); ?>
    <h2>andamsndk</h2>
 <canvas id="MeSeStatusCanvas" width="20" height="20"></canvas>

<script type="text/javascript">
    var dataValues=[1,2,3,4,5,6];
   

var MeSeContext = document.getElementById("MeSeStatusCanvas").getContext("2d");
    var MeSeData = {
        labels: [
            "50-69",
            "15-49",
            "5-14",
            "70+",
            "under 5"

        ],
        datasets: [
            {
                label: "Test",
                data: dataValues,
                backgroundColor: ["#669911", "#119966","#669911", "#119966","#669911" ],
                hoverBackgroundColor: ["#66A2EB", "#FCCE56","#669911", "#119966","#669911"]
            }]
    };

var MeSeChart = new Chart(MeSeContext, {
    type: 'horizontalBar',
    data: MeSeData,
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    min: 0 // Edit the value according to what you need
                }
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
});



</script>

</body>
</html>