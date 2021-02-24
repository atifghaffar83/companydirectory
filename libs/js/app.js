  $(function() {

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////////////////////////////////////////
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

    let pageTitle = $(".pageTitle").text();
    
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        
        if(pageTitle == "Personnel"){
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
        } else{
          
          td = tr[i].getElementsByTagName("td")[3];
          if (td || tddep) {
            
            txtValue = td.textContent || td.innerText;
              if ((location.indexOf(txtValue.toUpperCase()) > -1)) {
                tr[i].style.display = "";
  
              } else {
                  tr[i].style.display = "none";
            }
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

const getAll = function(e){
  //e.preventDefault();
  
  let data, navTitle, pageTitle, dataTarget;
  navTitle =  $(this).attr("id");
  let dataNav = $(this).data("id") || e.id;
  
  switch(dataNav){
    case 'nav-dept':
      url= "./libs/php/getAllDepartments.php";
      data= {id: navTitle};
      pageTitle = "Departments";
      $(".deptdl").hide();
      $(".locdl").show();
      $(".btnfilter").show();
      dataTarget = "#modaldept";
      
      break;
    case 'nav-loc':
      url= "./libs/php/getAllLocations.php";
      data= {id: navTitle};
      pageTitle = "Locations";
      $(".locdl").hide();
      $(".deptdl").hide();
      $(".btnfilter").hide();
      dataTarget = "#modalloc";

      break;
    case 'nav-pers':
      url= "./libs/php/getAll.php";
      data= {id: navTitle};
      pageTitle = "Personnel";
      $(".locdl").show();
      $(".deptdl").show();
      $(".btnfilter").show();
      dataTarget = "#modal3";
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
          tableResult += `<th ${(key == "id") || (key == "LocationID")?"hidden":""}>${key}</th>`;
        //}
      }
      tableResult += `</tr></thead><tbody id="jar">`;
      
      $.each(results.data.allData, (i, row)=>{
        tableResult += `<tr class="content" 
        data-toggle="modal" 
        data-target=${dataTarget} 
        `;

        
        for (const [key, value] of Object.entries(row)) {
          //if(!(key == "id")){
            tableResult += ` data--${key}="${value}"`;
          //}
        }

        tableResult += `>`;
      
        for (const [key, value] of Object.entries(row)) {
          //if(!(key == "id")){
            tableResult += `<td ${(key == "id") || (key == "LocationID")?"hidden":""}>${value}</td>`;
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
      
      
      $(".pageTitle").html(pageTitle);
      $(".table-div").html(tableResult);
      $(".actHeader").append("<th>Action</th>");

      
      let location = results.data.locations;
      if(typeof location != "undefined"){
        
        let ddloc = `<ul class="locul">`;
      location.forEach(li => {
        
        ddloc += `<li><input type="checkbox" value-id="${li.id}" value="${li.name}" name="${li.name}"><span>${li.name}</span></li>`;
      });
      ddloc += `</ul>`;
      $(".ddlocul").html(ddloc);
      }
   
      let department = results.data.department;
      if(typeof department != "undefined"){
        
        let dddept = `<ul class="deptul">`;
      department.forEach(li => {
        
        dddept += `<li><input type="checkbox" value-id="${li.id}" value="${li.name}" name="${li.name}"><span>${li.name}</span></li>`;
      });
      dddept += `</ul>`;
      $(".dddepul").html(dddept);
      }

    }
  });
}

//////////////////////////////////////////////////////////////////////
$('#modal3').modal({
  keyboard: true,
  //backdrop: "static",
  show: false,
  
}).on('shown.bs.modal', function(event){
  
  let pageTitle = $(".pageTitle").text();
  let getIdFromRow = $(event.relatedTarget);
  let data = getIdFromRow.data();
 
  $("#firstname").val(data['Firstname']);
  $("#lastname").val(data['Lastname']);
  $("#jobtitle").val(data['Jobtitle']);
  $("#email").val(data['Email']);
  $("#department").val(data['Department']);
  $("#location").val(data['Location']);
   //make your ajax call populate items or what even you need
   if(pageTitle == "Personnel"){
    $('#exampleModalLongTitle3').html(`${data['Firstname']} ${data['Lastname']}`);
    if(pageTitle == "Personnel"){
      $("#location").closest(".form-group").show();
    }
  } else if(pageTitle == "Departments"){
    $('#exampleModalLongTitle3').html(`${data['Name']}`);
  } else if(pageTitle == "Locations"){
    $('#exampleModalLongTitle3').html(`${data['Name']}`);
  } 
  $('.edit').attr("data-id",data['Id']);
  $('.delete').attr("data-id",data['Id']);
  $('.update').attr("data-id",data['Id']);
  $('.edit').show();
  $('.delete').show();
  $('.update').hide();
  $('.save').hide();

});

//////////////////////////////////////////////////////////////////////
$('#modaldept').modal({
  keyboard: true,
  //backdrop: "static",
  show: false,
  
}).on('shown.bs.modal', function(event){
  
  let pageTitle = $(".pageTitle").text();
  let getIdFromRow = $(event.relatedTarget);
  let data = getIdFromRow.data();
 
  $("#deptname").val(data['Name']);
  $("#locationname").val(data['Location']);
  $('#exampleModalLongTitledept').html(`${data['Name']}`);
  
  $('.edit').attr("data-id",data['Id']);
  $('.delete').attr("data-id",data['Id']);
  $('.update').attr("data-id",data['Id']);
  $('.edit').show();
  $('.delete').show();
  $('.update').hide();
  $('.save').hide();

});

//////////////////////////////////////////////////////////////////////
$('#modalloc').modal({
  keyboard: true,
  //backdrop: "static",
  show: false,
  
}).on('shown.bs.modal', function(event){
  
  let pageTitle = $(".pageTitle").text();
  let getIdFromRow = $(event.relatedTarget);
  let data = getIdFromRow.data();
 
  $("#locname").val(data['Name']);
  $('#exampleModalLongTitleloc').html(`${data['Name']}`);

  $('.edit').attr("data-id",data['Id']);
  $('.delete').attr("data-id",data['Id']);
  $('.update').attr("data-id",data['Id']);
  $('.edit').show();
  $('.delete').show();
  $('.update').hide();
  $('.save').hide();

});

//////////////////////////////////////////////////////////////////////
$('#confirmation').modal({
  keyboard: true,
  show: false,
  
}).on('show.bs.modal', function(event){
  
  let button = event.relatedTarget;
  let dataId = button.getAttribute('data-id');
  $(this).find('.del-ok').attr('data-id', dataId);
  

});


///////////////////////////////////////////////////////////////////////////////////////
const editRecord4 = function(event){
  
  event.preventDefault();
  let url, dataId, html, idDelete, pageTitle, dataTxt = "";
  let button = event.target;
  dataId = button.getAttribute('data-id');
  dataTxt = button.innerText;
  pageTitle = $(".pageTitle").text();

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
          let departments = results.data.departments;
          let locations = results.data.locations;
          let locationID, departmentID;

          //html = `<form>`;

          if(pageTitle == "Personnel"){
            departmentID = tableRow.departmentID;
            $(".firstname").val(tableRow['firstName']);
            $(".lastname").val(tableRow['lastName']);
            $(".jobtitle").val(tableRow['jobTitle']);
            $(".email").val(tableRow['email']);
            //$("#department").val(tableRow['Department']);
            let htmlSelect = "";
            htmlSelect = `<select class="custom-select" name="departmentID" id="departmentID">`;
            departments.forEach(option=>{
              htmlSelect += `<option value="${option.id}" name="departmentID" data-id="${option.id}" ${option.id==departmentID ? "selected":""}>${option.name}</option>`;
            });
            htmlSelect += `</select>`
            $(".deptsel").html(htmlSelect);
            $('#exampleModalLongTitle4').html(`${tableRow['firstName']} ${tableRow['lastName']}`);
            ///////////////////////////////////////
          } else if(pageTitle == "Departments"){
            locationID = tableRow.locationID;
            $('#exampleModalLongTitledeptedit').html(`${tableRow['name']}`);
            $(".edeptname").val(tableRow['name']);
            let htmlSelect = "";
            htmlSelect = `<select class="custom-select" name="elocationname" id="elocationname">`;
            locations.forEach(option=>{
              htmlSelect += `<option value="${option.id}" data-id="${option.id}" ${option.id==locationID ? "selected":""}>${option.name}</option>`;
            });
            htmlSelect += `</select>`
            $(".locsel").html(htmlSelect);

          } else if(pageTitle == "Locations"){
            $('#exampleModalLongTitlelocedit').html(`${tableRow['name']}`);
            $('#elocname').val(` ${tableRow['name']}`);
            
          }

          $('.update').attr("data-id",tableRow['id']);
          $('.update').show();
          
          
          
        } else if(dataTxt == "Delete"){
          if(typeof results.data.no.count === "undefined" || results.data.no.count == 0){
            
            $(".modal").modal("hide");
            $(".alert-warning").show();
            setTimeout(function(){
              $(".alert-warning").fadeOut(3000);
            }, 4000)
            
            $('.alert').alert();
          } else{
            
            let recFound = results.data.no.count;
            let pg = pageTitle == 'Departments' ? "Personnel" : "Departments";
            $("#confirmation").modal("hide");
            $('#nodelete').modal();
            $('#nodelete').modal().on('shown.bs.modal', function(){
              
              
              $("#nodelete .no").html(recFound);
              $("#nodelete .cat").html(pg);
            });

            $('#nodelete').modal().on('hidden.bs.modal', function(){
              $("#nodelete .no").html("");
              $("#nodelete .cat").html("");
            });
          }
         
          
          
//          getAll();
          if(pageTitle == "Departments"){
            let dataID = {id: "nav-dept"};
            getAll(dataID);
          } else if(pageTitle == "Locations"){
            let dataID = {id: "nav-loc"};
            getAll(dataID);
          } else{
            let dataID = {id: "nav-pers"};
            getAll(dataID);
          }
        }
      
    } 
  }, 
  error: function(jqXHR, textStatus, errorThrown) {
    // your error code
    console.log("No data coming from deleteByID.php and getPersonnel.php file");
}
    
   });

  }


