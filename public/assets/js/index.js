$(function() {
    "use strict";
	
	
		
		
	
	
	
	
	// chart 3
	 
	 var options = {
      chart: {
        height: 220,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          //startAngle: -240,
          //endAngle: 120,
           hollow: {
            margin: 0,
            size: '80%',
			//background: '#000',
            image: 'assets/images/icons/shopping-cart.svg',
		    imageWidth: 34,
		    imageHeight: 34,
			imageClipped: false
          },
          track: {
            background: '#a8f7ef',
            strokeWidth: '100%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: false,
              top: -3,
              left: 0,
              blur: 4,
              opacity: 0.35
            }
          },

          dataLabels: {
            showOn: 'always',
            name: {
              offsetY: -10,
              show: false,
              color: '#fff',
              fontSize: '17px'
            },
            value: {
              formatter: function(val) {
                return parseInt(val);
              },
              color: '#fff',
              fontSize: '36px',
              show: false,
            }
          }
        }
      },
      colors: ["#009688"],
      series: [75],
      stroke: {
        lineCap: 'butt'
      },
      labels: ['Percent'],

    }

    var chart = new ApexCharts(
      document.querySelector("#chart3"),
      options
    );

    chart.render(); 
	
	
	
	
	// chart 4
	 
	 var options = {
      chart: {
        height: 220,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          //startAngle: -240,
          //endAngle: 120,
           hollow: {
            margin: 0,
            size: '80%',
			//background: '#000',
            image: 'assets/images/icons/man-user.svg',
		    imageWidth: 34,
		    imageHeight: 34,
			imageClipped: false
          },
          track: {
            background: '#e7d9ff',
            strokeWidth: '100%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: false,
              top: -3,
              left: 0,
              blur: 4,
              opacity: 0.35
            }
          },

          dataLabels: {
            showOn: 'always',
            name: {
              offsetY: -10,
              show: false,
              color: '#fff',
              fontSize: '17px'
            },
            value: {
              formatter: function(val) {
                return parseInt(val);
              },
              color: '#fff',
              fontSize: '36px',
              show: false,
            }
          }
        }
      },
      colors: ["#673ab7"],
      series: [55],
      stroke: {
        lineCap: 'butt'
      },
      labels: ['Percent'],

    }

    var chart = new ApexCharts(
      document.querySelector("#chart4"),
      options
    );

    chart.render(); 
	
	
	
	// chart 5
	 
	 var options = {
      chart: {
        height: 220,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          //startAngle: -240,
          //endAngle: 120,
           hollow: {
            margin: 0,
            size: '80%',
			//background: '#000',
            image: 'assets/images/icons/eye.svg',
		    imageWidth: 34,
		    imageHeight: 34,
			imageClipped: false
          },
          track: {
            background: '#ffd2e2',
            strokeWidth: '100%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: false,
              top: -3,
              left: 0,
              blur: 4,
              opacity: 0.35
            }
          },

          dataLabels: {
            showOn: 'always',
            name: {
              offsetY: -10,
              show: false,
              color: '#fff',
              fontSize: '17px'
            },
            value: {
              formatter: function(val) {
                return parseInt(val);
              },
              color: '#fff',
              fontSize: '36px',
              show: false,
            }
          }
        }
      },
      colors: ["#e91e63"],
      series: [68],
      stroke: {
        lineCap: 'butt'
      },
      labels: ['Percent'],

    }

    var chart = new ApexCharts(
      document.querySelector("#chart5"),
      options
    );

    chart.render(); 
	
	
	
	// chart 6
	 
	 var options = {
      chart: {
        height: 220,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          //startAngle: -240,
          //endAngle: 120,
           hollow: {
            margin: 0,
            size: '80%',
			//background: '#000',
            image: 'assets/images/icons/influencer.svg',
		    imageWidth: 34,
		    imageHeight: 34,
			imageClipped: false
          },
          track: {
            background: '#fbe7ad',
            strokeWidth: '100%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: false,
              top: -3,
              left: 0,
              blur: 4,
              opacity: 0.35
            }
          },

          dataLabels: {
            showOn: 'always',
            name: {
              offsetY: -10,
              show: false,
              color: '#fff',
              fontSize: '17px'
            },
            value: {
              formatter: function(val) {
                return parseInt(val);
              },
              color: '#fff',
              fontSize: '36px',
              show: false,
            }
          }
        }
      },
      colors: ["#ffc107"],
      series: [85],
      stroke: {
        lineCap: 'butt'
      },
      labels: ['Percent'],

    }

    var chart = new ApexCharts(
      document.querySelector("#chart6"),
      options
    );

    chart.render(); 
	
	
	
	
	// chart 7
	
	var options1 = {
      chart: {
        type: 'area',
        height: 90,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
          enabled: false
      },
      fill: {
        type: 'gradient',
          gradient: {
              shade: 'light',
              //gradientToColors: [ '#8f50ff'],
              shadeIntensity: 1,
              type: 'vertical',
              opacityFrom: 0.8,
              opacityTo: 0.4,
              stops: [0, 100, 100, 100]
          },
      },
      colors: ["#3b5998"],
      series: [{
        name: 'Facebook Followers',
        data: [25, 66, 41, 59, 25, 44, 12, 36, 9, 21]
      }],
      stroke: {
              width: 2.5, 
              curve: 'smooth',
              dashArray: [0]
         },
      tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },

            }
    }

    new ApexCharts(document.querySelector("#chart7"), options1).render();
	
	
	
	
	// chart 8
	
	var options1 = {
      chart: {
        type: 'bar',
        height: 90,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
          enabled: false
      },
	  plotOptions: {
			bar: {
		columnWidth: '50%',
		  endingShape: 'rounded',
				dataLabels: {
					position: 'top', // top, center, bottom
				},
			}
		},
      fill: {
        type: 'gradient',
          gradient: {
              shade: 'light',
              //gradientToColors: [ '#8f50ff'],
              shadeIntensity: 1,
              type: 'vertical',
              opacityFrom: 0.8,
              opacityTo: 0.4,
              stops: [0, 100, 100, 100]
          }
      },
      colors: ["#55acee"],
      series: [{
        name: 'Twitter Followers',
        data: [25, 66, 41, 59, 25, 44, 12, 36, 9, 21]
      }],
      stroke: {
              width: 2.5, 
              curve: 'smooth',
              dashArray: [0]
         },
      tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },

            }
    }

    new ApexCharts(document.querySelector("#chart8"), options1).render();
	
	
	
	// chart 9
	
	var options1 = {
      chart: {
        type: 'line',
        height: 90,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
          enabled: false
      },
      colors: ["#e52d27"],
      series: [{
        name: 'Youtube Subscribers',
        data: [12, 14, 2, 47, 32, 44, 14, 55, 41, 69]
      }],
      stroke: {
              width: 2.5, 
              curve: 'smooth',
              dashArray: [0]
         },
      tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },

            }
    }

    new ApexCharts(document.querySelector("#chart9"), options1).render();
	
	
	
	// worl map

$(function(){
    
       $('#world-map').vectorMap({

       	backgroundColor: 'transparent',
       	borderColor: '#818181',
        borderOpacity: 0.25,
        regionStyle : {
	        initial : {
	          fill : '#becbd4'
	        }
	      },
      
        onRegionClick: function(event, code){
            code = code.toLowerCase();
            if(countries.indexOf(code) == -1)
                code = 'us';
            window.location = 'http://www.microstrategy.com/' + code;
        },
        series: {
            regions: [{
                values: {
                    IN:'#b659ff',
                    US:'#2ccc72',
                    RU:'#5a52db',
                    AU:'#f09c15'
                }
            }]
        }
     
    });
 
})
	
	
	
	
	
	
	});