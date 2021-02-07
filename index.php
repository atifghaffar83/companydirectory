<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Directory</title>
    <!-- all css links -->
    <!-- bootstrap css link -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="libs/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="libs/css/cloudflare.css" rel="stylesheet">
    <link href="libs/css/fontawesome.min.css" rel="stylesheet">
    <link href="libs/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="libs/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
    <!-- <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0"> -->
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><i class="fas fa-address-book fa-lg"></i> Company Directory</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <i class="far fa-building nav-i"></i>
                  Departments <!-- <span class="sr-only">(current)</span> -->
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-globe nav-i"></i>
                  Location
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fas fa-user nav-i"></i>
                 Personnel
                </a>
              </li>
              
            </ul>

<!--             <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  Year-end sale
                </a>
              </li>
            </ul> -->
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<!--         <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
            </div>
            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
            </div>
        </div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                This week
              </button>
            </div>
          </div>

          <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1522" height="642" style="display: block; height: 514px; width: 1218px;"></canvas>
 -->
          <h2>Personnel</h2>

          <hr class="hr">
          
          <div class="input-group">
            <div class="search input-wrapper">
              <input class="form-control" id="myInput" type="text" placeholder="Search by name" aria-label="Search" >
            </div>  
            <div class="">
<!-- ==================================================================================================== -->
            <!-- departments filter -->
            <dl class="dropdown"> 
    
                <dt>
                <a href="#" class="department">
                    <span class="hida dropdown-toggle"><i class="far fa-building nav-i"></i>Departments</span>
                </a>
                </dt>
                <dd>
                    <div class="mutliSelect">
                        <ul class="deptul">
                            <li><input type="checkbox" value="Accounts" /><span>Accounts</span></li>
                            <li><input type="checkbox" value="HR" /><span>HR</span></li>
                            <li><input type="checkbox" value="it" /><span>IT</span></li>
                            <li><input type="checkbox" value="Sales" /><span>Sales</span></li>
                            <li><input type="checkbox" value="Purchase" /><span>Purchase</span></li>
                            <li><input type="checkbox" value="Marketing" /><span>Marketing</span></li>
                            
                        </ul>
                    </div>
                </dd>

            </dl>
<!-- ==================================================================================================== -->
            <!-- location filter -->  
            <dl class="dropdown"> 
  
                <dt>
                <a href="#" class="location">
                    <span class="hida dropdown-toggle"><i class="fas fa-globe nav-i"></i></i>Locations</span>
                </a>
                </dt>
                <dd>
                    <div class="mutliSelect">
                        <ul class="locul">
                            <li><input type="checkbox" value="Glasgow" name="Glasgow" /><span>Glasgow</span></li>
                            <li><input type="checkbox" value="London" name="london" /><span>London</span></li>
                            <li><input type="checkbox" value="Manchester" name="manchester" /><span>Manchester</span></li>
                            <li><input type="checkbox" value="Paris" name="paris" /><span>Paris</span></li>
                            <li><input type="checkbox" value="New york"  name="new york"/><span>New York</span></li>
                            <li><input type="checkbox" value="Lahore"  name="lahore"/><span>Lahore</span></li>
                        </ul>
                    </div>
                </dd>

            </dl>  
        </div>
        <!-- Filter button -->
        <button class="btnfilter"><i class="fas fa-filter"></i> Filter </button>
    </div>
    <i class="far fa-times-circle fa-lg" data-toggle="tooltip" title="Clear Filters"></i>
    
<!-- Tables ==================================== -->
          <div class="table-responsive">
            <table id="myTable" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="jar">
                <tr class="content">
                  <td>1001</td>
                  <td>atif</td>
                  <td>IT</td>
                  <td>glasgow</td>
                  <td>sit</td>
                </tr>
                <tr class="content">
                  <td>1002</td>
                  <td>Allan</td>
                  <td>HR</td>
                  <td>london</td>
                  <td>elit</td>
                </tr>
                <tr class="content">
                  <td>1003</td>
                  <td>Iron man</td>
                  <td>sales</td>
                  <td>paris</td>
                  <td>Praesent</td>
                </tr>
                <tr class="content">
                  <td>1004</td>
                  <td>jhon</td>
                  <td>marketing</td>
                  <td>new york</td>
                  <td>nisi</td>
                </tr>
                <tr class="content">
                  <td>1005</td>
                  <td>charlie</td>
                  <td>it</td>
                  <td>lahore</td>
                  <td>at</td>
                </tr>
                <tr class="content">
                  <td>1006</td>
                  <td>paddy</td>
                  <td>it</td>
                  <td>london</td>
                  <td>Duis</td>
                </tr>
                <tr class="content">
                  <td>1007</td>
                  <td>atif</td>
                  <td>IT</td>
                  <td>london</td>
                  <td>sit</td>
                </tr>
                <tr class="content">
                  <td>1008</td>
                  <td>atif</td>
                  <td>HR</td>
                  <td>glasgow</td>
                  <td>sit</td>
                </tr>
                <tr class="content">
                  <td>1009</td>
                  <td>Harry</td>
                  <td>sales</td>
                  <td>lahore</td>
                  <td>mauris</td>
                </tr>
                
              </tbody>
            </table>
          </div>

            <nav>
                <ul class="pagination justify-content-center pagination-sm">
                    
                </ul>
            </nav>

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
        <script src="libs/js/jquery-3.5.1.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
        <script src="libs/js/popper.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
        <script src="libs/js/bootstrap.min.js"></script>
        <!-- fontawesome js files -->
        <!-- <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->
        <script src="libs/js/all.js"></script>
        <!-- <script src="https://kit.fontawesome.com/9de24c6344.js" crossorigin="anonymous"></script> -->
        <script src="libs/js/9de24c6344.js"></script>
        <!-- Custom js file -->
        <script src="libs/js/app.js"></script>
</body>
</html>