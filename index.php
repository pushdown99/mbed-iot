<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Minimal Configuration Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
    .demo { width:400px; height:400px; background:rgba(0,0,0,.03); border:3px solid black; }
    .heatmap { width:100%; height:100%; }
    .btn { margin-top:10px; }
  </style>
</head>
<body>
  <div class="demo">
  <div class="heatmap"></div>
  </div>
  <button class="btn">re-generate data</button>
  <script src="js/heatmap.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      var heatmapInstance = h337.create({
        radius: 90,
        container: document.querySelector('.heatmap')
      });
      $.getJSON('sensors/', function(data) {
        console.log(data);
        heatmapInstance.setData(data);
      });
    });
  </script>
</body>
</html>

