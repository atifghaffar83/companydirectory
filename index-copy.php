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
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
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