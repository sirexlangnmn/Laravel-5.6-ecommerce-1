<script>
    $(function(){
        $("#expiry_date").datepicker({ 
          minDate: 0,
          dateFormat: 'yy-mm-dd'
        });
    });
</script>

<script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script> 
<script src="{{ asset('backend_assets/js/bootstrap.min.js') }}"></script> 
{{-- site analytics --}}
<script src="{{ asset('backend_assets/js/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('backend_assets/js/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('backend_assets/js/jquery.peity.min.js') }}"></script> 
{{-- site analytics --}}
<script src="{{ asset('backend_assets/js/matrix.js') }}"></script> 
<script src="{{ asset('backend_assets/js/matrix.dashboard.js') }}"></script> 
<script src="{{ asset('backend_assets/js/jquery.validate.js') }}"></script> 
<script src="{{ asset('backend_assets/js/matrix.form_validation.js') }}"></script> 
<script src="{{ asset('backend_assets/js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('backend_assets/js/select2.min.js') }}"></script> 
<script src="{{ asset('backend_assets/js/matrix.popover.js') }}"></script> 
<script src="{{ asset('backend_assets/js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('backend_assets/js/matrix.tables.js') }}"></script> 
<script src="{{ asset('backend_assets/js/sweetalert.min.js') }}"></script>

{{-- datetimepicker --}}
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<script src="{{ asset('backend_assets/js/datetimpicker-online.js') }}"></script>


<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}



</script>

</body>
</html>


