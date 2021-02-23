<?php
include "libs/includes/header.php";
?>

    <main id="main-section" role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <header class="headermain">
    <!-- Delete Alert -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      Record Deleted successfully.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!-- Create Alert -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Record Created successfully.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!-- ================= -->
    
    <h2 class="pageTitle"></h2>
          <button class="new datatarget" data-toggle="modal" data-target="#modal5"><i class="fas fa-plus-circle"></i>New</button>
          <button class="newicon datatarget" data-toggle="modal" data-target="#modal5"><i class="fas fa-plus-circle fa-5x"></i></button>
            <hr class="hr">
            
            <div class="input-group">
              <div class="search input-wrapper">
                <input class="form-control" id="myInput" type="text" placeholder="Search by name" aria-label="Search" >
              </div>  
              <div class="ddalign">
  <!-- ==================================================================================================== -->
              <!-- departments filter -->
              <dl class="dropdown flexgrow deptdl"> 
      
                  <dt>
                  <a href="#" class="department">
                      <span class="hida dropdown-toggle"><i class="far fa-building nav-i"></i>Departments</span>
                  </a>
                  </dt>
                  <dd>
                      <div class="mutliSelect dddepul">
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
              <dl class="dropdown flexgrow locdl"> 
    
                  <dt>
                  <a href="#" class="location">
                      <span class="hida dropdown-toggle"><i class="fas fa-globe nav-i"></i></i>Locations</span>
                  </a>
                  </dt>
                  <dd>
                      <div class="mutliSelect ddlocul">
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
              <button class="btnfilter flexgrow"><i class="fas fa-filter"></i> Filter <i class="far fa-times-circle fa-2x" data-toggle="tooltip" title="Clear Filters"></i></button>
              <!-- <i class="far fa-times-circle fa-lg" data-toggle="tooltip" title="Clear Filters"></i> -->
          </div>
          <!-- Filter button -->
          <!-- <button class="btnfilter"><i class="fas fa-filter"></i> Filter </button> -->
      </div>
      <!-- <i class="far fa-times-circle fa-lg" data-toggle="tooltip" title="Clear Filters"></i> -->

</header>
    <!-- Tables ==================================== -->
            <div class="table-div">
              No data Available
            </div>

              <!-- <nav>
                  <ul class="pagination justify-content-center pagination-sm">
                      
                  </ul>
              </nav> -->

    </main>

<!-- landing page ====================================================-->
<!-- <div id="card" class="card text-center">
  
  <div class="card-body" data-id="nav-dept">
      <a href="#" data-id="nav-dept"><span>    <i class="far fa-building fa-10x"></i></span></a>
    <h5 class="card-title" data-id="nav-dept">Departments</h5>
    
  </div>
  <div class="card-body" data-id="nav-loc">
  <a href="#"><span>    <i class="fas fa-globe fa-10x"></i></span></a>
    <h5 class="card-title">Locations</h5>
    
  </div>
  <div class="card-body" data-id="nav-pers">
  <a href="#"><span>    <i class="fas fa-user fa-10x"></i></span></a>
    <h5 class="card-title">Personnel</h5>
    
  </div>
</div> -->

<!-- 1st modal  =======================================-->
<!-- <div id="modal1" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> -->
          <!-- Modal body view -->
      <!-- <form class="formModal">
        
       </form> -->
<!-- //////////////////////////// -->
      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit">Edit</button>
        <button type="submit" class="btn btn-primary save">Save</button>
        <button type="button" class="btn btn-primary delete">Delete</button>
        <button type="submit" class="btn btn-primary update">Update</button>
      </div>
    </div>
  </div>
</div> -->

<!-- 2nd modal for new enteries =======================================-->

<!-- <div id="modal2" class="modal fade bd-example-modal-lg new-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitleNew"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> -->
          <!-- Modal body view -->
      <!-- <form class="formModalNew">
        
       </form> -->
<!-- //////////////////////////// -->
     <!--  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit">Edit</button>
        <button type="submit" class="btn btn-primary savenew">Save</button>
        <button type="button" class="btn btn-primary delete">Delete</button>
        <button type="submit" class="btn btn-primary update">Update</button>
      </div>
    </div>
  </div>
</div> -->

<!--Alert ============================================== -->

<!-- ================================================ -->
<div id="modal3" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle3"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
          
      <form class="formModal3">
          <div class="form-group row">
            <label for="firstname" class="col-sm-2 col-form-label"><strong>First Name</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext firstname" id="firstname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="lastname" class="col-sm-2 col-form-label"><strong>Last Name</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext lastname" id="lastname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="jobtitle" class="col-sm-2 col-form-label"><strong>Job Title</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext jobtitle" id="jobtitle" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext email" id="email" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="department" class="col-sm-2 col-form-label"><strong>Department</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext department" id="department" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label"><strong>Location</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext location" id="location" value="">
            </div>
          </div>
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary edit">Edit</button> -->
        <button type="button" class="btn btn-primary edit" data-dismiss="modal" data-toggle="modal" data-target="#modal4">Edit</button>
        <button type="button" class="btn btn-primary delete" data-toggle="modal"  data-target="#confirmation">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- ====================================================== -->

