    @extends('body.main')

    @section('dashboard')

      <!-- navbar-->

      <!-- Counts Section -->
      <section class="py-5">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6 gy-4 gy-xl-0">
              <div class="d-flex">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-primary mt-1 flex-shrink-0">
                  <use xlink:href="#user-1"> </use>
                </svg>
                <div class="ms-2">
                  <h3 class="h4 text-dark text-uppercase fw-normal">Total Clients</h3>
                  <p class="text-gray-500 small">Seler's & Buyer's</p>

                  <p class="display-6 mb-0">{{ $customer->count()}}</p>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6 gy-4 gy-xl-0">
              <div class="d-flex">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-primary mt-1 flex-shrink-0">
                  <use xlink:href="#survey-1"> </use>
                </svg>
                <div class="ms-2">
                  <h3 class="h4 text-dark text-uppercase fw-normal">Total Product's</h3>
                  <p class="text-gray-500 small">Available</p>
                  <p class="display-6 mb-0">{{$product->count()}}</p>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6 gy-4 gy-xl-0">
              <div class="d-flex">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-primary mt-1 flex-shrink-0">
                  <use xlink:href="#list-details-1"> </use>
                </svg>
                <div class="ms-2">
                  <h3 class="h4 text-dark text-uppercase fw-normal">Pending Deposit</h3>
                  <p class="text-gray-500 small">From Customers</p>
                  <p class="display-8 mb-0">{{$deposit->sum('balance')}}</p>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6 gy-4 gy-xl-0">
              <div class="d-flex">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-primary mt-1 flex-shrink-0">
                  <use xlink:href="#numbers-1"> </use>
                </svg>
                <div class="ms-2">
                  <h3 class="h4 text-dark text-uppercase fw-normal">Pending Withdraw  </h3>
                  <p class="text-gray-500 small">To Customer's</p>
                  <p class="display-8 mb-0">{{$withdraw->sum('balance')}}</p>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6 gy-4 gy-xl-0">
              <div class="d-flex">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-primary mt-1 flex-shrink-0">
                  <use xlink:href="#literature-1"> </use>
                </svg>
                <div class="ms-2">
                  <h3 class="h4 text-dark text-uppercase fw-normal">Profit/Loss</h3>
                  <p class="text-gray-500 small">Over All</p>
                  <p class="display-8 mb-0">{{$transaction}}</p>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6 gy-4 gy-xl-0">
              <div class="d-flex">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-primary mt-1 flex-shrink-0">
                  <use xlink:href="#paper-stack-1"> </use>
                </svg>
                <div class="ms-2">
                  <h3 class="h4 text-dark text-uppercase fw-normal">Expenses</h3>
                  <p class="text-gray-500 small">Over All</p>
                  <p class="display-8 mb-0">{{$expense}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Header Section-->






      <section class="bg-white py-5">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">







            <section class="py-5">
                <div class="container-fluid">
                  <div class="row align-items-stretch gy-4">
                      <!-- Income
                    <div class="col-lg-4">
                      <div class="card text-center h-100 mb-0">
                        <div class="card-body">
                          <svg class="svg-icon svg-icon-big svg-icon-light mb-4 text-muted">
                            <use xlink:href="#sales-up-1"> </use>
                          </svg>
                          <p class="text-gray-700 display-6">126,418</p>
                          <p class="text-primary h2 fw-bold">All Income</p>
                          <p class="text-xs text-gray-600 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                    </div>-->
                      <!-- Monthly Usage
                      <div class="card h-100 mb-0">
                        <div class="card-body">
                          <h2 class="h3 fw-normal mb-4">Monthly Usage</h2>
                          <div class="row align-items-center mb-3 gx-lg-5">
                            <div class="col-lg-6">
                              <table class="w-100">
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="position-relative mx-auto" style="max-width: 120px">
                                        <canvas class="mx-auto" id="monthlyProgress" width="150" height="150"></canvas>
                                        <p class="h3 text-primary fw-normal position-absolute top-50 start-50 translate-middle text-center m-0">80%</p>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-lg-6 border-start">
                              <p class="fw-bold h2 text-primary">80.56 Gb</p>
                              <p class="text-xs fw-light text-gray-500 mb-0">Current Plan</p>
                              <p class="text-gray-500">100 Gb Monthly</p>
                            </div>
                          </div>
                          <p class="text-xs text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        </div>
                      </div>
                    </div> -->
                    <!-- User Actibity
                    <div class="col-lg-4">
                      <div class="card h-100 mb-0">
                        <div class="card-body">
                          <h2 class="h3 fw-normal mb-4">User Activity</h2>
                          <p class="display-6">210</p>
                          <h3 class="h4 fw-normal">Social Users</h3>
                          <div class="progress rounded-0 mb-3">
                            <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="d-flex justify-content-between">
                            <div class="text-start">
                              <p class="h5 fw-normal mb-2">Pages Visits</p>
                              <p class="fw-bold text-xl text-primary mb-0">230</p>
                            </div>
                            <div class="text-end">
                              <p class="h5 fw-normal mb-2">New Visits</p>
                              <p class="fw-bold text-xl text-primary mb-0">73.4%</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                -->
                </div>
              </section>
              <!-- Updates Section -->
              <section class="mb-5">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-4 col-md-12">
                      <!-- Recent Updates Widget          -->

                      <!-- Recent Updates Widget End-->
                    </div>
                               <div class="col-lg-4 col-md-6">
                      <!-- Recent Activities Widget
                      <div class="card">
                        <div class="card-header border-bottom">
                          <h2 class="h5 fw-normal mb-0"><a class="card-collapse-link text-dark d-block" data-bs-toggle="collapse" href="#activities-box" aria-expanded="true">Recent Activities</a></h2>
                        </div>
                        <div class="card-body p-0">
                          <div class="collapse show" id="activities-box" role="tabpanel">
                            <div class="row g-0 border-bottom border-gray-200">
                              <div class="col-sm-4 col-3 text-end">
                                <ul class="list-inline mb-0">
                                  <li>
                                    <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                  </li>
                                  <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                  <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                                </ul>
                              </div>
                              <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                                <h5 class="fw-normal">Meeting</h5>
                                <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.         </p>
                              </div>
                            </div>
                            <div class="row g-0 border-bottom border-gray-200">
                              <div class="col-sm-4 col-3 text-end">
                                <ul class="list-inline mb-0">
                                  <li>
                                    <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                  </li>
                                  <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                  <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                                </ul>
                              </div>
                              <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                                <h5 class="fw-normal">Meeting</h5>
                                <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.         </p>
                              </div>
                            </div>
                            <div class="row g-0 border-bottom border-gray-200">
                              <div class="col-sm-4 col-3 text-end">
                                <ul class="list-inline mb-0">
                                  <li>
                                    <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                  </li>
                                  <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                  <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                                </ul>
                              </div>
                              <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                                <h5 class="fw-normal">Meeting</h5>
                                <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.         </p>
                              </div>
                            </div>
                            <div class="row g-0 border-bottom border-gray-200">
                              <div class="col-sm-4 col-3 text-end">
                                <ul class="list-inline mb-0">
                                  <li>
                                    <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                  </li>
                                  <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                  <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                                </ul>
                              </div>
                              <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                                <h5 class="fw-normal">Meeting</h5>
                                <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.         </p>
                              </div>
                            </div>
                            <div class="row g-0">
                              <div class="col-sm-4 col-3 text-end">
                                <ul class="list-inline mb-0">
                                  <li>
                                    <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                  </li>
                                  <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                  <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                                </ul>
                              </div>
                              <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                                <h5 class="fw-normal">Meeting</h5>
                                <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.         </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       -->
                    </div>
                  </div>
                </div>
              </section>





            <!-- To Do List
            <div class="col-lg-3 col-md-6">
              <div class="card shadow-0">
                <div class="card-body p-0">
                  <h2 class="h3 fw-normal">To do List</h2>
                  <p class="text-sm text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <form>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list1">
                      <label class="form-check-label text-sm" for="list1">Similique sunt in culpa qui officia</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list2">
                      <label class="form-check-label text-sm" for="list2">Ed ut perspiciatis unde omnis iste</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list3">
                      <label class="form-check-label text-sm" for="list3">At vero eos et accusamus et iusto </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list4">
                      <label class="form-check-label text-sm" for="list4">Explicabo Nemo ipsam voluptatem</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list5">
                      <label class="form-check-label text-sm" for="list5">Similique sunt in culpa qui officia</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list6">
                      <label class="form-check-label text-sm" for="list6">At vero eos et accusamus et iusto</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list7">
                      <label class="form-check-label text-sm" for="list7">Similique sunt in culpa qui officia</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="list8">
                      <label class="form-check-label text-sm" for="list8">Ed ut perspiciatis unde omnis iste</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        -->
            <!-- Pie Chart
            <div class="col-lg-3 col-md-6">
              <div class="card shadow-0">
                <h2 class="h3 fw-normal">Sale Prchase</h2>
                <p class="text-sm text-muted"> Grph</p>
                <div class="pie-chart">
                  <canvas id="pieChart" style="width: 300px; height: 300px; max-width: 100%"> </canvas>
                </div>
              </div>
            </div>
            -->
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12">
              <div class="card shadow-0">
                <h2 class="h3 fw-normal">Sales marketing report</h2>
                <p class="text-sm text-muted"></p>
                <canvas id="lineCahrt"></canvas>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Statistics Section-->

      <footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #222">
        <div class="container-fluid">
          <div class="row text-center gy-3">
            <div class="col-sm-6 text-sm-start">
              <p class="mb-0 text-sm text-gray-600">Lahore &copy; </p>
            </div>
            <div class="col-sm-6 text-sm-end">
              <p class="mb-0 text-sm text-gray-600">Design by <a href="Shahzaib " class="external">Shahzaib</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>


    @endsection
