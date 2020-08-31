<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a837cb4006.js"></script>
    <link rel="stylesheet"  href="hover-min.css">
    <link rel="stylesheet" type="text/css" href="animate-custom.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" href="myicon3.png" sizes="32x32" type="image/png"> 
    <script type="text/javascript" src="MathJax-master/MathJax.js?config=TeX-AMS_HTML-full"></script>
    <script type="text/javascript" src="Chart.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="canvasjs.min.js"></script>
</head>
<body onload="current_page();compute();">
    <div class="header" id="header">
        <div class="name" style="padding-left: 10px;"><img src="mylogo.png" width="60%" height="auto"></div>
          <!--<div class='top_nav'>
          <a href="index.php?task=index">
                <button class="hvr-icon-push" id="home" title="homepage"><i class="fas fa-home hvr-icon" id="home_icon"></i></button>
            </a>
            <button class="hvr-icon-pop" title="about" id="about"><i class="fas fa-info-circle hvr-icon"></i></button>
             
                 <button class="hvr-icon-pop"  title="references"><i class="fas fa-file-archive hvr-icon"></i></button>
        </div>-->
    </div>
    <div class="content" id="content">
        <?php include('functions.php');?>
    </div> <!--End of content-->
    
<script type="text/javascript">
   
    function current_page(){
       var cur_page= document.getElementById('current').value;
        switch(cur_page) {
        case 'solver':
            document.getElementById('first_reaction').style.backgroundColor='rgb(30, 136, 229)'; 
        break;
        case 'first_reaction':
          document.getElementById('first_reaction').style.backgroundColor='rgb(30, 136, 229)'; 
        break;

        case 'second_reaction':
            document.getElementById('second_reaction').style.backgroundColor='rgb(30, 136, 229)';  
        break;

        case 'third_reaction':
            document.getElementById('third_reaction').style.backgroundColor='rgb(30, 136, 229)'; 
        break;

         case 'fourth_reaction':
            document.getElementById('fourth_reaction').style.backgroundColor='rgb(30, 136, 229)'; 
        break;


        case 'home':
            document.getElementById('home_icon').style.color='rgb(30, 136, 229)'; 
        break;
    }
}
</script>
<script>
    /*
    new Chart(document.getElementById("line-chart"), {
  type: 'line',

  data: {
      labels: [,'','1/T',,,],

    datasets: [{
        data: [,-3.396000319,-320.4504035],
        label: "Arrhenius Law",
        borderColor: "#3e95cd",
        fill: false
      },{
        data: [,-3.049426729,-321.2551225],
        label: "Collision Theory",
        borderColor: "#FF7043",
        fill: false
      },{
        data: [,-3.049426729,-321.2551225],
        label: "Collision Theory",
        borderColor: "#FF7043",
        fill: false
      }
      ]
  },
  options: {
    title: {
      display: true,
      text: 'Reaction Rate Theories Graph',
    },
    legend: {
      labels: {
    
        boxWidth:10,

      }
    }
  }



});

*/

</script>

</body>
</html>
