 <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('main-sidebar.add-parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('parents.father.email') }}</th>
            <th>{{ trans('parents.father.name.ar') }}</th>
            <th>{{ trans('parents.father.nationality') }}</th>
            <th>{{ trans('parents.father.identity') }}</th>
            <th>{{ trans('parents.father.phone') }}</th>
            <th>{{ trans('parents.father.job.ar') }}</th>
            <th>{{ trans('grades.processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($my_parents as $my_parent)
            <tr>
                <?php $i++; ?>
                  <td>{{ $i }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->father_name }}</td>
                <td>{{ $my_parent->nationality->name }}</td>
                <td>{{ $my_parent->father_identity }}</td>
                <td>{{ $my_parent->father_phone }}</td>
                <td>{{ $my_parent->father_job }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('grades.edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
 </div>
</div>

