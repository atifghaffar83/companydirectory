// Returns an array of maxLength (or less) page numbers
// where a 0 in the returned array denotes a gap in the series.
// Parameters:
//   totalPages:     total number of pages
//   page:           current page
//   maxLength:      maximum size of returned array
//$(document).ready(()=>{
function getPageList(totalPages, page, maxLength) {
    if (maxLength < 5) throw "maxLength must be at least 5";
  
    function range(start, end) {
      return Array.from(Array(end - start + 1), (_, i) => i + start);
    }
  
    var sideWidth = maxLength < 9 ? 1 : 2;
    var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
    var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
    if (totalPages <= maxLength) {
      // no breaks in list
      return range(1, totalPages);
    }
    if (page <= maxLength - sideWidth - 1 - rightWidth) {
      // no break on left of page
      return range(1, maxLength - sideWidth - 1)
        .concat([0])
        .concat(range(totalPages - sideWidth + 1, totalPages));
    }
    if (page >= totalPages - sideWidth - 1 - rightWidth) {
      // no break on right of page
      return range(1, sideWidth)
        .concat([0])
        .concat(
          range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
        );
    }
    // Breaks on both sides
    return range(1, sideWidth)
      .concat([0])
      .concat(range(page - leftWidth, page + rightWidth))
      .concat([0])
      .concat(range(totalPages - sideWidth + 1, totalPages));
  }
  
  $(function() {
/*     ///////////////////////////////////////////////////////////////////////////////
    // Number of items and limits the number of items per page
    var numberOfItems = $("#jar .content").length;
    var limitPerPage = 16;
    // Total pages rounded upwards
    var totalPages = Math.ceil(numberOfItems / limitPerPage);
    // Number of buttons at the top, not counting prev/next,
    // but including the dotted buttons.
    // Must be at least 5:
    var paginationSize = 7;
    var currentPage;
  
    function showPage(whichPage) {
      if (whichPage < 1 || whichPage > totalPages) return false;
      currentPage = whichPage;
      $("#jar .content")
        .hide()
        .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
        .show();
      // Replace the navigation items (not prev/next):
      $(".pagination li").slice(1, -1).remove();
      getPageList(totalPages, currentPage, paginationSize).forEach(item => {
        $("<li>")
          .addClass(
            "page-item " +
              (item ? "current-page " : "") +
              (item === currentPage ? "active " : "")
          )
          .append(
            $("<a>")
              .addClass("page-link")
              .attr({
                href: "javascript:void(0)"
              })
              .text(item || "...")
          )
          .insertBefore("#next-page");
      });
      return true;
    }
  
    // Include the prev/next buttons:
    $(".pagination").append(
      $("<li>").addClass("page-item").attr({ id: "previous-page" }).append(
        $("<a>")
          .addClass("page-link")
          .attr({
            href: "javascript:void(0)"
          })
          .text("Prev")
      ),
      $("<li>").addClass("page-item").attr({ id: "next-page" }).append(
        $("<a>")
          .addClass("page-link")
          .attr({
            href: "javascript:void(0)"
          })
          .text("Next")
      )
    );
    // Show the page links
    $("#jar").show();
    showPage(1);
  
    // Use event delegation, as these items are recreated later
    $(document).on("click", ".pagination li.current-page:not(.active)", function() {
      return showPage(+$(this).text());
    });
    $("#next-page").on("click", function() {
      return showPage(currentPage + 1);
    });
  
    $("#previous-page").on("click", function() {
      return showPage(currentPage - 1);
    });
    $(".pagination").on("click", function() {
      $("html,body").animate({ scrollTop: 0 }, 0);
    });

    //dropdown filters code
    $(".dropdown dt a.department").on('click', function() {
        $(".dropdown dd ul.deptul").slideToggle('fast');
      });
      
    $(".dropdown dt a.location").on('click', function() {
        $(".dropdown dd ul.locul").slideToggle('fast');
      });
      
      
      $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
      });
///////////////////////////////////////////////////////////////////////////////////////////////////////////// */
// SEARCHING TABLE
function search() {
  
var search = $(this).val();
// Hide all table tbody rows
    $('table tbody tr').hide();
    // Count total search result
    var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;
    if(len > 0){
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
        $(this).closest('tr').show();
      });
    }else{
      $('.notfound').show();
    }
  }

  $.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function( elem ) {
      return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    }
  });

