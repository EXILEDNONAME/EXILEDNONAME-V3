@extends('layouts.app')

@push('content')
@stack('extension')
<div class="row">
  <div class="col-xl-12">
    <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b">

      <div class="card-header" style="">
        <div class="card-title">
          <h5 class="text-dark font-weight-bold"> Main </h5>
        </div>

        <div class="card-toolbar">
          <a href="{{ URL::current() }}/create" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip" title="" data-original-title="Create"><i class="fas fa-plus"></i></a>
          <a id="file-refresh" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip" title="" data-original-title="Refresh"><i class="la la-refresh"></i></a>
          <div class="dropdown dropdown-inline">
            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-level-down-alt"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="navi navi-hover py-5">
                <li class="navi-item">
                  <a href="javascript:void(0);" id="export_copy" class="navi-link">
                    <i class="navi-icon fa fa-copy"></i>
                    <span class="kt-nav__link-text" data-toggle="kt-tooltip" title="" data-original-title="Copy As Text"> {{ trans('button.index.export-copy') }} </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="javascript:void(0);" id="export_excel" class="navi-link">
                    <i class="navi-icon fa fa-file-excel"></i>
                    <span class="kt-nav__link-text" data-toggle="kt-tooltip" title="" data-original-title="Export To Excel"> {{ trans('button.index.export-excel') }} </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="javascript:void(0);" id="export_pdf" class="navi-link">
                    <i class="navi-icon fa fa-file-pdf"></i>
                    <span class="kt-nav__link-text" data-toggle="kt-tooltip" title="" data-original-title="Export To PDF"> {{ trans('button.index.export-pdf') }} </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="javascript:void(0);" id="export_csv" class="navi-link">
                    <i class="navi-icon fa fa-file"></i>
                    <span class="kt-nav__link-text" data-toggle="kt-tooltip" title="" data-original-title="CSV"> {{ trans('button.index.export-csv') }} </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="javascript:void(0);" id="export_print" class="navi-link">
                    <i class="navi-icon fa fa-print"></i>
                    <span class="kt-nav__link-text" data-toggle="kt-tooltip" title="" data-original-title="Print"> {{ trans('button.index.export-print') }} </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body d-flex">

        @if ($message = Session::get('success'))
        <div id="toast-container" class="toast-bottom-right">
          <div class="toast toast-success" aria-live="polite" style="">
            <div class="toast-message">{{ $message }}</div>
          </div>
        </div>
        @endif

        <div class="table-responsive">
          <div class="align-items-center">
            <div class="col-lg-9 col-xl-8">
              <div class="row align-items-center">

                <div class="col-md-4 my-2 my-md-0">
                  <div class="d-flex align-items-center">
                    <select data-column="-2" class="form-control filter-active">
                      <option value=""> - Select Active - </option>
                      <option value="1"> Yes </option>
                      <option value="2"> No </option>
                    </select>
                  </div>
                </div>

                @stack('filter-header')

              </div>
            </div>
          </div>


          <hr>
          <table width="100%" class="table table-striped-table-bordered table-hover table-checkable" id="exilednoname">
            <thead>
              <tr>
                <th class="no-export"> </th>
                <th> No. </th>
                @if ( !empty($content) && $content == 'withStatus')
                <th class="no-export"> Status </th>
                @endif
                @stack('content-head')
                <th class="no-export"> Active </th>
                <th class="no-export"> Action </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      <div class="collapse" id="kt_datatable_group_action_form">
        <ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
          <li class="nav-item" data-toggle="tooltip" title="{{ trans('button.index.export-copy-selected') }}" data-placement="left">
            <a data-url="" id="export_selected_copy" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip">
              <i class="text-dark fa fa-copy"></i>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" title="{{ trans('button.index.export-print-selected') }}" data-placement="left">
            <a data-url="" id="export_selected_print" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip">
              <i class="text-info fas fa-print"></i>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" title="{{ trans('button.index.export-pdf-selected') }}" data-placement="left">
            <a data-url="" id="export_selected_pdf" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip">
              <i class="text-danger fas fa-file-pdf"></i>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" title="{{ trans('button.index.export-excel-selected') }}" data-placement="left">
            <a data-url="" id="export_selected_excel" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip">
              <i class="text-success fas fa-file-excel"></i>
            </a>
          </li>
          <li class="nav-item">
            <div class="dropdown-divider"></div>
          </li>
          <li class="nav-item" data-toggle="tooltip" title="{{ trans('button.index.delete-selected') }}" data-placement="left">
            <a data-url="" class="delete-all btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip">
              <i class="text-danger flaticon2-trash"></i>
            </a>
          </li>
        </ul>
      </div>

    </div>
  </div>
