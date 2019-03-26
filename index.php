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
    .demo { height:400px; background:rgba(0,0,0,.03); border:3px solid black; }
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
  <script>
    window.onload = function() {
      var num      = 500;

      function generateRandomData(len) {
        var points = [];
        var max    = 0;
        var width  = 400;
        var height = 400;
        var len    = 200;

        while(len--) {
          var val = Math.floor(Math.random()*100);
          max = Math.max(max, val);
          var point = {
            x: Math.floor(Math.random()*width),
            y: Math.floor(Math.random()*height),
            value: val
          };
          points.push(point);
        }
        var data = {max:max, data: points};
        return data;
      }

      var heatmapInstance = h337.create({
        container: document.querySelector('.heatmap')
      });
      var data = generateRandomData(num);

      heatmapInstance.setData(data);

      document.querySelector('.btn').onclick = function() {
        heatmapInstance.setData(generateRandomData(num));
      };
    }
  </script>
</body>
</html>

