<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="canvasjs.min.js"></script>
      <script type="text/javascript" src=""></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var dps1 = [], dps2 = [], dps3 = [];
            var chart = new CanvasJS.Chart("chartContainer", {            
                title: {
    
            },
            animationEnabled: true,
            toolTip: {    
            shared: true
            },
            data: [
                {
                    type: "line",
                    markerType: "square",
                    markerColor: "#18FFFF",
                    markerSize: 7,
                    title: "axisY Title",
                },
                {
                    type: "line",
                    markerType: "circle",
                    markerColor: "#B71C1C",
                    markerSize:7,
                    dataPoints: dps2
                },
                {
                    type: "line",
                    markerType: "triangle",
                    markerColor: "#5C6BC0",
                    markerSize:7,
                    dataPoints: dps3
                }
            ],
            axisY:{
            title: "ln k",
            },
            axisX:{
            title: "1/T",
            },
        });
        
        $.when(
            $.getJSON("data.php", function(result) {         
                for(var i = 0; i < result.length; i++) {
                dps1.push({ x: result[i].x, y: result[i].y1 });
                dps2.push({ x: result[i].x, y: result[i].y2 });    
                dps3.push({ x: result[i].x, y: result[i].y3 });         
                }
            })
        ).then(function() {
            chart.render();
        }); 
        });
    </script> 
</head>
<body>
    <div id="chartContainer" style="width: 800px; height: 380px;"></div>
       </body>
</html>