<?php
 $answer = "";
    

  function checkAnswer(){
        global $answer;
        $dbConn = getDatabaseConnection('challenge');
        
        $sql = "SELECT yes, no, maybe  FROM `ch8` ";
        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($records);
        
        
        if(isset($_GET["submit"]))
        {
            if($_GET['answer'] == "")
            {
              
            }
            if($_GET['answer'] == "yes")
            {
            echo "YES";
            
                $answer = $('#yes').val();
            }
            if ($_GET['answer'] == "no")
            {
                echo "NO";
                $answer = $("#no").val();
            }
            if ($_GET['answer'] == "maybe")
            {
                echo "MAYBE";
                $answer = $("#maybe").val();
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

        <script>
        
        function updatePoll() {
            $("#container").html("<img src='img/loading.gif' />");
            
            //Include here the AJAX call 
            var answer = $("#")
            $.ajax({

            type: "GET",
            url: "getInfo.php",
            dataType: "json",
            data: { "answer": $("#yes").val(), "answer": $("#no").val(), "answer": $("#maybe").val()},
            success: function(data,status) {
            //alert(data);
            
            
            
            },
            complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
            }
            
            });//ajax

            //on Success, call the 'updatePollChart' function passing the percentages of the three choices, for example:
            updatePollChart(25,40,35);
        }
        
        //You can change the choice names if different from "yes", "maybe", and "no"
        function updatePollChart(yes, maybe, no) {
            Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Choices',
                        colorByPoint: true,
                        data: [{
                            name: 'Yes',
                            y: yes
                        }, {
                            name: 'Maybe',
                            y: maybe,
                            sliced: true,
                            selected: true
                        }, {
                            name: 'No',
                            y: no
                        }]
                    }]
                });
        }//endFunction
        
        </script>
        
    </head>
    <body>

      <h1> Is Global Warming Real? </h1>
      <div> 
      <form method = "GET">
      <select>
        <option value = "Yes" id = "yes" <?= ($_GET['answer'] == "yes")?"checked":"" ?>>Yes</option>
        <option value = "No" id = "no">No</option> <?= ($_GET['answer'] == "no")?"checked":"no" ?>
        <option value = "Maybe" id = "maybe">Maybe</option> <?= ($_GET['answer'] == "maybe")?"checked":"maybe" ?>
        </select>
         <button onclick="updatePoll()">Submit</button> 
        </form>
      </div>
     
      <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

    </body>
</html>