$("#myInput").on("keyup",search);

    
//filter function for location and department
const filter = function(){
    let location = [];
    let department = [];
    if($(".locul input:checked").length || $(".deptul input:checked").length){
        
    let table, tddep, tr, td, i, txtValue, tddepValue;
    
    //getting filter values
    $(".locul input:checked").each(function(){
        location.push($(this).val().toUpperCase());
    });
    
   $(".deptul input:checked").each(function(){
        department.push($(this).val().toUpperCase());
        
    });

    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[6];
        tddep = tr[i].getElementsByTagName("td")[5];

        if (td || tddep) {
          txtValue = td.textContent || td.innerText;
          tddepValue = tddep.textContent || tddep.innerText;
            if ((location.indexOf(txtValue.toUpperCase()) > -1) && (department.indexOf(tddepValue.toUpperCase()) > -1)) {
              tr[i].style.display = "";

            } else if((location.indexOf(txtValue.toUpperCase()) > -1) && (department.indexOf(tddepValue.toUpperCase()) == -1)){
              tr[i].style.display = "";
                
            } else if((location.indexOf(txtValue.toUpperCase()) == -1) && (department.indexOf(tddepValue.toUpperCase()) > -1)){
              tr[i].style.display = "";
            }

             else {
                tr[i].style.display = "none";
          }
        }       
      }

      

      $(".fa-times-circle").show("slow");
}
}

    $(".btnfilter").on("click",filter);

//clear fit tooltip
    $('[data-toggle="tooltip"]').tooltip();

//clear filter button code
    $(".fa-times-circle").on("click", function(){
        $(".fa-times-circle").hide("slow");
        $(':input').prop('checked', false);
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
    })
let navTime = new Date().toLocaleString();
$(".timenav").html(`<b>${navTime}</b>`);

/////////////////////////////////////////////////////////////////////////////////////

