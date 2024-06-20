<div class="container-fluid">
    <div class="card shadow mb-4 pb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Deal Of the Day</h6>
        </div>
        <div class="alert alert-danger" role="alert">
            Error
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="txt_category">Select Category<span class="text-danger">*</span></label>
                    <input type="text" list="ddl_category" data-filter="category" placeholder="Select Category" autocomplete="off" onchange="fetchCategoryType(this)" name="txt_category" class="form-control filter-dropdown" id="txt_category" required>
                    <datalist id="ddl_category" >
                        <option data-value="{{category.category_title}}"  value="{{category.categoryName}}">One</option>
                        <option data-value="{{category.category_title}}"  value="{{category.categoryName}}">Jeans</option>
                        <option data-value="{{category.category_title}}"  value="{{category.categoryName}}">T-shirt</option>
                        <option data-value="{{category.category_title}}"  value="{{category.categoryName}}">Suit</option>
                        <option data-value="{{category.category_title}}"  value="{{category.categoryName}}">Paint</option>
                        <option data-value="{{category.category_title}}"  value="{{category.categoryName}}">Jacket</option>
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
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#dealoftheday">
                                Add
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            

            <!-- Add product list deal of the day -->
            <table id="dataTable" class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actual</th>
                        <th>Selling</th>                            
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="filterproduct">
                    <tr>
                        <td>{{forloop.counter}}</td>
                        <td>
                            {{product.product.productName}}
                        </td>
                        <td>
                            {{product.from_date}}
                        </td>
                        <td>
                            {{product.to_date}}
                        </td>
                        <td>
                            {{product.product.actualPrice}}
                        </td>
                        <td>
                            {{product.product.saleprice}}
                        </td>
                        <td>
                            <a href="{% url 'removeDealOfTheDay' product.id %}" class="btn btn-danger btn-sm">
                                Remove
                            </a>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- add Modal  -->
 <!--  Edit Modal -->
 <div class="modal fade" id="dealoftheday" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Deal of the Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" hidden value="{{product.product_title}}" name="productTitle"> 
                        <div class="form-group">
                            <label for="discount">Discount Percent</label>
                            <input type="text" class="form-control" id="discount"  name="discountpercent" required> 
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="fromdate">From Date</label>
                            <input type="datetime-local" class="form-control" id="fromdate" name="fromdate" required> 
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="todate">To Date</label>
                            <input type="datetime-local" class="form-control" id="todate" name="todate" required> 
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-edit">Add</button>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              </form>
        </div>
        
    </div>
    </div>
</div>