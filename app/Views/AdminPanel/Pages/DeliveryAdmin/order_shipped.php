
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Shipped Orders List</h6>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Docket Number</th>
                                <th>Company Name</th>
                                <th>Expected Delivery Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>{{forloop.counter}}</td>
                              <td>{{order.order_id.order_id}}</td>
                              <td>{{order.docketNumber}}</td>
                              <td>
                                {{order.companyName}}
                              </td>
                              <td>                                    
                                  {{order.expected_date}}
                              </td>
                              
                              <td>
                                  <a class="btn btn-info text-white btn-sm" href="{% url 'deliveredOrder'  order.order_id.order_id%}">
                                      Delivered
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


<!-- Modal Deliverd-->
<div class="modal fade" id="Deliverd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <label>Enter Person Name </label>
                <input type="text" class="form-control" placeholder="Docket Number">                
            </div>
            <div class="form-group">
                <label>Mobile Number </label>
                <input type="text" class="form-control" placeholder="Docket Number">                
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
</div>


<!-- Modal Cancel-->
<div class="modal fade" id="Cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Cancellation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <label>Reason for cancellation </label>
                <textarea class="form-control" rows="3"></textarea>               
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
</div>
