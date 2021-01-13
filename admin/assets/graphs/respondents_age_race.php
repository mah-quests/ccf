
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawAgeSegmentsChart);

      google.charts.setOnLoadCallback(drawRageSegmentation);

      function drawAgeSegmentsChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Front Line Workers');
        data.addColumn('number', 'Numbers');
        data.addRows([
          ['Between 18 to 24 years', <?php echo $numOfAge18to24 ?>],
          ['Between 25 to 34 years', <?php echo $numOfAge25to34 ?>],
          ['Between 35 to 44 years', <?php echo $numOfAge35to44 ?>],
          ['Between 45 to 54 years', <?php echo $numOfAge45to54 ?>],
          ['Between 55 to 64 years', <?php echo $numOfAge55to64 ?>],          
          ['Over 65 years', <?php echo $numOfAge65plus ?>]
        ]);

        var options = {title:'Age Brackets',
                       width:600,
                       height:400,
                       pieHole: 0.4,
                     };

        var chart = new google.visualization.PieChart(document.getElementById('age_segmentation_barchart_div'));
        chart.draw(data, options);
      }

      function drawRageSegmentation() {

      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
         ['African (Black)', <?php echo $numOfRaceBlack ?>, '#676767'],  
         ['Colored', <?php echo $numOfRaceAsian ?>, '#fec001'], 
         ['Indian', <?php echo $numOfRaceIndian ?>, '#d1af94'],
         ['White', <?php echo $numOfRaceWhite ?>, '#e9e9e9'],
         ['Other', <?php echo $numOfRaceOther ?>, 'color: #425d2c' ], 
      ]);       


      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Race Segmentations",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("race_barchart_div"));
      chart.draw(view, options);
  }

    </script>
  </head>
  <body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td>
            <div id="race_barchart_div" style="border: 0px solid #ccc">
            </div>
        </td>
        <td>
            <div id="age_segmentation_barchart_div" style="border: 0px solid #ccc">
            </div>
        </td>                
      </tr>
      
    </table>
  </body>
</html>
