<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Charts</title>

        <!-- Fonts -->
        <!--link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">

        <style>
            .row { margin:2% auto; padding:2% 0; }
        </style>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>


    </head>
    <body>
        <div class="container">
            <!--div class="content"-->
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-right">
                        <a href="{{ url('stock/add') }}">
                            <button class="btn btn-lg btn-primary"> <i class="glyphicon glyphicon-plus-sign"></i> Add a Stock</button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Vuejs Experiments</div>
                        <div class="panel-body">
                            



                            <!-- Vuejs CDN -->
                            <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

                            <!-- 1 main html -->
                            <div id="app-2">
                                <ol>
                                    <todo-item v-for="item in items" :todo="item" :key="item.id"></todo-item>
                                </ol>
                            </div>    
                            
                            <!-- 2 Vuejs component definition-->
                            <script>
                                Vue.component('todo-item', {
                                    props: ['todo'],
                                    template: '<li>@{{ todo.text }}</li>'
                                })
                            </script>

                            <!-- 3 Vue instance -->
                            <script>
                                var app = new Vue({
                                    el: '#app-2',
                                    data: {
                                        items: [
                                            { id:0, text: 'AAAAAAAAAA' },
                                            { id:1, text: 'BBBBBBBBBB' },
                                            { id:2, text: 'CCCCCCCCCC' }
                                        ]
                                    }
                                })

                            </script>








                        </div>
                    </div>
                </div>


                <style>
                  #bootstrap-test.row > div { min-height: 100px; border:1px solid red; text-align: center;}
                </style>
                <div class="row">
                  <h1 class="text-center">Bootstrap4 tests</h1>
                </div>
                <div id="bootstrap-test" class="row">
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1 height">a</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">b</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">c</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">d</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">e</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">f</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">g</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">h</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">i</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">l</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">m</div>
                  <div class="col-sm-6 col-md-4 col-lg-2 col-xl-1">n</div>
                </div>
                <div class="row">
                  <h4>Progress bar</h4>
                  <div class="progress" style="height: 20px;">
                    <div id="dynamic" class="progress-bar progress-bar-striped active" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <script>
                  $(function() {
                      var current_progress = 0;
                      var interval = setInterval(function() {
                          current_progress += 1;
                          $("#dynamic")
                          .css("width", current_progress + "%")
                          .attr("aria-valuenow", current_progress)
                          .text(current_progress + "% Complete");
                          if (current_progress > 105) {
                              // clearInterval(interval);
                              current_progress = 0;
                          }
                      }, 100);
                    });
                </script>    







                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                           <div class="panel-heading"><b>Charts</b></div>
                           <div class="panel-body">
                               <canvas id="canvas" height="280" width="600"></canvas>
                           </div>
                       </div>
                    </div>
                </div>
            <!--/div-->
        </div>

        
        
        
        <script>

            var url = "{{url('stock/chart')}}";
            var Years = new Array();
            var Labels = new Array();
            var Prices = new Array();

            $(document).ready(function(){
              $.get(url, function(response){

                // console.log(response);
                
                response.forEach(function(data){
                    Years.push(data.stockYear);
                    Labels.push(data.stockName);
                    Prices.push(data.stockPrice);
                });
                var ctx = document.getElementById("canvas").getContext('2d');
                    var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels:Years,
                          datasets: [{
                              label: 'Infosys Price',
                              data: Prices,
                              borderWidth: 1
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  }
                              }]
                          }
                      }
                  });
              });
            });
        </script>
    </body>
</html>