//all perosonnel data ajax calling php file
const getAll = function(e){
  //e.preventDefault();
  let data, navTitle, pageTitle;
  navTitle =  $(this).attr("id");
  let dataNav = $(this).data("id") || e.id;
  console.log('navTitle');
  console.log(navTitle);
  console.log('dataNav');
  console.log(dataNav);
  switch(dataNav){
    case 'nav-dept':
      url= "./libs/php/getAllDepartments.php";
      data= {id: navTitle};
      pageTitle = "Departments";
      $(".deptdl").hide();
      $(".locdl").show();
      $(".btnfilter").show();
      
      break;
    case 'nav-loc':
      url= "./libs/php/getAllLocations.php";
      data= {id: navTitle};
      pageTitle = "Locations";
      $(".locdl").hide();
      $(".deptdl").hide();
      $(".btnfilter").hide();

      break;
    case 'nav-pers':
      url= "./libs/php/getAll.php";
      data= {id: navTitle};
      pageTitle = "Personnel";
      $(".locdl").show();
      $(".deptdl").show();
      $(".btnfilter").show();
      break;
  }

  $.ajax({
    url: url,
    type: "POST",
    dataType: "json",
    success: function(results){
      
      let tableResult = `<table id="myTable" class="table table-striped table-sm ${dataNav}">
      <thead>
        <tr class="actHeader">`;
      let rowHeader = results.data.allData[0];
      
      for (const [key, value] of Object.entries(rowHeader)) {
        //if(!(key == "id")){
          tableResult += `<th ${key == "id"?"hidden":""}>${key}</th>`;
        //}
      }
      tableResult += `</tr></thead><tbody id="jar">`;
      
      $.each(results.data.allData, (i, row)=>{
        tableResult += `<tr class="content" 
        data-toggle="modal" 
        data-target="#modal1" `;

        
        for (const [key, value] of Object.entries(row)) {
          //if(!(key == "id")){
            tableResult += ` data--${key}="${value}"`;
          //}
        }

        tableResult += `>`;
      
        for (const [key, value] of Object.entries(row)) {
          //if(!(key == "id")){
            tableResult += `<td ${key == "id"?"hidden":""}>${value}</td>`;
          //}
        }

        tableResult += `<td class="action">
        <div class="btn-group">
        <button type="button" class="btn btnfilter dropdown-toggle menu-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Edit
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          
          <button class="dropdown-item" type="button">Edit</button>
          <button class="dropdown-item" type="button">Delete</button>
        </div>
      </div>
      </td>
      </tr>`;
      });
      tableResult += `</table>`;
      
      //let pageTitle = "Personnel";
      $(".pageTitle").html(pageTitle);
      $(".table-div").html(tableResult);
      $(".actHeader").append("<th>Action</th>");

      console.log(results.data);
      let location = results.data.locations;
      if(typeof location != "undefined"){
        console.log("location exist");
        let ddloc = `<ul class="locul">`;
      location.forEach(li => {
        
        ddloc += `<li><input type="checkbox" value-id="${li.id}" value="${li.name}" name="${li.name}"><span>${li.name}</span></li>`;
      });
      ddloc += `</ul>`;
      $(".ddlocul").html(ddloc);
      }
     /*  console.log(location);
      let ddloc = `<ul class="locul">`;
      location.forEach(li => {
        
        ddloc += `<li><input type="checkbox" value-id="${li.id}" value="${li.name}" name="${li.name}"><span>${li.name}</span></li>`;
      });
      ddloc += `</ul>`;
      $(".ddlocul").html(ddloc); */

      let department = results.data.department;
      if(typeof department != "undefined"){
        console.log("department exist");
        let dddept = `<ul class="deptul">`;
      department.forEach(li => {
        
        dddept += `<li><input type="checkbox" value-id="${li.id}" value="${li.name}" name="${li.name}"><span>${li.name}</span></li>`;
      });
      dddept += `</ul>`;
      $(".dddepul").html(dddept);
      }
      /* console.log(department);
      let dddept = `<ul class="deptul">`;
      department.forEach(li => {
        
        dddept += `<li><input type="checkbox" value-id="${li.id}" value="${li.name}" name="${li.name}"><span>${li.name}</span></li>`;
      });
      dddept += `</ul>`;
      $(".dddepul").html(dddept); */


      
      
    }
  });
}
//////////////////////////////////////////////////////////////////////
  $('#modal1').modal({
      keyboard: true,
      backdrop: "static",
      show: false,
      
  }).on('shown.bs.modal', function(event){
        let pageTitle = $(".pageTitle").text();
        let getIdFromRow = $(event.relatedTarget);
        let data = getIdFromRow.data();
        let text = getIdFromRow.text();
        let html = `<form>`;
        for (const [key, value] of Object.entries(data)) {
          if(!(key == "target") && !(key == "toggle") && !(key == "Id")){
          html += `
          <div class="form-group row">
            <label for="${key}" class="col-sm-2 col-form-label"><strong>${key}</strong></label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext ${key}" id="${key}" value="${value}">
            </div>
          </div>`;
          
          }
          
        }
        html += `</form>`;
        
      //make your ajax call populate items or what even you need
      if(pageTitle == "Personnel"){
        $('#exampleModalLongTitle').html(`${data['Firstname']} ${data['Lastname']}`);
      } else if(pageTitle == "Departments"){
        $('#exampleModalLongTitle').html(`${data['Name']}`);
      } else if(pageTitle == "Locations"){
        $('#exampleModalLongTitle').html(`${data['Name']}`);
      } 
      
      
      
      $('.edit').attr("data-id",data['Id']);
      $('.delete').attr("data-id",data['Id']);
      $('.update').attr("data-id",data['Id']);
      $('.formModal').html(`${html}`);

      $('.edit').show();
      $('.delete').show();
      $('.update').hide();
      $('.save').hide();
          
  });
