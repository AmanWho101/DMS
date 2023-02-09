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

<!-- File Path Field -->
<div class="form-group col-sm-12">
    {!! Form::label('user Id', 'User Name:') !!}
  <select id="user_id" name="user_id" class='form-control'>
    <option>Please Select One...</option>
    @foreach ($user_id as $item)
        <option value="{{$item->id}}">{{$item->firstname.','.$item->lastname}}</option>    
    @endforeach
    <option></option>
  </select>
   
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.document.documents.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
