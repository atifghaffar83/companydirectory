// Returns an array of maxLength (or less) page numbers
// where a 0 in the returned array denotes a gap in the series.
// Parameters:
//   totalPages:     total number of pages
//   page:           current page
//   maxLength:      maximum size of returned array
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

//global variables      


// SEARCHING TABLE
function search() {
  let location = [];
  let department = [];
    let input, filter, table, tr, td, i, txtValue;
    let tdl, tdd, txtValuel, txtValued;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();

    $(".locul input:checked").each(function(){
      location.push($(this).val().toUpperCase());
  });
 $(".deptul input:checked").each(function(){
      department.push($(this).val().toUpperCase());
  });

    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    
    /* for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        
        if(location.length || department.length){
            if (location.indexOf(txtValue.toUpperCase()) > -1 &&
                department.indexOf(txtValue.toUpperCase()) > -1 &&
                txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
          }

        } else {
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
        }
        
      }       
    } */
// testting search filter togather//////////////////

for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[1];
  tdd = tr[i].getElementsByTagName("td")[2];
  tdl = tr[i].getElementsByTagName("td")[3];
  if (td || tdd || tdl) {
    txtValue = td.textContent || td.innerText;
    txtValued = tdd.textContent || tdd.innerText;
    txtValuel = tdl.textContent || tdl.innerText;
    
    let searchCheck = txtValue.toUpperCase().indexOf(filter);
    let depCheck = department.indexOf(txtValued.toUpperCase());
    let locCheck = location.indexOf(txtValuel.toUpperCase());
    
    if(location.length || department.length){
        if (locCheck > -1 && depCheck > -1 && locCheck > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
      }

    } else {
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
    }
    
  }       
}

///////////////////////////////////////////////////


    
  }

$("#myInput").on("keyup",search);


    
//filter function for location and department
const filter = function(){
  let location = [];
    let department = [];
/*     if(location || department){
        location = [];
        department = [];
    } */
    
    if($(".locul input:checked").length || $(".deptul input:checked").length){
        
    let table, tddep, tr, td, i, txtValue, tddepValue;
    $(".locul input:checked").each(function(){
        location.push($(this).val().toUpperCase());
    });
   $(".deptul input:checked").each(function(){
        department.push($(this).val().toUpperCase());
    });
/* console.log(department);
console.log(location); */
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        tddep = tr[i].getElementsByTagName("td")[2];

        if (td || tddep) {
          txtValue = td.textContent || td.innerText; //location filter
          tddepValue = tddep.textContent || tddep.innerText; // department filter
/*          let locCheck = location.indexOf(txtValue.toUpperCase());
            let depCheck = department.indexOf(tddepValue.toUpperCase()); */
        
            if ((location.indexOf(txtValue.toUpperCase()) > -1) && (department.indexOf(tddepValue.toUpperCase()) > -1)) {
              console.log(tr[i]);
              tr[i].style.display = "";
           /*    let tddept = tr[i].getElementsByTagName("td")[2];
              if (tddept) {
                let tddeptValue1 = tddept.textContent || tddept.innerText;
                if(department.indexOf(tddeptValue1.toUpperCase()) > -1){
                  let tdloc = tr[i].getElementsByTagName("td")[3];
                  if(tdloc){
                    let tdlocValue = tdloc.textContent || tdloc.innerText;
                    if(location.indexOf(tdlocValue.toUpperCase()) > -1){
                      console.log('Both');
                      tr[i].style.display = "";
                    }
                  }
                }
              }  */
            } else if((location.indexOf(txtValue.toUpperCase()) > -1) && (department.indexOf(tddepValue.toUpperCase()) == -1)){
              console.log("location");
              console.log(tr[i]);
              tr[i].style.display = "";
                /* let tdl = tr[i].getElementsByTagName("td")[3];
                if(tdl){
                  let tdlovValue = tdl.textContent || tdl.innerText;
                  if(location.indexOf(tdlovValue.toUpperCase()) > -1){
                    
                    tr[i].style.display = "";
                  }
                } */
                
            } else if((location.indexOf(txtValue.toUpperCase()) == -1) && (department.indexOf(tddepValue.toUpperCase()) > -1)){
              console.log("department");
              console.log(tr[i]);
              tr[i].style.display = "";

              /* let tdd = tr[i].getElementsByTagName("td")[2];
              if(tdd){
                let tddeptValue = tdd.textContent || tdd.innerText;
                if(department.indexOf(tddeptValue.toUpperCase()) > -1){
                  tr[i].style.display = "";
                }
              } */
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
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
    })
});
  