///////////////////////////////////////////////////////////////////////////////////////////////
const update = function(e){
  e.preventDefault();
  let url, html, dataTarget;
  let id = $(this).data('id');
  let pageTitle = $(".pageTitle").text();

  switch(pageTitle){
    case "Personnel":
      dataTarget = "#modal4";
      break;
    case "Departments":
      dataTarget = "#modaldeptedit";
      break;
    case "Locations":
      dataTarget = "#modallocedit";
      break;
  }

   $.ajax({
    url: "./libs/php/update.php",
    type: "POST",
    data: $(`${dataTarget} form`).serialize()+"&title="+pageTitle+"&id="+id,
    dataType: "json",
    success: function(results){
      
      if (results.status.name == "ok"){
          let personRow = results.data.updateData[0];
          let departments = results.data.departments;
          let locations = results.data.locations;
          let locationID, departmentID;
          
          if(pageTitle == "Personnel"){
            departmentID = personRow.departmentID;
            $(".firstname").val(personRow['firstName']);
            $(".lastname").val(personRow['lastName']);
            $(".jobtitle").val(personRow['jobTitle']);
            $(".email").val(personRow['email']);
            
            let htmlSelect = "";
            htmlSelect = `<select class="custom-select" name="departmentID" id="departmentID">`;
            departments.forEach(option=>{
              htmlSelect += `<option value="${option.id}" name="departmentID" data-id="${option.id}" ${option.id==departmentID ? "selected":""}>${option.name}</option>`;
            });
            htmlSelect += `</select>`;
            $(".deptsel").html(htmlSelect);
            ///////////////////////////////////////
          } else if(pageTitle == "Departments"){
            locationID = personRow.locationID;
            $(".edeptname").val(personRow['name']);
            let htmlSelect = "";
            htmlSelect = `<select class="custom-select" name="elocationname" id="elocationname">`;
            locations.forEach(option=>{
              htmlSelect += `<option value="${option.id}" data-id="${option.id}" ${option.id==locationID ? "selected":""}>${option.name}</option>`;
            });
            htmlSelect += `</select>`;
            $(".locsel").html(htmlSelect);
            
          } else if(pageTitle == "Locations"){
            $(".elocname").val(personRow['name']);
          }

      if(pageTitle == "Personnel"){
        $('#exampleModalLongTitle4').html(`${personRow['firstName']} ${personRow['lastName']}`);
      } else if(pageTitle == "Departments"){
        $('#exampleModalLongTitledeptedit').html(`${personRow['name']}`);
      } else if(pageTitle == "Locations"){
        $('#exampleModalLongTitlelocedit').html(`${personRow['name']}`);
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

///////////////////////////////////////////////////////////////////////////////////////////////
const create = function(e){
  let url, data, pageTitle;
  
  pageTitle = $(".pageTitle").text();
  $('.save').show();
  if(pageTitle == "Personnel"){
    $(".datatarget").attr("data-target", "#modal5");
} else if(pageTitle == "Departments"){
  $(".datatarget").attr("data-target", "#modaldeptnew");
} else if(pageTitle == "Locations"){
  $(".datatarget").attr("data-target", "#modallocsave");
}
 
  $('#nfirstname').val('');
  $('#nlastname').val('');
  $('#njobtitle').val('');
  $('#nemail').val('');
  $('#ndepartment').val('');
  

  $.ajax({
    url: "./libs/php/newLocDept.php",
    type: "POST",
    data: {title: pageTitle},
    dataType: "json",
    success: function(results){
      let updateData = results.data.updateData;

      let htmlNew ="";
        
      if(pageTitle == "Personnel"){
      
        htmlNew += `<select class="custom-select" name="departmentIDnew" id="ndepartment">`;
                  updateData.forEach(option=>{
            htmlNew += `<option value="${option.id}" data-id="${option.id}"} >${option.name}</option>`;
                  });
          htmlNew +=`</select>`;
         $('#modal5 .deptsel').html(htmlNew);
      
        } else if(pageTitle == "Departments"){
          htmlNew += `<select class="custom-select" name="locationID" id="locationID">`;
                    updateData.forEach(option=>{
              htmlNew += `<option value="${option.id}" data-id="${option.id}"}>${option.name}</option>`;
                    });
            
            htmlNew +=`</select>`;
          $('#modaldeptnew .locsel').html(htmlNew);
      
          }

          
     
  
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // your error code
      console.log("No data coming from update.php file");
  }
  });


}

///////////////////////////////////////////////////////////////////////////////////////////////
const saveRec = function(){
  let dataTarget;
  let pageTitle = $(".pageTitle").text();
  
  switch(pageTitle){
    case "Personnel":
      dataTarget = "#modal5";
      break;
    case "Departments":
      dataTarget = "#modaldeptnew";
      break;
    case "Locations":
      dataTarget = "#modallocsave";
      break;
  }

  $.ajax({
    url: "./libs/php/insertRecord.php",
    type: "POST",
    data: $(`${dataTarget} form`).serialize()+"&title="+pageTitle,
    dataType: "json",
    success: function(results){
      if (results.status.name == "ok"){
      
      //$("#modal5 .formModal5").html("Successfully created");
      $(".modal").modal("hide");
      //$("#modal5").modal("hide");
      $(".alert-success").show();
      setTimeout(function(){
        $(".alert-success").fadeOut(3000);
      }, 4000)
      
      $('.alert').alert();

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

///////////////////////////////////////////////////////////////////////////////////////////////

   
$("#navUl").on("click", function(){
  $("#main-section").show("slow");
});

///////////////////////////////////////////////////////////////////////////////////////////////
let lodaingID = {id: "nav-pers"};
getAll(lodaingID);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //sidebar function
  var toggleBtn = document.querySelector('.sidebar-toggle');
  var sidebar = document.querySelector('.sidebar');
  
  toggleBtn.addEventListener('click', function() {
    toggleBtn.classList.toggle('is-closed');
    sidebar.classList.toggle('d-none');
    
  });

  $('#main-section').click(function(e){
    $('.sidebar').hide();
 });

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(".getalldata").on("click", getAll);
$(".allDept").on("click", getAll);
$(".allLoc").on("click", getAll);
$(".edit").on("click", editRecord4);
$(".del-ok").on("click", function(e){
  editRecord4(e);
});
$(".update").on("click", update);
$(".new").on("click", create);
$(".newicon").on("click", create);
$(".save").on("click", saveRec);
$(".dupdate").on("click", update);

});
  
//});

