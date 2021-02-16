<?php
include "libs/includes/header.php";
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <h2 class="pageTitle"></h2>
          <button class="new" data-toggle="modal" 
        data-target="#modal2"><i class="fas fa-plus-circle"></i>New</button>
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
          <div class="table-div">
            No data Available
          </div>

            <nav>
                <ul class="pagination justify-content-center pagination-sm">
                    
                </ul>
            </nav>

        </main>
    
<div id="modal1" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
      <form class="formModal">
        
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit">Edit</button>
        <button type="submit" class="btn btn-primary save">Save</button>
        <button type="button" class="btn btn-primary delete">Delete</button>
        <button type="submit" class="btn btn-primary update">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- 2nd modal for new enteries -->

<div id="modal2" class="modal fade bd-example-modal-lg new-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitleNew"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body view -->
      <form class="formModalNew">
        
       </form>
<!-- //////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit">Edit</button>
        <button type="submit" class="btn btn-primary save">Save</button>
        <button type="button" class="btn btn-primary delete">Delete</button>
        <button type="submit" class="btn btn-primary update">Update</button>
      </div>
    </div>
  </div>
</div>

<?php
include "libs/includes/footer.php";
?>