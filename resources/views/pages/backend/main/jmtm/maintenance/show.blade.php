@extends('layouts.pages.show', ['page' => 'show'])
@push('title', 'JMTM Maintenances')

@push('content-body')
<div class="table-responsive">
  <table width="100%" class="table table-stiped table-bordered">
    <tr>
      <td class="align-middle font-weight-bold"> Name </td>
      <td class="align-middle"> {{ $user->name }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Date Start </td>
      <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_start)->format('d F Y, H:i') }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Date End </td>
      <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_end)->format('d F Y, H:i') }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Title </td>
      <td class="align-middle"> {{ $data->title }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Troubleshoot </td>
      <td class="align-middle"> {{ $data->troubleshoot }} </td>
    </tr>
    <tr>
      <td class="align-middle font-weight-bold"> Description </td>
      <td class="align-middle"> {{ $data->description }} </td>
    </tr>
    @include('includes.datatable.page-show.main')
  </table>
</div>
<hr>
@endpush
