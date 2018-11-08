<tr data-index="{{ $index }}">
    <td>{!! Form::text('industries['.$index.'][name]', old('industries['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('industries['.$index.'][slug]', old('industries['.$index.'][slug]', isset($field) ? $field->slug: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>