<!-- Edit Personnel ================================================ -->
<div id="modal4" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle4"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
      <form class="formModal4">
          <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label"><strong>First Name</strong></label>
            <div class="col-sm-10">
              <input type="text" name="firstName" class="form-control-plaintext firstname" id="efirstname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="lastname" class="col-sm-2 col-form-label"><strong>Last Name</strong></label>
            <div class="col-sm-10">
              <input type="text" name="lastName" class="form-control-plaintext lastname" id="elastname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="jobtitle" class="col-sm-2 col-form-label"><strong>Job Title</strong></label>
            <div class="col-sm-10">
              <input type="text" name="jobTitle" class="form-control-plaintext jobtitle" id="ejobtitle" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-10">
              <input type="text" name="email" class="form-control-plaintext email" id="eemail" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="department" class="col-sm-2 col-form-label"><strong>Department</strong></label>
            <div class="col-sm-10 deptsel">
              <input type="text"  name="departmentID" class="form-control-plaintext department" id="edepartment" value="">
            </div>
          </div>
          
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- ====================================================== -->

<!-- New Personnel ================================================ -->
<div id="modal5" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle5">Create New Personnel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
      <form class="formModal5">
          <div class="form-group row">
            <label for="firstNamenew" class="col-sm-2 col-form-label"><strong>First Name</strong></label>
            <div class="col-sm-10">
              <input type="text" name="firstNamenew" class="form-control-plaintext firstname" id="nfirstname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="lastNamenew" class="col-sm-2 col-form-label"><strong>Last Name</strong></label>
            <div class="col-sm-10">
              <input type="text" name="lastNamenew" class="form-control-plaintext lastname" id="nlastname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="jobTitlenew" class="col-sm-2 col-form-label"><strong>Job Title</strong></label>
            <div class="col-sm-10">
              <input type="text" name="jobTitlenew" class="form-control-plaintext jobtitle" id="njobtitle" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="emailnew" class="col-sm-2 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-10">
              <input type="text" name="emailnew" class="form-control-plaintext email" id="nemail" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="departmentIDnew" class="col-sm-2 col-form-label"><strong>Department</strong></label>
            <div class="col-sm-10 deptsel">
              <input type="text"  name="departmentIDnew" class="form-control-plaintext department" id="ndepartment" value="">
            </div>
          </div>
          
       </form>  
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Department Record view ============================================================================ -->
<div id="modaldept" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitledept"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
          
      <form class="modaldept">
          <div class="form-group row">
            <label for="deptname" class="col-sm-2 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext deptname" id="deptname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="locationname" class="col-sm-2 col-form-label"><strong>Location</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext locationname" id="locationname" value="">
            </div>
          </div>
          
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit" data-dismiss="modal" data-toggle="modal" data-target="#modaldeptedit">Edit</button>
        <button type="button" class="btn btn-primary delete" data-toggle="modal"  data-target="#confirmation">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Department Record view ============================================================================ -->
<div id="modaldeptedit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitledeptedit"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
          
      <form class="modaldeptedit">
          <div class="form-group row">
            <label for="edeptname" class="col-sm-2 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-10">
              <input type="text" name="edeptname" class="form-control-plaintext edeptname" id="edeptname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="elocationname" class="col-sm-2 col-form-label"><strong>Location</strong></label>
            <div class="col-sm-10 locsel">
              <input type="text" name="elocationname" class="form-control-plaintext elocationname" id="elocationname" value="">
            </div>
          </div>
          
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- New Department ================================================ -->
<div id="modaldeptnew" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitleDeptNew">Create New Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
      <form class="modaldeptnew">
          <div class="form-group row">
            <label for="ndeptname" class="col-sm-2 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-10">
              <input type="text" name="ndeptname" class="form-control-plaintext ndeptname" id="ndeptname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="ndlocnew" class="col-sm-2 col-form-label"><strong>Location</strong></label>
            <div class="col-sm-10 locsel">
              <input type="text" name="ndlocnew" class="form-control-plaintext ndlocnew" id="ndlocnew" value="">
            </div>
          </div>
          
       </form>  
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Location Record view ============================================================================ -->
<div id="modalloc" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitleloc"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
          
      <form class="modalloc">
          <div class="form-group row">
            <label for="locname" class="col-sm-2 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-10 locedit">
              <input type="text" name="locname" readonly class="form-control-plaintext locname" id="locname" value="">
            </div>
          </div>
          
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit" data-dismiss="modal" data-toggle="modal" data-target="#modallocedit">Edit</button>
        <button type="button" class="btn btn-primary delete" data-toggle="modal"  data-target="#confirmation">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Location Record update ============================================================================ -->
<div id="modallocedit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitlelocedit"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
          
      <form class="modallocedit">
          <div class="form-group row">
            <label for="elocname" class="col-sm-2 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-10 locedit">
              <input type="text" name="elocname" class="form-control-plaintext elocname" id="elocname" value="">
            </div>
          </div>
          
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update">Update</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Location Record update ============================================================================ -->
<div id="modallocsave" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitlelocsave">Create New Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
          
      <form class="modallocsave">
          <div class="form-group row">
            <label for="slocname" class="col-sm-2 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-10 locedit">
              <input type="text" name="slocname" class="form-control-plaintext slocname" id="slocname" value="">
            </div>
          </div>
          
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save">Save</button>
        
      </div>
    </div>
  </div>
</div>

<!-- confirmation delete ================= -->

<div id="confirmation" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deleting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Please confirm you want to delete this record!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary del-ok">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- not delete msg ================= -->

<div id="nodelete" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle fa-2x"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      This record cannot be deleted becuase it is associated with other <span class="no"></span> <span class="cat"></span> records.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
        
      </div>
    </div>
  </div>
</div>
<!-- ====================================================== -->

<?php
include "libs/includes/footer.php";
?>