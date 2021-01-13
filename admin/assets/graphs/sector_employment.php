<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawHabbitsTooDifficult);
        function drawHabbitsTooDifficult() {
          var data = google.visualization.arrayToDataTable([
            ["Difficult Behaviours ", "Numbers", { role: "style" } ],
            ["Employed, working 1-20 hours per week", <?php echo $numOfEmployed1to20 ?>, "#63008d"],
            ["Employed, working 21 – 40+ or more hours per week", <?php echo $numOfEmployed21to40 ?>, "#5600ce"],
            ["Not employed, looking for work", <?php echo $numOfUnEmployedLooking ?>, "#717077"],
            ["Not employed, NOT looking for work", <?php echo $numOfUnEmployedNotLooking ?>, "#816e60"],
            ["Disabled, not able to work", <?php echo $numOfUnEmployedDisabled ?>, "#c5ae60"],            
            ["Retired / Pensioner", <?php echo $numOfUnEmployedRetired ?>, "#1a2135"]
          ]);

          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);

          var options = {
            title: "",
            width: 1200,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
          };
          var chart = new google.visualization.BarChart(document.getElementById("habits_to_break_barchart"));
          chart.draw(view, options);
      }
      </script>
    <div id="habits_to_break_barchart" style="width: 1100px; height: 400px;"></div>
  </head>
  <body>
  </body>
</html>
