<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4 pb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enquiry List</h6>
                </div>
                <div class="card-body">
                    <table class="table table-head-light table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email ID</th>
                                <th>Mobile No.</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{forloop.counter}}</th>
                                    <td>
                                        {{enquery.date}}
                                    </td>
                                    <td>
                                       {{enquery.name}}
                                    </td>
                                    <td>
                                        {{enquery.email}}
                                    </td>
                                    <td>
                                        {{enquery.mobile}}
                                    </td>
                                    <td>
                                        {{enquery.msg}}
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" id="btn_delete" href="{% url 'delete-enquiry' enquery.id %}">
                                         <i  class="fas fa-trash"></i> Delete
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