</div>

@include('includes.activities')
@endpush

@push('js')
<script src="/assets/backend/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
<script>
"use strict";
var KTDatatablesExtensionsKeytable = function() {

  var initTable2 = function() {
    var table = $('#exilednoname').DataTable({
      processing: true,
      serverSide: true,
      searching: true,
      rowId: 'id',
      select: {
        style: 'multi',
        selector: 'td:first-child .checkable',
      },
      ajax: {
        url: "{{ URL::current() }}",
        "data" : function (d) {
          d.filter_active = $('#filter_active').val();
          @stack('filter-function')
        }
      },
      headerCallback: function(thead, data, start, end, display) {
        thead.getElementsByTagName('th')[0].innerHTML = `
        <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
        <input type="checkbox" value="" class="group-checkable"/>
        <span></span>
        </label>`;
      },

      "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
      buttons: [
        {
          extend: 'print',
          exportOptions: {
            columns: "thead th:not(.no-export)"
          },
        },
        {
          extend: 'copyHtml5',
          autoClose: 'true',
          exportOptions: {
            columns: "thead th:not(.no-export)"
          },
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)"
          },
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)"
          },
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)"
          },
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            rows: { selected: true }
          },
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            rows: { selected: true }
          },
        },
        {
          extend: 'copyHtml5',
          autoClose: 'true',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            rows: { selected: true }
          },
        },
        {
          extend: 'print',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            rows: { selected: true }
          },
        },
      ],
      @stack('column-defs')
      columns: [
        {
          data: 'checkbox', orderable: false, orderable: false, searchable: false, 'width': '1',
          render : function ( data, type, row) { return '<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" data-id="' + row.id + '" class="checkable"><span></span></label>'; },
        },
        {
          data: 'autonumber', orderable: false, orderable: false, searchable: false, 'width': '1',
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        @stack('content-body')
        {
          data: 'active', orderable: true, 'className': 'align-middle text-center', 'width': '1',
          render: function ( data, type, row ) {
            if ( data == 0) { return ''; }
            if ( data == 1 ) { return '<a href="javascript:void(0);" id="disable" data-toggle="tooltip" data-original-title="Disable" data-id="' + row.id + '"><span class="label label-info label-inline"> Yes </span></a>'; }
            if ( data == 2 ) { return '<a href="javascript:void(0);" id="enable" data-toggle="tooltip" data-original-title="Enable" data-id="' + row.id + '"><span class="label label-dark label-inline"> No </span></a>'; }
          }
        },
        {
          data: 'action', orderable: false, orderable: false, searchable: false, 'width': '1',
          render : function ( data, type, row) {
            return ''+
            '<div class="dropdown dropdown-inline">'+
            '<button type="button" class="btn btn-hover-light-info btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>'+
            '<div class="dropdown-menu dropdown-menu-xs" style=""><ul class="navi navi-hover py-5">'+
            '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '" class="navi-link"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text">View</span></a></li>'+
            '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '/edit" class="navi-link"><span class="navi-icon"><i class="flaticon2-contract"></i></span><span class="navi-text">Edit</span></a></li>'+
            '<li class="navi-item"><a href="javascript:void(0);" class="navi-link" id="delete" data-id="' + row.id + '"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text delete"> Delete</span></a></li>';
          },
        },
      ],
      order: [[1, 'asc']]
    });

    $('.filter-active').change(function () {
      table.column(-2)
      .search( $(this).val() )
      .draw();
    });

    @stack('filter-data')

    $("#file-refresh").on("click", function() { table.ajax.reload(); });
    $('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
    $('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
    $('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
    $('#export_csv').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
    $('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(4).trigger(); });
    $('#export_selected_pdf').on('click', function(e) { e.preventDefault(); table.button(5).trigger(); });
    $('#export_selected_excel').on('click', function(e) { e.preventDefault(); table.button(6).trigger(); });
    $('#export_selected_copy').on('click', function(e) { e.preventDefault(); table.button(7).trigger(); });
    $('#export_selected_print').on('click', function(e) { e.preventDefault(); table.button(8).trigger(); });

    table.on('change', '.group-checkable', function() {
      var set = $(this).closest('table').find('td:first-child .checkable');
      var checked = $(this).is(':checked');

      $(set).each(function() {
        if (checked) {
          $(this).prop('checked', true);
          table.rows($(this).closest('tr')).select();
          var checkedNodes = table.rows('.selected').nodes();
          var count = checkedNodes.length;
          $('#kt_datatable_selected_records').html(count);
          if (count > 0) {
            $('#kt_datatable_group_action_form').collapse('show');
          }
        }
        else {
          $(this).prop('checked', false);
          table.rows($(this).closest('tr')).deselect();
          $('#kt_datatable_group_action_form').collapse('hide');
        }
      });
    });

    table.on('draw.dt', function() {
      $('#kt_datatable_group_action_form').collapse('hide');
    });

    table.on('change', '.checkable', function() {
      var checkedNodes = table.rows('.selected').nodes();
      var count = checkedNodes.length;
      $('#kt_datatable_selected_records').html(count);
      if (count > 0) {
        $('#kt_datatable_group_action_form').collapse('show');
      } else {
        $('#kt_datatable_group_action_form').collapse('hide');
      }
    });

    $('#kt_datatable_fetch_modal').on('show.bs.modal', function(e) {
      var exilednonameArr = [];
      $(".selected").each(function() {
        exilednonameArr.push($(this).attr('id'));
      });
      var strEXILEDNONAME = exilednonameArr.join(",");
      console.log(strEXILEDNONAME);
    });

    $('body').on('click', '#enable', function () {
      var id = $(this).data("id");
      $.ajax({
        type: "get",
        url: "{{ URL::current() }}/enable/"+id,
        processing: true,
        serverSide: true,
        success: function (data) {
          var oTable = $('#exilednoname').dataTable();
          oTable.fnDraw(false);
          toastr.options = { "positionClass": "toast-bottom-right" };
          toastr.success("{{ trans('notification.success.active.enable') }}");
        },
        error: function (data) {
          //
        }
      });
    });

    $('body').on('click', '#disable', function () {
      var id = $(this).data("id");
      $.ajax({
        type: "get",
        url: "{{ URL::current() }}/disable/"+id,
        processing: true,
        serverSide: true,
        success: function (data) {
          var oTable = $('#exilednoname').dataTable();
          oTable.fnDraw(false);
          toastr.options = { "positionClass": "toast-bottom-right" };
          toastr.success("{{ trans('notification.success.active.disable') }}");
        },
        error: function (data) {
          //
        }
      });
    });

    $('.delete-all').on('click', function(e) {
      var exilednonameArr = [];
      $(".selected").each(function() {
        exilednonameArr.push($(this).attr('id'));
      });
      var strEXILEDNONAME = exilednonameArr.join(",");

      if (confirm('Are you sure you want to permanently delete this comment?')){
        $.ajax({
          url: "{{ URL::current() }}/deleteall",
          type: 'get',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: 'EXILEDNONAME='+strEXILEDNONAME,
          success: function (data) {
            var oTable = $('#exilednoname').dataTable();
            oTable.fnDraw(false);
            toastr.options = { "positionClass": "toast-bottom-right" };
            toastr.success("{{ trans('notification.success.status') }}");
          },
          error: function (data) {
            //
          }
        });
      }
    });

    $('body').on('click', '#delete', function () {
      var id = $(this).data("id");
      if(confirm("Are You sure want to delete !")){
        $.ajax({
          type: "get",
          url: "{{ URL::current() }}/delete/"+id,
          success: function (data) {
            var oTable = $('#exilednoname').dataTable();
            oTable.fnDraw(false);
            toastr.options = { "positionClass": "toast-bottom-right" };
            toastr.success("{{ trans('notification.success.delete') }}");
          },
          error: function (data) {
            //
          }
        });
      }
    });

  };

  return {
    init: function() {
      initTable2();
    },
  };

}();

jQuery(document).ready(function() {
  KTDatatablesExtensionsKeytable.init();
});
</script>
@endpush
