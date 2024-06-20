<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Generate Bill</h6>
                </div>
                <div class="card-body">
                    <h5 class="text-info">Customer Details</h5>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="AltName">Customer Name<span class="text-danger">*</span></label>
                            <input type="text" name="title" placeholder="" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="AltName">GSTN</label>
                            <input type="number" name="title" placeholder="" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="AltName">Mobile Number<span class="text-danger">*</span></label>
                            <input type="number" name="title" placeholder="" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="State">State</label>
                                <input type="text" name="title" placeholder="" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="number" name="title" placeholder="Pin Code" class="form-control">
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Address">Address <span class="text-danger">*</span></label>
                                <textarea  placeholder="" rows="3" class="form-control">
                                </textarea>
                            </div>
                        </div> 
                    </div>  
                    <hr>
                    
                    <h5 class="text-info">Select Prodcuts</h5>
                    <!-- Select Product -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="txt_category">Select Category<span class="text-danger">*</span></label>
                            <input type="text" list="ddl_category" data-filter="category" placeholder="Select Category" autocomplete="off" onchange="fetchCategoryType(this)" name="txt_category" class="form-control filter-dropdown" id="txt_category" required>
                            <datalist id="ddl_category" >
                                {% for  category in all_category %}
                                <option data-value="{{category.category_title}}"  value="{{category.categoryName}}"></option>
                                {% endfor %}
                            </datalist>
                        </div>
                        <!-- End -->
                        <!-- Select Category Type -->
                        <div class="form-group col-md-4">
                            <label for="categoryType">Select Category Type<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" data-filter="categoryType" onchange="fetchFabric()" list="ddl_categoryType" placeholder="Select Category Type" name="categoryType" class="form-control filter-dropdown" id="categoryType" required>
                            <datalist  id="ddl_categoryType" required>
                            </datalist>
                        </div>
                        <!-- End -->
                        <!-- Select Fabric -->
                        <div class="form-group col-md-4">
                            <label for="fabric">Select Fabric<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" data-filter="fabric" list="ddl_fabric" placeholder="Select Fabric" name="fabric" class="form-control filter-dropdown" id="fabric" required>
                            <datalist id="ddl_fabric">
                                
                            </datalist>
                        </div>
                        <!-- End -->
                        <!-- Select Pattern -->
                        <div class="form-group col-md-4">
                            <label for="category">Select Pattern<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" data-filter="pattern" list="ddl_pattern" placeholder="Select Pattern" name="pattern" class="form-control filter-dropdown" id="pattern" required>
                            <datalist  id="ddl_pattern" >
                                
                            </datalist>
                        </div>
                        <!-- End -->
                        
                    </div>    
                    
        
                    <table id="dataTable" class="table table-responsive-xl table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Selling Price</th>                            
                                <th>Action</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="filterproduct">
                            <tr>
                                <td>{{forloop.counter}}</td>
                                <td>
                                    {{product.productName}}
                                </td>
                                <td>
                                    {{product.productprice}}
                                </td>
                                <td>
                                    {{product.saleprice}}
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="">
                                        Add
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
