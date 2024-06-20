<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Orders List</h6>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Ordered Date</th>
                                <th>Price</th>
                                <th>Payment Type</th>
                                <th>Customer Name</th>
                                <th>Current Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                          {% for order in all_orders %}
                            <tr>
                                <td>
                                  {{forloop.counter}}
                                </td>
                                <td>
                                  {{order.order_id}}
                                </td>
                                <td>
                                  {{order.order_date|date:'d-m-Y'}}
                                </td>
                                <td>
                                  {{order.total_amount}}rs/-
                                </td>
                                <td>
                                    {{order.pyment_type}}
                                </td>
                                <td>
                                    {{order.userid}}
                                </td>
                                <td>
                                  {% if order_details.delivared_status%}
                                  Deliverd
                                  {% elif not order_details.deliverystatus %}
                                  Delivery Admin
                                  
                                  {% endif %}
                                </td>
                                

                                <td>
                                    <a href="" data-toggle="modal" data-target="#Shipping"><i class="fas fa-shipping-fast"></i></a>
                                    <a href="" data-toggle="modal" data-target="#Cancel" ><img src="{% static 'Images/cartcross.png' %}" width="20px"></a>
                                </td>


                                <td>
                                    <a class="btn btn-info text-white btn-sm">
                                        View
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


<!-- Modal Cancel-->
<div class="modal fade" id="Cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Cancellation {{order.order_id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{% url 'cancelOrder' order.order_id %}" method="POST">{% csrf_token %}
            <input type="text" hidden value="{{order.order_id}}" name="orderId">
            <div class="modal-body">
                <div class="form-group">
                    <label>Reason for cancellation </label>
                    <textarea class="form-control" rows="3" name="msg"></textarea>               
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Shipping-->
<div class="modal fade" id="Shipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{% url 'shipping-order' %}" method="POST">{% csrf_token %}
        <div class="modal-body">
            <input type="text" hidden value="{{order.order_id}}" name="orderID">
            <div class="form-group">
                <label>Docket Number </label>
                <input type="text" class="form-control" placeholder="Docket Number" name="docketNumber">                
            </div>
            <div class="form-group">
                <label>Docket Company Name </label>
                <input type="text" class="form-control" placeholder="Docket Number" name="companyName">                
            </div>
            
            <div class="form-group">
                <label>Accepted Delivery Date </label>
                <input type="date" class="form-control" placeholder="" name="deliveryDate">                
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>
