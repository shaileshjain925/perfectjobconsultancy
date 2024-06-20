<!-- Begin Page Content -->
<div class="container-fluid ">
    <!-- Page Heading -->
    <div class="row card shadow pb-4">
        <div class="col-sm-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class=" col-md-6 ">
                    <a href="ViewProducts" class="card border-left-info shadow  py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{productCount}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row mt-4 card shadow ">
        {% comment %} <div class="col-sm-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
        </div> {% endcomment %}
        <div class="row mt-3 ">
            <div class="col-md-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <table class="table table-head-light table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for product in product_by_category_lst %}
                        <tr>
                            <th scope="row">{{product.0}}</th>
                            <td>{{product.1}}</td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Type</h6>
                </div>
                <table class="table table-head-light table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Category Type</th>
                            <th>Product Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for product in product_by_category_type_lst %}
                        <tr>
                            <th scope="row">{{product.0}}</th>
                            <td>{{product.1}}</td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Fabric</h6>
                </div>
                <table class="table table-head-light table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Fabric</th>
                            <th>Product Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for product in product_by_fabric_lst %}
                        <tr>
                            <th scope="row">{{product.0}}</th>
                            <td>{{product.1}}</td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pattern</h6>
                </div>
                <table class="table table-head-light table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Pattern</th>
                            <th>Product Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for product in product_by_pattern_lst %}
                        <tr>
                            <th scope="row">{{product.0}}</th>
                            <td>{{product.1}}</td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
    <!-- Content Row -->
    <div class="row mt-3" >
        <div class="col-md-6 ">
            <div class="card mb-3 shadow" >
                <div class="card-header" style="background-color: #bc5090; color: #fff;">
                    <h5 class="card-title" >Category</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartCategory" style="height: 370px; width: 100%;"></canvas>
                    <!-- <div id="chartCategory" style="height: 370px; width: 100%;"></div> -->
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card mb-3 shadow" >
                <div class="card-header" style="background-color: #003f5c; color: #fff;">
                    <h5 class="card-title" >Category Type</h5>
                    
                </div>
                <div class="card-body">
                    <canvas id="chartCategoryType" style="height: 370px; width: 100%;"></canvas>
                    <!-- <div id="chartCategoryType" style="height: 370px; width: 100%;"></div> -->
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card mb-3 shadow" >
                <div class="card-header" style="background-color: #F47A1F; color: #fff;">
                    <h5 class="card-title" >Fabric</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartfabric" style="height: 370px; width: 100%; "></canvas>
                    <!-- <div id="chartfabric" style="height: 370px; width: 100%;"></div> -->
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card mb-3 shadow" >
                <div class="card-header" style="background-color: #00a65a; color: #fff;">
                    <h5 class="card-title" >Pattern</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartPattern" style="height: 370px; width: 100%;"></canvas>
                    <!-- <div id="chartPattern" style="height: 370px; width: 100%;"></div> -->
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        window.onload = function () {
            
            var chartCategory = document.getElementById('chartCategory').getContext('2d');
            var chart = new Chart(chartCategory, {
                type: 'pie',
                data: {
                    labels: categoryTypeData,
                    datasets: [{
                        backgroundColor: 'rgb(255, 99, 132)',
                        backgroundColor : ['#bc5090','#ff6361','#ffa600','#f56954', '#f39c12', '#00a65a', '#00c0ef', '#3c8dbc', '#d2d6de'],
                        data: 50
                    }]
                },
                options: {}
            });
            
            var chartCategoryType = document.getElementById('chartCategoryType').getContext('2d');
            var chart1 = new Chart(chartCategoryType, {
                type: 'pie',
                data: {
                    labels: categoryTypeData,
                    datasets: [{
                        backgroundColor: 'rgb(255, 99, 132)',
                        backgroundColor : ['#003f5c','#58508d','#bc5090','#ff6361','#ffa600','#f56954', '#f39c12', '#00a65a', '#00c0ef', '#3c8dbc', '#d2d6de'],
                        data: 100
                    }]
                },
                options: {}
            });
            var chartfabric = document.getElementById('chartfabric').getContext('2d');
            var chart2 = new Chart(chartfabric, {
                type: 'pie',
                data: {
                    labels: fabricData,
                    datasets: [{
                        backgroundColor: 'rgb(255, 99, 132)',
                        backgroundColor : ['#F47A1F', '#3c8dbc', '#d2d6de','#f56954', '#f39c12', '#00a65a', '#00c0ef','#87A96B','#FF9966','#6D351A','#3D2B1F','#E32636','#CD7F32','#964B00','#007BA7'],
                        data: 80
                    }]
                },
                options: {}
            });
            var chartPattern = document.getElementById('chartPattern').getContext('2d');
            var chart4 = new Chart(chartPattern, {
                type: 'pie',
                data: {
                    labels: patternData,
                    datasets: [{
                        backgroundColor: 'rgb(255, 99, 132)',
                        backgroundColor : [ '#87A96B','#FF9966','#6D351A','#3D2B1F','#E32636','#FBCEB1','#F0F8FF','#5D8AA8','#00a65a', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#f39c12','#000000','#318CE7','#0000FF','#004225','#CD7F32','#964B00','#007BA7'],
                        data: 120
                    }]
                },
                options: {}
            });
        }
        </script>
</div>
<!-- End of Content Wrapper -->