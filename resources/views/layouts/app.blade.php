@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>

@media (max-width: 768px) {
  .horizontal-scroll {
    display: flex;
    overflow-x: auto;
    white-space: nowrap;
    padding: 10px; /* Add padding for better visual appearance */
  }

  /* Optional: Add some styling to the items within the horizontal-scroll container */
  .horizontal-scroll > * {
    display: inline-block;
    margin-right: 10px; /* Add spacing between items */
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 5px;
  }
}
   thead , .panel-default>.panel-heading {
    color: #ffffff;
    background-color: #01a7b7;
    border-color: #01a7b7;
}
    .content{
        padding-top: 44px!important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        padding-left: 37px;
    }
    body:not(.layout-fixed) .main-sidebar .sidebar {
    overflow-y: clip!important;
}
.brand-link .brand-image {
    float: none;
}
.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active>.fa
    {
    background: #ac2468;
    padding: 6px;
    border-radius: 19px;
}

.sidebar {

    overflow-x:  clip!important;
    }
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #ff1a8d;
    color: #fff;
    border-radius: 32px;
}

[class*=sidebar-dark-] {
    background-color: #01a7b7;
}
[class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
    background-color: #ff1a8d57;
    color: #fff;
    border-radius: 32px;
}
</style>


@stop


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('.js-example-basic-multiple').select2();
});


</script>
<script>
    $(function () {
        $("table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    });
  </script>
@stop
