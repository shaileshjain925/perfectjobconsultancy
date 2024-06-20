<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Color</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form method="POST" action="">
                    <div class="row">                    
                        <div class="form-group col-md-6">
                            <label for="txt_color">Color Name<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" placeholder="Color Name" class="form-control" id="txt_color" name="txt_color" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txt_code">Color Code<span class="text-danger">*</span></label>
                            <input type="color" placeholder="Brand Name" class="form-control" id="txt_code" name="txt_code" required>
                        </div>
                        <div class="col-md-6 mt-4">
                            <button type="submit"  id="btn_submit" class="btn btn-primary">
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
            <h6 class="m-0 font-weight-bold text-primary">View Colors</h6>
        </div>      
        <div class="card-body">
            <table class="table table-head-light table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{forloop.counter}}</th>
                        <td>
                            {{color.colorName}}
                        </td>
                        <td>
                            {{color.color_title}}
                            <span ><div style="background-color: #ff0000; width:10px; height:10px" ></div></span>
                        </td>
                        <td>
                            {{color.created_date}}
                        </td>
                        <td>
                            <a href="" class="btn btn-edit btn-primary btn-sm text-white" data-toggle="modal" data-target="#editColor"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-delete btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteColor"><i class="fa fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

 <!--  Edit Modal -->
 <div class="modal fade" id="editColor" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data"> 
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" hidden value="{{color.color_title}}" name="edit"> 
                        <div class="form-group">
                            <label for="color">Color Name</label>
                            <input type="text" class="form-control" id="color" value="{{color.colorName}}" name="colorName"> 
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="color">Color Code</label>
                            <input type="color" class="form-control" id="color" value="#{{color.color_title}}" name="colorcode"> 
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

 <!--  Delete Modal -->
 <div class="modal fade" id="deleteColor{{color.color_title}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST"  enctype="multipart/form-data"> 
                <div class="row">
                    <input type="text" name="delete" hidden value="{{color.color_title}}">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>Are you sure want to delete <strong>{{color.colorName}}</strong></p>
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