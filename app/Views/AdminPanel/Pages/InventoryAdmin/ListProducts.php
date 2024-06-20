
<div class="container-fluid">    
    <div class="card shadow mb-4">
        
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                {{success_msg}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{error_msg}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Products</h6>
        </div> 

        <div class="card-body">
            <table class="table table-responsive table-head-light table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>     
                        <th>Date</th>
                        <th>Name</th>
                        <th>Brand, Type, Fabric, Pattern</th>
                        <th>GST%</th>
                        <th>Discount %</th>
                        <th>SP</th>
                        <th>In Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{forloop.counter}}</th>
                        <td>{{product.created_date}}</td>
                        <td>{{product.productName|slice:10}}...</td>
                        <td>
                            <span>{{product.category}}</span> |
                            <span>{{product.categoryType}}</span>
                            <span>{{product.fabric}}</span> |
                            <span>{{product.pattern}}</span>
                        </td>
                        <td>{{product.gstPercent}} %</td>
                        <td>{{product.discountPercent}} %</td>
                        <td>{{product.saleprice}}</td>
                        <td>{{product.qty}}</td>
                        <td>
                            <div class="row">
                                <a href="" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i></a>
                                <form action="{% url 'edit-product' product.product_title %}" method="POST" class="m-1">
                                    <button href="" class="btn btn-primary btn-sm text-white"><i class="fa fa-edit"></i></button>
                                </form>
                                <a href="" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteProduct{{product.id}}"><i class="fa fa-trash"></i></a>
                                
                            <div>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        <!-- End -->
    </div>
</div>


 <!--  Delete Modal -->
 <div class="modal fade" id="deleteProduct{{product.id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data"> {% csrf_token %}
                <div class="row">
                    <input type="hidden" name="productTitle" hidden value="{{product.id}}">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>Are you sure want to delete <strong>{{product.productName}} ?</strong></p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                {% comment %} <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> {% endcomment %}
              </form>
        </div>
        <div class="modal-footer">
        
        </div>
    </div>
    </div>
</div>