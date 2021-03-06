@extends('layouts.custom.vms.show', ['page' => 'show'])
@push('title', 'VMS Maintenances')

@push('content-body')
<div class="table-responsive">
  <table width="100%" class="table table-stiped table-bordered">
    <tr>
      <td class="align-middle font-weight-bold"> Area </td>
      <td class="align-middle"> {{ $data->vms_directories->vms_areas->name }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Type </td>
      <td class="align-middle"> {{ $data->vms_directories->vms_types->name }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Lokasi </td>
      <td class="align-middle"> {{ $data->vms_directories->name }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Waktu Kerusakan </td>
      <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_start)->format('d F Y, H:i') }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Waktu Perbaikan </td>
      <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_end)->format('d F Y, H:i') }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Permasalahan </td>
      <td class="align-middle"> {{ $data->title }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Tindakan </td>
      <td class="align-middle"> {{ $data->troubleshoot }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Keterangan </td>
      <td class="align-middle"> {{ $data->description }} </td>
    </tr>
    @include('includes.datatable.page-show.main')
  </table>
</div>
<hr>
@endpush
