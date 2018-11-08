<tr data-index="{{ $index }}">
    <td>{!! Form::text('brands['.$index.'][name]', old('brands['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('brands['.$index.'][brand_url]', old('brands['.$index.'][brand_url]', isset($field) ? $field->brand_url: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>