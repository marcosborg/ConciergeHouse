@extends('layouts.admin')
@section('content')
@can('header_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.headers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.header.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.header.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Header">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.header.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.subtitle') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.button') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.link') }}
                        </th>
                        <th>
                            {{ trans('cruds.header.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($headers as $key => $header)
                        <tr data-entry-id="{{ $header->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $header->id ?? '' }}
                            </td>
                            <td>
                                {{ $header->title ?? '' }}
                            </td>
                            <td>
                                {{ $header->subtitle ?? '' }}
                            </td>
                            <td>
                                {{ $header->button ?? '' }}
                            </td>
                            <td>
                                {{ $header->link ?? '' }}
                            </td>
                            <td>
                                @if($header->photo)
                                    <a href="{{ $header->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $header->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('header_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.headers.show', $header->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('header_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.headers.edit', $header->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('header_delete')
                                    <form action="{{ route('admin.headers.destroy', $header->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('header_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.headers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Header:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection