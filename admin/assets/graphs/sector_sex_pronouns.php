
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawSexGraphs);
      google.charts.setOnLoadCallback(drawPronounGraphs);

      function drawSexGraphs() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Sex');
        data.addColumn('number', 'Numbers');
        data.addRows([
          ['Male', <?php echo $numOfSexMale; ?>],
          ['Female', <?php echo $numOfSexFemale; ?>],
          ['Intersex', <?php echo $numOfSexIntersex; ?>],
          ['Prefer Not To Say', <?php echo $numOfSexUnknown; ?>],
          ['Other', <?php echo $numOfSexOther; ?>]
        ]);

        var options = {title:'',
                       width:600,
                       height:400};

        var chart = new google.visualization.PieChart(document.getElementById('sex_chart_div'));
        chart.draw(data, options);
      }

      function drawPronounGraphs() {
        var data = google.visualization.arrayToDataTable([
          ['Pronouns', '#'],
          ['He/Him', <?php echo $numOfPronounsHimNew; ?>],
          ['They/Them', <?php echo $numOfPronounsThemNew; ?>],
          ['She/Her', <?php echo $numOfPronounsHerNew; ?>],
          ['Other', <?php echo $numOfPronounsOther; ?>]
        ]);

        var options = {title:'',
                       width:600,
                       height:400};

        var chart = new google.visualization.PieChart(document.getElementById('pronouns_chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <table class="columns">
      <tr>
        <td><div id="sex_chart_div" style="border: 0px solid #ccc"></div></td>
        <td><div id="pronouns_chart_div" style="width: 600px; height: 400px;"></div></td>
      </tr>
    </table>
  </body>
</html>
