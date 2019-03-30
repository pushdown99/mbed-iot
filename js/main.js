
(function ($) {
  // USE STRICT
  "use strict";

  var ctx1 = null;
  var ctx2 = null;
  var ctx3 = null;

  var myChart1 = null;
  var myChart2 = null;
  var myChart3 = null;

  try {
    ctx1 = document.getElementById("widgetChart1");
    if (ctx1) {
      ctx1.height = 130;
      myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          type: 'line',
          datasets: [{
            data: [],
            label: 'Dataset',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                max: 200,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    ctx2 = document.getElementById("widgetChart2");
    if (ctx2) {
      ctx2.height = 130;
      myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          type: 'line',
          datasets: [{
            data: [],
            label: 'Dataset',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                max: 200,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }

    ctx3 = document.getElementById("widgetChart3");
    if (ctx3) {
      ctx3.height = 130;
      myChart3 = new Chart(ctx3, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          type: 'line',
          datasets: [{
            data: [],
            label: 'Dataset',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                max: 200,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }
  } catch (error) {
    console.log(error);
  }

  $(".btn-group > button.btn").on("click", function(){
    console.log(this.innerHTML);
    _type = this.innerHTML;
  });

  var ctx5 = null;
  var ctx6 = null;

  var _type = "NORM";
  var _width  = 0;
  var _height = 0;
  var _radius = 120;
  var heatmapInstance =  null;

  try {
    ctx5 = document.getElementById("widgetChart5");
    if (ctx5) {
      sizing();
      heatmapInstance =  h337.create({ radius: _radius, container: document.querySelector('.heatmap') });
      getdata5();
      setTimeout(getdata5, 1000);
    }

    var ctx6 = document.getElementById("widgetChart6");
    if (ctx6) {
      ctx6.height = 380;
    }

  } catch (error) {
    console.log(error);
  }

  try {
    //Sales chart
    var ctx = document.getElementById("sales-chart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            label: "Foods",
            data: [0, 30, 10, 120, 50, 63, 10],
            backgroundColor: 'transparent',
            borderColor: 'rgba(220,53,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(220,53,69,0.75)',
          }, {
            label: "Electronics",
            data: [0, 50, 40, 80, 40, 79, 120],
            backgroundColor: 'transparent',
            borderColor: 'rgba(40,167,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(40,167,69,0.75)',
          }]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },
          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Value',
                fontFamily: "Poppins"

              },
              ticks: {
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
            text: 'Normal Legend'
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    //Team chart
    var ctx = document.getElementById("team-chart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            data: [0, 7, 3, 5, 2, 10, 7],
            label: "Expense",
            backgroundColor: 'rgba(0,103,255,.15)',
            borderColor: 'rgba(0,103,255,0.5)',
            borderWidth: 3.5,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(0,103,255,0.5)',
          },]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            position: 'top',
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },


          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Value',
                fontFamily: "Poppins"
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {
    //bar chart
    var ctx = document.getElementById("barChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'bar',
        defaultFontFamily: 'Poppins',
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
            {
              label: "My First dataset",
              data: [65, 59, 80, 81, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              fontFamily: "Poppins"
            },
            {
              label: "My Second dataset",
              data: [28, 48, 40, 19, 86, 27, 90],
              borderColor: "rgba(0,0,0,0.09)",
              borderWidth: "0",
              backgroundColor: "rgba(0,0,0,0.07)",
              fontFamily: "Poppins"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    //radar chart
    var ctx = document.getElementById("radarChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
          labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
          defaultFontFamily: 'Poppins',
          datasets: [
            {
              label: "My First dataset",
              data: [65, 59, 66, 45, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.6)",
              borderWidth: "1",
              backgroundColor: "rgba(0, 123, 255, 0.4)"
            },
            {
              label: "My Second dataset",
              data: [28, 12, 40, 19, 63, 27, 87],
              borderColor: "rgba(0, 123, 255, 0.7",
              borderWidth: "1",
              backgroundColor: "rgba(0, 123, 255, 0.5)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scale: {
            ticks: {
              beginAtZero: true,
              fontFamily: "Poppins"
            }
          }
        }
      });
    }

  } catch (error) {
    console.log(error)
  }

  try {

    //line chart
    var ctx = document.getElementById("lineChart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          defaultFontFamily: "Poppins",
          datasets: [
            {
              label: "My First dataset",
              borderColor: "rgba(0,0,0,.09)",
              borderWidth: "1",
              backgroundColor: "rgba(0,0,0,.07)",
              data: [22, 44, 67, 43, 76, 45, 12]
            },
            {
              label: "My Second dataset",
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "1",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              pointHighlightStroke: "rgba(26,179,148,1)",
              data: [16, 32, 18, 26, 42, 33, 44]
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true,
          tooltips: {
            mode: 'index',
            intersect: false
          },
          hover: {
            mode: 'nearest',
            intersect: true
          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }

        }
      });
    }


  } catch (error) {
    console.log(error);
  }


  try {

    //doughut chart
    var ctx = document.getElementById("doughutChart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [{
            data: [45, 25, 20, 10],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ],
            hoverBackgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }


  } catch (error) {
    console.log(error);
  }


  try {

    //pie chart
    var ctx = document.getElementById("pieChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          datasets: [{
            data: [45, 25, 20, 10],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ],
            hoverBackgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    // polar chart
    var ctx = document.getElementById("polarChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          datasets: [{
            data: [15, 18, 9, 6, 19],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.8)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0,0,0,0.2)",
              "rgba(0, 123, 255,0.5)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {

    // single bar chart
    var ctx = document.getElementById("singelBarChart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
          datasets: [
            {
              label: "My First dataset",
              data: [40, 55, 75, 81, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  function addChartData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
  }

  function removeChartData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
  }

  function getdata1() {
    var url = "pressure/?type=SUM";
    $.getJSON(url, function(data) {
      document.getElementById("current_pressure").innerHTML = data[0];
      addChartData(myChart1,"Pressure", data[0]);
    });
    setTimeout(getdata1, 1000);
  }

  function getdata2() {
    var url = "pressure/?type=DIFF";
    $.getJSON(url, function(data) {
      document.getElementById("current_diff").innerHTML = data[0];
      addChartData(myChart2,"Diff", data[0]);
    });
    setTimeout(getdata2, 1000);
  }

  function getdata3() {
    var url = "pressure/?type=USAGE";
    $.getJSON(url, function(data) {
      document.getElementById("existence").innerHTML = data[0];
      addChartData(myChart3,"Usage", data[0]);
    });
    setTimeout(getdata3, 1000);
  }

  function getdata4() {
    var url = "events/?type=LATEST";
    $.getJSON(url, function(data) {
      document.getElementById("events_table").innerHTML = null;
   });
/*
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>order ID</th>
                                                <th>name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
*/
    setTimeout(getdata4, 1000);
  }

  function sizing() {
     console.log($(".widgetChart5").css("width"));
     console.log($(".widgetChart5").css("height"));
    _height = _width  = $(".widgetChart5").css("width").replace("px", "");;

    $(".heatmap").css("width",  _width + 'px');
    $(".heatmap").css("height", _height + 'px');
     console.log($(".heatmap").css("width"));
     console.log($(".heatmap").css("height"));
  }

  function getdata5() {
    var url = "sensors/?width="+_width+"&height="+_height+"&type="+_type;
    console.log(url);
    $.getJSON(url, function(data) {
      console.log(data);
      heatmapInstance.configure({ radius: _radius, container: document.querySelector('.heatmap') });
      heatmapInstance.setData(data.heatmap);
      heatmapInstance.repaint();

      var text = '';
      text += '<table class="table table-top-countries">';
      text += '<tbody>';
      text += '<tr>';
      text += '    <td>Front|iMiddle|Rear</td>';
      text += '    <td>'+data.stat.pos.front+' | '+data.stat.pos.middle+' | '+data.stat.pos.rear+'</td>';
      text += '</tr>';
      text += '<tr>';
      text += '    <td>Australia</td>';
      text += '    <td class="text-right">$70,261.65</td>';
      text += '</tr>';
      text += '<tr>';
      text += '    <td>United Kingdom</td>';
      text += '    <td class="text-right">$46,399.22</td>';
      text += '</tr>';
      text += '<tr>';
      text += '    <td>Turkey</td>';
      text += '    <td class="text-right">$35,364.90</td>';
      text += '</tr>';
      text += '<tr>';
      text += '    <td>Germany</td>';
      text += '    <td class="text-right">$20,366.96</td>';
      text += '</tr>';
      text += '<tr>';
      text += '    <td>France</td>';
      text += '    <td class="text-right">$10,366.96</td>';
      text += '</tr>';
      text += '<tr>';
      text += '    <td>Australia</td>';
      text += '    <td class="text-right">$5,366.96</td>';
      text += '</tr>';
      text += '</tbody>';
      text += '</table>';
      
      console.log(text);
      document.getElementById("sensors").innerHTML = text;
    });
    setTimeout(getdata5, 1000);
  }

  getdata1();
  setTimeout(getdata1, 1000);

  getdata2();
  setTimeout(getdata2, 1000);

  getdata3();
  setTimeout(getdata3, 1000);

  getdata4();
  setTimeout(getdata4, 1000);


})(jQuery);

(function ($) {
    // USE STRICT
    "use strict";
    $(".animsition").animsition({
      inClass: 'fade-in',
      outClass: 'fade-out',
      inDuration: 900,
      outDuration: 900,
      linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])',
      loading: true,
      loadingParentElement: 'html',
      loadingClass: 'page-loader',
      loadingInner: '<div class="page-loader__spin"></div>',
      timeout: false,
      timeoutCountdown: 5000,
      onLoadEvent: true,
      browser: ['animation-duration', '-webkit-animation-duration'],
      overlay: false,
      overlayClass: 'animsition-overlay-slide',
      overlayParentElement: 'html',
      transition: function (url) {
        window.location.href = url;
      }
    });
  
  
  })(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Map
  try {

    var vmap = $('#vmap');
    if(vmap[0]) {
      vmap.vectorMap( {
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: [ '#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Europe Map
  try {
    
    var vmap1 = $('#vmap1');
    if(vmap1[0]) {
      vmap1.vectorMap( {
        map: 'europe_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // USA Map
  try {
    
    var vmap2 = $('#vmap2');

    if(vmap2[0]) {
      vmap2.vectorMap( {
        map: 'usa_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true,
        selectedColor: null,
        hoverColor: null,
        colors: {
            mo: '#001BFF',
            fl: '#001BFF',
            or: '#001BFF'
        },
        onRegionClick: function ( event, code, region ) {
            event.preventDefault();
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Germany Map
  try {
    
    var vmap3 = $('#vmap3');
    if(vmap3[0]) {
      vmap3.vectorMap( {
        map: 'germany_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();

            alert( message );
        }
      });
    }
    
  } catch (error) {
    console.log(error);
  }
  
  // France Map
  try {
    
    var vmap4 = $('#vmap4');
    if(vmap4[0]) {
      vmap4.vectorMap( {
        map: 'france_fr',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Russia Map
  try {
    var vmap5 = $('#vmap5');
    if(vmap5[0]) {
      vmap5.vectorMap( {
        map: 'russia_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        hoverOpacity: 0.7,
        selectedColor: '#999999',
        enableZoom: true,
        showTooltip: true,
        scaleColors: [ '#C8EEFF', '#006491' ],
        normalizeFunction: 'polynomial'
      });
    }


  } catch (error) {
    console.log(error);
  }
  
  // Brazil Map
  try {
    
    var vmap6 = $('#vmap6');
    if(vmap6[0]) {
      vmap6.vectorMap( {
        map: 'brazil_br',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
            alert( message );
        }
      });
    }

  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // Use Strict
  "use strict";
  try {
    var progressbarSimple = $('.js-progressbar-simple');
    progressbarSimple.each(function () {
      var that = $(this);
      var executed = false;
      $(window).on('load', function () {

        that.waypoint(function () {
          if (!executed) {
            executed = true;
            /*progress bar*/
            that.progressbar({
              update: function (current_percentage, $this) {
                $this.find('.js-value').html(current_percentage + '%');
              }
            });
          }
        }, {
            offset: 'bottom-in-view'
          });

      });
    });
  } catch (err) {
    console.log(err);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Scroll Bar
  try {
    var jscr1 = $('.js-scrollbar1');
    if(jscr1[0]) {
      const ps1 = new PerfectScrollbar('.js-scrollbar1');      
    }

    var jscr2 = $('.js-scrollbar2');
    if (jscr2[0]) {
      const ps2 = new PerfectScrollbar('.js-scrollbar2');

    }

  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Select 2
  try {

    $(".js-select2").each(function () {
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    });

  } catch (error) {
    console.log(error);
  }


})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Dropdown 
  try {
    var menu = $('.js-item-menu');
    var sub_menu_is_showed = -1;

    for (var i = 0; i < menu.length; i++) {
      $(menu[i]).on('click', function (e) {
        e.preventDefault();
        $('.js-right-sidebar').removeClass("show-sidebar");        
        if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = -1;
        }
        else {
          for (var i = 0; i < menu.length; i++) {
            $(menu[i]).removeClass("show-dropdown");
          }
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = jQuery.inArray(this, menu);
        }
      });
    }
    $(".js-item-menu, .js-dropdown").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
    });

  } catch (error) {
    console.log(error);
  }

  var wW = $(window).width();
    // Right Sidebar
    var right_sidebar = $('.js-right-sidebar');
    var sidebar_btn = $('.js-sidebar-btn');

    sidebar_btn.on('click', function (e) {
      e.preventDefault();
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
      right_sidebar.toggleClass("show-sidebar");
    });

    $(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      right_sidebar.removeClass("show-sidebar");

    });
 

  // Sublist Sidebar
  try {
    var arrow = $('.js-arrow');
    arrow.each(function () {
      var that = $(this);
      that.on('click', function (e) {
        e.preventDefault();
        that.find(".arrow").toggleClass("up");
        that.toggleClass("open");
        that.parent().find('.js-sub-list').slideToggle("250");
      });
    });

  } catch (error) {
    console.log(error);
  }


  try {
    // Hamburger Menu
    $('.hamburger').on('click', function () {
      $(this).toggleClass('is-active');
      $('.navbar-mobile').slideToggle('500');
    });
    $('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
      var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
      $(this).toggleClass('active');
      $(dropdown).slideToggle('500');
      return false;
    });
  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Load more
  try {
    var list_load = $('.js-list-load');
    if (list_load[0]) {
      list_load.each(function () {
        var that = $(this);
        that.find('.js-load-item').hide();
        var load_btn = that.find('.js-load-btn');
        load_btn.on('click', function (e) {
          $(this).text("Loading...").delay(1500).queue(function (next) {
            $(this).hide();
            that.find(".js-load-item").fadeToggle("slow", 'swing');
          });
          e.preventDefault();
        });
      })

    }
  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  try {
    
    $('[data-toggle="tooltip"]').tooltip();

  } catch (error) {
    console.log(error);
  }

  // Chatbox
  try {
    var inbox_wrap = $('.js-inbox');
    var message = $('.au-message__item');
    message.each(function(){
      var that = $(this);

      that.on('click', function(){
        $(this).parent().parent().parent().toggleClass('show-chat-box');
      });
    });
    

  } catch (error) {
    console.log(error);
  }

})(jQuery);
