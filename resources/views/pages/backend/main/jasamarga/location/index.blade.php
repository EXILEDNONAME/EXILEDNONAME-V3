@extends('layouts.pages.index', ['header' => 'true'])
@push('title', 'JASAMARGA Locations')

@push('content-head')
<th> Name </th>
<th> Description </th>
@endpush

@push('content-body')
{ data: 'name' },
{ data: 'description' },
@endpush