///////////////////////////////////////////////////////////////////////////////////////
const editRecord = function(e){
  
  e.preventDefault();
  let url, dataId, html, idDelete = "";
  
  dataId = $(e.currentTarget).attr('data-id');
  
  let dataTxt = $(e.currentTarget).text();
  let pageTitle = $(".pageTitle").text();
  
  switch(dataTxt){
    case 'Edit':
      url = "./libs/php/getPersonnel.php";
      data = {
        id: dataId,
        btnAction: dataTxt,
        title: pageTitle
      };
      
      break;
    case 'Delete':
      url = "./libs/php/deleteByID.php";
      data = {
        id: dataId, 
        btnAction: dataTxt,
        title: pageTitle
      };
      break;
   
  }

   $.ajax({
    url: url,
    type: "POST",
    data: data,
    dataType: "json",
    success: function(results){
      
      if (results.status.name == "ok"){
        if(dataTxt == "Edit"){
          
          let tableRow = results.data.tableRow[0];
         // let departmentID = tableRow.departmentID;
          let departments = results.data.departments;
          let locations = results.data.locations;
          //let locationID = locations.locationID;
          let locationID, departmentID;
        
          html = `<form>`;
          if(pageTitle == "Personnel"){
            departmentID = tableRow.departmentID;
            for (const [key, value] of Object.entries(tableRow)) {
              if(!(key == "departmentID")){
              html += `<div class="form-group row">
              <label for="${key}" class="col-sm-2 col-form-label"><strong>${key}</strong></label>
              <div class="col-sm-10">
              <input type="text" ${!(key == "id") ? "contenteditable" : "readonly"} class="form-control-plaintext ${key}" id="${key}" name="${key}" value="${value}">
              </div>
          </div>`;
            } 
          }
          } else if(pageTitle == "Departments"){
            locationID = tableRow.locationID;
            for (const [key, value] of Object.entries(tableRow)) {
              if(!(key == "locationID")){
              html += `<div class="form-group row">
              <label for="${key}" class="col-sm-2 col-form-label"><strong>${key}</strong></label>
              <div class="col-sm-10">
              <input type="text" ${!(key == "id") ? "contenteditable" : "readonly"} class="form-control-plaintext ${key}" id="${key}" name="${key}" value="${value}">
              </div>
          </div>`;
            } 
          }
          } else if(pageTitle == "Locations"){
            
            for (const [key, value] of Object.entries(tableRow)) {
              //if(!(key == "locationID")){
              html += `<div class="form-group row">
              <label for="${key}" class="col-sm-2 col-form-label"><strong>${key}</strong></label>
              <div class="col-sm-10">
              <input type="text" ${!(key == "id") ? "contenteditable" : "readonly"} class="form-control-plaintext ${key}" id="${key}" name="${key}" value="${value}">
              </div>
          </div>`;
            //} 
          }
          }
            

          html += `</form>`;
    
          $(".formModal").html(html);
          $('.update').attr("data-id",tableRow['id']);
          

          let htmlSelect = "";
          if(pageTitle == "Personnel"){
            htmlSelect = `<div class="form-group row">
          <label for="departmentID" class="col-sm-2 col-form-label"><strong>Department</strong></label>
          <div class="col-sm-10"> 
          <select class="custom-select" name="departmentID" id="departmentID">`;
            departments.forEach(option=>{
              htmlSelect += `<option value="${option.id}" data-id="${option.id}" ${option.id==departmentID ? "selected":""}>${option.name}</option>`;
            });
          } else if(pageTitle == "Departments"){
            htmlSelect = `<div class="form-group row">
          <label for="locationID" class="col-sm-2 col-form-label"><strong>Location</strong></label>
          <div class="col-sm-10"> 
          <select class="custom-select" name="locationID" id="locationID">`;
            locations.forEach(option=>{
              htmlSelect += `<option value="${option.id}" data-id="${option.id}" ${option.id==locationID ? "selected":""}>${option.name}</option>`;
            });
          }
          htmlSelect += "</Select></div>";
          
          pageTitle == "Personnel" || pageTitle == "Departments" ? $(".formModal").append(htmlSelect) : "";
          
          
        } else if(dataTxt === "Delete"){
          $(".formModal").html("<span>Deleted</span>");
//          getAll();
          if(pageTitle == "Departments"){
            let dataID = {id: "nav-dept"}
            getAll(dataID);
          } else if(pageTitle == "Locations"){
            let dataID = {id: "nav-loc"}
            getAll(dataID);
          } else{
            let dataID = {id: "nav-pers"}
            getAll(dataID);
          }
        }
      
    }
  }, 
  error: function(jqXHR, textStatus, errorThrown) {
    // your error code
    console.log("No data coming from editRecord.php file");
}

  });
  $(".update").show();
  $(".delete").hide();
  $(".edit").hide();
 
}

