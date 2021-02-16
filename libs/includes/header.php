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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><i class="fas fa-address-book fa-lg"></i> Company Directory</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
         <li class="nav-item text-nowrap timenav">
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active allDept" href="#" id="dept">
                  <i class="far fa-building nav-i"></i>
                  Departments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link allLoc" href="#" id="loc">
                  <i class="fas fa-globe nav-i"></i>
                  Locations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link getalldata" href="#" id="pers">
                <i class="fas fa-user nav-i"></i>
                 Personnel
                </a>
              </li>
              
            </ul>
          </div>
        </nav>
