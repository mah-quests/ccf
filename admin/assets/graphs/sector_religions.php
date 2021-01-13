
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Christian", <?php echo $numOfReligionChristian ?>, "#b87333"],
        ["Islam", <?php echo $numOfReligionIslam ?>, "silver"],
        ["Hinduism", <?php echo $numOfReligionHinduism ?>, "gold"],
        ["African Religion", <?php echo $numOfReligionAfrican ?>, "#b87333"],
        ["Judaism", <?php echo $numOfReligionJudaism ?>, "silver"],
        ["Atheist", <?php echo $numOfReligionAtheist ?>, "gold"],
        ["Rastafarian", <?php echo $numOfReligionRastafarian ?>, "#b87333"],
        ["Prefer not to say", <?php echo $numOfReligionUnknown ?>, "silver"],
        ["Other Religion", <?php echo $numOfReligionOther ?>, "gold"]
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
        height: 550,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("mobilisers_surveys"));
      chart.draw(view, options);
  }
  </script>
<div id="mobilisers_surveys" style="width: 1200px; height: 550px;"></div>