const update = function(e){
  e.preventDefault();
  let url, html;
  let pageTitle = $(".pageTitle").text();
  
   $.ajax({
    url: "./libs/php/update.php",
    type: "POST",
    data: $('#modal1 form').serialize()+"&title="+pageTitle,
    dataType: "json",
    success: function(results){
      
      if (results.status.name == "ok"){
          let personRow = results.data.updateData[0];
          
          html = `<form>`;
            for (const [key, value] of Object.entries(personRow)) {
              
              html += `<div class="form-group row">
              <label for="${key}" class="col-sm-2 col-form-label"><strong>${key}</strong></label>
              <div class="col-sm-10">
              <input type="text" contenteditable class="form-control-plaintext ${key}" id="${key}" name="${key}" value="${value}">
              </div>
          </div>`;
           
          }
            html += `</form>`;
    
            $(".formModal").html(html);

    let pageTitle = $(".pageTitle").text();

      if(pageTitle == "Personnel"){
        $('#exampleModalLongTitle').html(`${personRow['firstName']} ${personRow['lastName']}`);
      } else if(pageTitle == "Departments"){
        $('#exampleModalLongTitle').html(`${personRow['name']}`);
      } else if(pageTitle == "Locations"){
        $('#exampleModalLongTitle').html(`${personRow['name']}`);
      } 
            
    if(pageTitle == "Departments"){
      let dataID = {id: "nav-dept"}
      getAll(dataID);
    } else if(pageTitle == "Locations"){
      let dataID = {id: "nav-loc"}
      getAll(dataID);
    } else{
      let dataID = {id: "nav-pers"}
      getAll(dataID);
    }
      
    }
  }, 
  error: function(jqXHR, textStatus, errorThrown) {
    // your error code
    console.log("No data coming from update.php file");
}

  });
  $(".update").show();
  $(".delete").hide();
  $(".edit").hide();
 
}

/////////////////////////////////////////////////////////////////////

