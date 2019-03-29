<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Minimal Configuration Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
    .heatmap { width:100%; height:100%; }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-heatmap">
  	<div class="demo">
          <div class="heatmap"></div>
	</div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <div id="info"></div>
    </div>
  </div>
<div>
  <script src="js/heatmap.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      var _width  = 0;
      var _height = 0;
      var  heatmapInstance = null;

      sizing();

      function build() {
        if(heatmapInstance != null) {
          heatmapInstance.configure({ radius: 120, container: document.querySelector('.heatmap') });
        }
        else {
          heatmapInstance = h337.create({ radius: 120, container: document.querySelector('.heatmap') });
        }
      }
      build();

      function getsensordata() {
        console.log('sensors/?width='+_width+'&height='+_height);
        $.getJSON('sensors/?width='+_width+'&height='+_height, function(data) {
          var info  = document.getElementById("info");
          var text = "";
          //console.log(data);
          heatmapInstance.setData(data.heatmap);


          text += '<table class="table table-dark">';
          text += '<tr>';
          text += '<td>Sum</td>';
          text += '<td>'+data.stat.sum+'</td>';
          text += '</tr>';
          text += '<tr>';
          text += '<td>Average</td>';
          text += '<td>'+data.stat.avg+'</td>';
          text += '</tr>';
          text += '<tr>';
          text += '<td>F/M/R</td>';
          text += '<td>'+data.stat.pos.front+' | '+data.stat.pos.middle+' | '+data.stat.pos.rear+'</td>';
          text += '</tr>';
          text += '<tr>';
          text += '<td>L/C/R</td>';
          text += '<td>'+data.stat.pos.left+' | '+data.stat.pos.center+' | '+data.stat.pos.right+'</td>';
          text += '</tr>';
          text += '<tr>';
          text += '<td>Max</td>';
          text += '<td>'+data.stat.max+'</td>';
          text += '</tr>';
          text += '<tr>';
          text += '<td>Channel</td>';
          text += '<td>'+data.stat.channel+'</td>';
          text += '</tr>';
          text += '</table>';

          info.innerHTML = text;
        });
        setTimeout(getsensordata, 1000);
      }
      setTimeout(getsensordata, 1000);

      function sizing() {
        _height = _width  = $(".col-heatmap").css("width").replace("px", "");;
        //_height = $(".col-heatmap").css("height").replace("px", "");;

        $(".demo").css("width",  _width + 'px');
        $(".demo").css("height", _height + 'px');
      }
      $(window).resize( function() {
        sizing();
        console.log("resize function called. width=" + _width + ", height="+_height);
        build();
      });
    });
  </script>
</body>
</html>

