<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart', 'table']
    });
</script>

<?php
echo "<h1 id='chartTitle'>" . $survey->survey_title . "</h1>";
echo "<div id='chartsContainerWrapper'>";
echo "<div id='chartsContainer'>";
foreach ($questions as $question) {

    if ($question["question_type"] == 1) {
        echo "<script>";

        echo "
        function drawChart() {
    
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Choice');
            data.addColumn('number', 'Frequency');
            data.addRows([
            ";

        foreach ($choices as $choice) {
            if ($choice["question_id"] == $question["question_id"]) {
                echo "['" . $choice["choice_text"] . "'," . $choice["choice_frequency"] . " ],";
            }
        }

        echo "]);
            var options = {
                title: '" . $question["question_text"] . "'
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('" . $question["question_id"] . "'));
    
            chart.draw(data, options);
        } 
    
        google.charts.setOnLoadCallback(drawChart);
        ";
        echo "</script>";

        echo '<div class="chartContainer" id="' . $question["question_id"] . '" style="border: 1px solid #ccc"></div>';
    } else if ($question["question_type"] == 2) {
        echo "<script>";

        echo "
        function drawChart() {
    
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Choice');
            data.addColumn('number', 'Frequency');
            data.addRows([
            ";

        foreach ($choices as $choice) {
            if ($choice["question_id"] == $question["question_id"]) {
                echo "['" . $choice["choice_text"] . "'," . $choice["choice_frequency"] . " ],";
            }
        }

        echo "]);
            var options = {
                title: '" . $question["question_text"] . "'
            };
    
            var chart = new google.visualization.BarChart(document.getElementById('" . $question["question_id"] . "'));
    
            chart.draw(data, options);
        } 
    
        google.charts.setOnLoadCallback(drawChart);
        ";
        echo "</script>";

        echo '<div class="chartContainer" id="' . $question["question_id"] . '" style="border: 1px solid #ccc"></div>';
    } else {
        $textResponses = $this->Response->getResponses($question["question_id"]);
        echo "<script>";

        echo "
        function drawChart() {
    
            var data = new google.visualization.DataTable();
            data.addColumn('string', ' " . $question["question_text"] . "');
            data.addRows([
            ";

        foreach ($textResponses as $response) {
            echo "['" . $response->answer . "' ],";
        }

        echo "]);
            var options = {
                title: '" . $question["question_text"] . "',
                width: '100%', 
                height: '100%'
            };
    
            var chart = new google.visualization.Table(document.getElementById('" . $question["question_id"] . "'));
    
            chart.draw(data, options);
        } 
    
        google.charts.setOnLoadCallback(drawChart);
        ";
        echo "</script>";

        echo '<div class="chartContainer" id="' . $question["question_id"] . '" style="border: 1px solid #ccc"></div>';
    }
}
echo "</div>";
echo "</div>";


?>

<?php
$data["jsFile"] = "answerForm.js";
$this->load->view("templates/modals.php", $data);
?>
</body>

</html>