const create = function(e){
  let url, data, pageTitle;
  
  pageTitle = $(".pageTitle").text();
  
  switch(pageTitle){
    case "Personnel":
      
      url= "./libs/php/newLocDept.php";
      data = {title: pageTitle};
      break;
    case "Departments":
      url= "./libs/php/newLocDept.php";
      data = {title: pageTitle};
    break;
    case "Locations":
      $('#modal2').modal({
        keyboard: true,
        backdrop: "static",
        show: false,
        
      }).on('shown.bs.modal', function(event){
      let html = `<form>`;
              
                $('#exampleModalLongTitleNew').html(`Create New Location`);
                html += `<div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label" autofocus><strong>Location</strong></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext name" id="name" name="name" value="">
                      </div>
                    </div>
                    `;
          
          html += `</form>`;
          
          $('.formModalNew').html(html);
          $('.edit').hide();
          $('.delete').hide();
          $('.update').hide();
          $('.save').show();
      
      });
    break;
    
  }

  $.ajax({
    url: url,
    type: "POST",
    data: data,
    dataType: "json",
    success: function(results){
      let updateData = results.data.updateData;
      

      ////////////////////////
      $('#modal2').modal({
        keyboard: true,
        backdrop: "static",
        show: false,
        
      }).on('shown.bs.modal', function(event){
      
      
      let html = `<form>`;
              if(pageTitle == "Personnel"){
                
                html += `
              <div class="form-group row">
                <label for="firstName" class="col-sm-2 col-form-label" autofocus><strong>First Name</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control-plaintext firstName" id="firstName" name="firstName" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="lastName" class="col-sm-2 col-form-label"><strong>Last Name</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control-plaintext lastName" id="lastName" name="lastName" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="jobTitle" class="col-sm-2 col-form-label"><strong>Job Title</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control-plaintext jobTitle" id="jobTitle" name="jobTitle" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"><strong>Email</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control-plaintext email" id="email" name="email" value="">
                </div>
              </div>
              
              `;
              } else if(pageTitle == "Departments"){
                $('#exampleModalLongTitleNew').html(`Create New Department`);
                html += `
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label" autofocus><strong>Department</strong></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control-plaintext name" id="name" name="name" value="">
                </div>
              </div>
              `;
              } 
          
          html += `</form>`;
          
          $('.formModalNew').html(html);
          $('.edit').hide();
          $('.delete').hide();
          $('.update').hide();
          $('.save').show();

          /////////////////////////////////
          let htmlNew ="";
        
      if(pageTitle == "Personnel"){
      
        htmlNew += `
              <div class="form-group row">
                <label for="departmentID" class="col-sm-2 col-form-label"><strong>Department</strong></label>
                <div class="col-sm-10">
                  <select class="custom-select" name="departmentID" id="departmentID">`;
                  updateData.forEach(option=>{
            htmlNew += `<option value="${option.id}" data-id="${option.id}"} >${option.name}</option>`;
                  });
          htmlNew +=`</select></div></div>`;
          
          $('#exampleModalLongTitleNew').html(`Create New Personnel`);
        $('.formModalNew').append(htmlNew);
      
        } else if(pageTitle == "Departments"){
          htmlNew += `
                <div class="form-group row">
                  <label for="locationID" class="col-sm-2 col-form-label"><strong>Location</strong></label>
                  <div class="col-sm-10">
                    <select class="custom-select" name="locationID" id="locationID">`;
                    updateData.forEach(option=>{
              htmlNew += `<option value="${option.id}" data-id="${option.id}"}>${option.name}</option>`;
                    });
            
            htmlNew +=`</select></div></div>`;
          $('#exampleModalLongTitleNew').html(`Create New Department`);
          $('.formModalNew').append(htmlNew);
      
          }
      
      });
      ///////////////////////
      
          //pageTitle == "Personnel" || pageTitle == "Departments" ? $('.formModalNew').append(htmlNew) : "";
    
      
      ////////////////////////
      
  
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // your error code
      console.log("No data coming from update.php file");
  }
  });


}

const saveRec = function(){
  pageTitle = $(".pageTitle").text();
  
  $.ajax({
    url: "./libs/php/insertRecord.php",
    type: "POST",
    data: $('#modal2 form').serialize()+"&title="+pageTitle,
    dataType: "json",
    success: function(results){
      if (results.status.name == "ok"){
      
      $("#modal2 .formModalNew").html("Successfully created");

      if(pageTitle == "Departments"){
        let dataID = {id: "nav-dept"}
        getAll(dataID);
      } else if(pageTitle == "Locations"){
        let dataID = {id: "nav-loc"}
        getAll(dataID);
      } else{
        let dataID = {id: "nav-pers"}
        getAll(dataID);
      }
      
      $(".save").hide();
    }
  }, 
  error: function(jqXHR, textStatus, errorThrown) {
    // your error code
    console.log("No data coming from insertRecord.php file");
}
  });

}

