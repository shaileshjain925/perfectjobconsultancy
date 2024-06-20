<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form method="POST" action=""  enctype="multipart/form-data">{% csrf_token %}
                    <div class="row">                    
                        <div class="form-group col-md-6">
                            <label for="txt_category">Category Name<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" placeholder="Category Name" class="form-control" id="txt_category" name="txt_category" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txt_category">Category Image<span class="text-danger">*</span></label>
                            <input type="file"   class="form-control" id="img" name="img" required>
                        </div>
                        <div class="col-md-6 mt-4">
                            <button type="submit"  id="btn_submit" class="btn text-white btn-submit" >
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-12">
                            
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
                        </div>
                    </div>
                </form>
            </div>
        </div> 
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Brand</h6>
        </div>      
        <div class="card-body">
            <table class="table table-head-light table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Category Name</th>
                        <th>Added Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{forloop.counter}}</th>
                        <td>
                            {{category.categoryName}}
                        </td>
                        <td>
                            {{category.created_date}}
                        </td>
                        <td>
                            <a href="" class="btn btn-edit btn-sm text-white" data-toggle="modal" data-target="#editCategory"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-delete btn-sm text-white" data-toggle="modal" data-target="#deleteCategory"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

 <!--  Edit Modal -->
 <div class="modal fade" id="editCategory{{category.category_title}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data"> {% csrf_token %}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="category">Category Name</label>
                            <input type="text" hidden value="{{category.category_title}}" name="oldCategory"> 
                            <input type="text" class="form-control" id="category" value="{{category.categoryName}}" name="editCategory"> 
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-edit">Update</button>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              </form>
        </div>
        
    </div>
    </div>
</div>

 <!--  delete Modal -->
 <div class="modal fade" id="deleteCategory{{category.category_title}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data"> {% csrf_token %}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group" >
                            <input type="text" name="delete" hidden value="{{category.category_title}}">
                            <p>Are you sure want to delete <strong>{{category.categoryName}}?</strong> </p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              </form>
        </div>
        <div class="modal-footer">
        
        </div>
    </div>
    </div>
</div>
