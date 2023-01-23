<!-- File Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('file_name', 'File Name:') !!}
    {!! Form::text('file_name', null, ['class' => 'form-control']) !!}
</div>

<!-- File Path Field -->
<div class="form-group col-sm-12">
    {!! Form::label('file_path', 'File Path:') !!}
    {!! Form::text('file_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.document.documents.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