$(".getalldata").on("click", getAll);
$(".allDept").on("click", getAll);
$(".allLoc").on("click", getAll);
$(".edit").on("click", editRecord);
$(".delete").on("click", function(e){
  if(confirm('Are you sure?')) editRecord(e);
});
$(".update").on("click", update);
$(".new").on("click", create);
$(".newicon").on("click", create);
$(".save").on("click", saveRec);

    ///////////////////////////////////////////////////////////////////////////////
    // Number of items and limits the number of items per page
    var numberOfItems = $("#jar .content").length;
    var limitPerPage = 16;
    console.log(numberOfItems);
    // Total pages rounded upwards
    var totalPages = Math.ceil(numberOfItems / limitPerPage);
    // Number of buttons at the top, not counting prev/next,
    // but including the dotted buttons.
    // Must be at least 5:
    var paginationSize = 7;
    var currentPage;
  
    function showPage(whichPage) {
      if (whichPage < 1 || whichPage > totalPages) return false;
      currentPage = whichPage;
      $("#jar .content")
        .hide()
        .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
        .show();
      // Replace the navigation items (not prev/next):
      $(".pagination li").slice(1, -1).remove();
      getPageList(totalPages, currentPage, paginationSize).forEach(item => {
        $("<li>")
          .addClass(
            "page-item " +
              (item ? "current-page " : "") +
              (item === currentPage ? "active " : "")
          )
          .append(
            $("<a>")
              .addClass("page-link")
              .attr({
                href: "javascript:void(0)"
              })
              .text(item || "...")
          )
          .insertBefore("#next-page");
      });
      return true;
    }
  
    // Include the prev/next buttons:
    $(".pagination").append(
      $("<li>").addClass("page-item").attr({ id: "previous-page" }).append(
        $("<a>")
          .addClass("page-link")
          .attr({
            href: "javascript:void(0)"
          })
          .text("Prev")
      ),
      $("<li>").addClass("page-item").attr({ id: "next-page" }).append(
        $("<a>")
          .addClass("page-link")
          .attr({
            href: "javascript:void(0)"
          })
          .text("Next")
      )
    );
    // Show the page links
    $("#jar").show();
    showPage(1);
  
    // Use event delegation, as these items are recreated later
    $(document).on("click", ".pagination li.current-page:not(.active)", function() {
      return showPage(+$(this).text());
    });
    $("#next-page").on("click", function() {
      return showPage(currentPage + 1);
    });
  
    $("#previous-page").on("click", function() {
      return showPage(currentPage - 1);
    });
    $(".pagination").on("click", function() {
      $("html,body").animate({ scrollTop: 0 }, 0);
    });

    //dropdown filters code
    $(".dropdown dt a.department").on('click', function() {
        $(".dropdown dd ul.deptul").slideToggle('fast');
      });
      
    $(".dropdown dt a.location").on('click', function() {
        $(".dropdown dd ul.locul").slideToggle('fast');
      });
      
      
      $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
      });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

$("#navUl").on("click", function(){
  $("#main-section").show("slow");
});

$(".card-body").on("click", function(){
  $("#main-section").show("slow");
  $("#sidebar").css('visibility', 'visible');
  $(".card-body").hide();
  
  let dataId = $(this).data();
  getAll(dataId);
});

  //=========================================================================================================
  //sidebar function
  var toggleBtn = document.querySelector('.sidebar-toggle');
  var sidebar = document.querySelector('.sidebar');
  
  toggleBtn.addEventListener('click', function() {
    toggleBtn.classList.toggle('is-closed');
    sidebar.classList.toggle('d-none');
    
    
  });

//////////////////////////////////////////////////////////////////////////////
});
  
//});

