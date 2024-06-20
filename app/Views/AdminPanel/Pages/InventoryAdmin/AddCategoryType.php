<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Category Type</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="" method="POST"> 
                    <div class="row"> 
                        <div class="form-group col-md-6">
                            <label for="txt_category">Select Category<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="on" list="category" placeholder="Select Category" name="txt_categoryName" class="form-control" id="txt_category" required>
                            <datalist id="category">
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> Category</option>
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> Jeans</option>
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> Paint</option>
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> Mobile</option>
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> Kit</option>
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> Category</option>
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> Category</option>
                            </datalist>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txt_categorytype">Category Type Name<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" name="txt_categorytypeName" placeholder="Category Type Name" class="form-control" id="txt_categorytype" required>
                        </div>
                        <div class="col-md-6  mt-4">
                            <button type="submit"  id="btn_submit" class="btn text-white btn-submit" >
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="alert alert-success alert-dismissible fade show " role="alert">
                                success msg
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Faild msg
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
            <h6 class="m-0 font-weight-bold text-primary">View Category Types</h6>
        </div>      
        <div class="card-body">
            <table class="table table-head-light table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Category Type</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{forloop.counter}}</th>
                        <td>
                            {{categoryType.categoryType_name}}
                        </td>
                        <td>
                            {{categoryType.category_title}}
                        </td>
                        <td>
                            {{categoryType.created_date}}
                        </td>
                        <td>
                            <a href="" class="btn btn-edit btn-primary btn-sm text-white" data-toggle="modal" data-target="#editCategory{{categoryType.categoryType_title}}"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-delete btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteType{{categoryType.categoryType_title}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


 <!--  Edit Modal -->
 <div class="modal fade" id="editCategory{{categoryType.categoryType_title}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Category Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data"> {% csrf_token %}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" value="{{categoryType.categoryType_title}}" name="oldCategoryType">
                            <label for="txt_category">Select Category<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" value="{{categoryType.category_title}}" list="category" name="editcategoryName" class="form-control" id="txt_category" required>
                            <datalist id="category">
                                
                                <option data-value="{{category.category_title}}" value="{{category.categoryName}}"> </option>
                            
                            </datalist>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="txt_type">Category Type Name<span class="text-danger">*</span></label>
                            <input type="text" name="txt_typeName" value="{{categoryType.categoryType_name}}" class="form-control" id="txt_type" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-edit">Update</button>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              </form>
        </div>
        <div class="modal-footer">
        
        </div>
    </div>
    </div>
</div>

 <!--  delete Modal -->
 <div class="modal fade" id="deleteType{{categoryType.categoryType_title}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Category Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data"> {% csrf_token %}
                <div class="row">
                    <input type="text" name="delete" hidden value="{{categoryType.categoryType_title}}">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>Are you sure want to delete <strong>{{categoryType.categoryType_name}}</strong></p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete </button>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              </form>
        </div>
        <div class="modal-footer">
        
        </div>
    </div>
    </div>
</div>