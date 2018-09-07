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
    </head>
    <body>
        <div class="container">
            <div class="content">
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
                            



                            <!-- Vuejs -->
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
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

        
        
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