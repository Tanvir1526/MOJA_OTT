const Mainbody = () => {
    return (
        <div>
  <div className="main-panel">
    <div className="content-wrapper">
      <div className="row">
        <div className="col-md-12 grid-margin">
          <div className="d-flex justify-content-between align-items-center">
            <div>
              <h4 className="font-weight-bold mb-0">Admin Dashboard</h4>
            </div>
          </div>
        </div>
      </div>
      <div className="row">
      <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Totol User</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">50</h3>
                                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Premium User</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">43</h3>
                                    <i class=" ti-crown icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Admin</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">4</h3>
                                    <i class=" ti-crown icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Production House</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">7</h3>
                                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Total Content</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">26</h3>
                                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
               

      </div>
      <div className="row">
        <div className="col-md-6 grid-margin stretch-card">
          <div className="card">
            <div className="card-body">
              <p className="card-title">User</p>
              <p className="text-muted font-weight-light"></p>
              <div id="sales-legend" className="chartjs-legend mt-4 mb-2" />
              <canvas id="sales-chart" />
            </div>
            <div className="card border-right-0 border-left-0 border-bottom-0">
              <div className="d-flex justify-content-center justify-content-md-end">
                <div className="dropdown flex-md-grow-1 flex-xl-grow-0">
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div className="col-md-6 grid-margin stretch-card">
          <div className="card border-bottom-0">
            <div className="card-body pb-0">
              <p className="card-title">Content</p>
              <div className="d-flex flex-wrap mb-5">
                <div className="me-5 mt-3">
                  <p className="text-muted">Content</p>
                  <h3>12</h3>
                </div>
                <div className="me-5 mt-3">
                  <p className="text-muted">Users</p>
                  <h3>17</h3>
                </div>
                <div className="me-5 mt-3">
                  <p className="text-muted">Rating</p>
                  <h3>14</h3>
                </div>
                <div className="mt-3">
                  <p className="text-muted">Report</p>
                  <h3>5</h3>
                </div> 
              </div>
            </div>
            <canvas id="order-chart" className="w-100" />
          </div>
        </div>
      </div>
      <div className="row">
        <div className="col-md-7 grid-margin stretch-card">
          <div className="card">
            <div className="card-body">
              <p className="card-title mb-0">Top Products</p>
              <div className="table-responsive">
                <table className="table table-hover">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Product</th>
                      <th>Sale</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Jacob</td>
                      <td>Photoshop</td>
                      <td className="text-danger"> 28.76% <i className="ti-arrow-down" /></td>
                      <td><label className="badge badge-danger">Pending</label></td>
                    </tr>
                    <tr>
                      <td>Messsy</td>
                      <td>Flash</td>
                      <td className="text-danger"> 21.06% <i className="ti-arrow-down" /></td>
                      <td><label className="badge badge-warning">In progress</label></td>
                    </tr>
                    <tr>
                      <td>John</td>
                      <td>Premier</td>
                      <td className="text-danger"> 35.00% <i className="ti-arrow-down" /></td>
                      <td><label className="badge badge-info">Fixed</label></td>
                    </tr>
                    <tr>
                      <td>Peter</td>
                      <td>After effects</td>
                      <td className="text-success"> 82.00% <i className="ti-arrow-up" /></td>
                      <td><label className="badge badge-success">Completed</label></td>
                    </tr>
                    <tr>
                      <td>Dave</td>
                      <td>53275535</td>
                      <td className="text-success"> 98.05% <i className="ti-arrow-up" /></td>
                      <td><label className="badge badge-warning">In progress</label></td>
                    </tr>
                    <tr>
                      <td>Messsy</td>
                      <td>Flash</td>
                      <td className="text-danger"> 21.06% <i className="ti-arrow-down" /></td>
                      <td><label className="badge badge-info">Fixed</label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div className="col-md-5 grid-margin stretch-card">
          <div className="card">
            <div className="card-body">
              <h4 className="card-title">To Do Lists</h4>
              <div className="list-wrapper pt-2">
                <ul className="d-flex flex-column-reverse todo-list todo-list-custom">
                  <li>
                    <div className="form-check form-check-flat">
                      <label className="form-check-label">
                        <input className="checkbox" type="checkbox" />
                        Become A Travel Pro In One Easy Lesson
                      </label>
                    </div>
                    <i className="remove ti-trash" />
                  </li>
                  <li className="completed">
                    <div className="form-check form-check-flat">
                      <label className="form-check-label">
                        <input className="checkbox" type="checkbox" defaultChecked />
                        See The Unmatched Beauty Of The Great Lakes
                      </label>
                    </div>
                    <i className="remove ti-trash" />
                  </li>
                  <li>
                    <div className="form-check form-check-flat">
                      <label className="form-check-label">
                        <input className="checkbox" type="checkbox" />
                        Copper Canyon
                      </label>
                    </div>
                    <i className="remove ti-trash" />
                  </li>
                  <li className="completed">
                    <div className="form-check form-check-flat">
                      <label className="form-check-label">
                        <input className="checkbox" type="checkbox" defaultChecked />
                        Top Things To See During A Holiday In Hong Kong
                      </label>
                    </div>
                    <i className="remove ti-trash" />
                  </li>
                  <li>
                    <div className="form-check form-check-flat">
                      <label className="form-check-label">
                        <input className="checkbox" type="checkbox" />
                        Travelagent India
                      </label>
                    </div>
                    <i className="remove ti-trash" />
                  </li>
                </ul>
              </div>
              <div className="add-items d-flex mb-0 mt-4">
                <input type="text" className="form-control todo-list-input me-2" placeholder="Add new task" />
                <button className="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i className="ti-location-arrow" /></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    );
    }
export default Mainbody;