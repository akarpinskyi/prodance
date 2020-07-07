<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($school->title) ? $school->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="summary-ckeditor" >{{ isset($school->description) ? $school->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('supervisors') ? ' has-error' : ''}}">
    {!! Form::label('supervisors', 'Супервізор', ['class' => 'control-label']) !!}
    {!! Form::select('supervisors[]', $supervisors, isset($supervisors) ? $supervisors : [], ['class' => 'form-control', 'multiple' => true]) !!}
</div>

<div class="form-group{{ $errors->has('teachers') ? ' has-error' : ''}}">
    {!! Form::label('teachers', 'Вчитель', ['class' => 'control-label']) !!}
    {!! Form::select('teachers[]', $teachers, isset($teachers) ? $teachers : [], ['class' => 'form-control', 'multiple' => true]) !!}
</div>


{{--<div class="form-group {{ $errors->has('teachers') ? 'has-error' : ''}}">--}}
{{--    <label for="teachers" class="control-label">{{ 'Teachers' }}</label>--}}
{{--    <textarea class="form-control" rows="5" name="teachers" type="textarea" id="teachers" >{{ isset($school->teachers) ? $school->teachers : ''}}</textarea>--}}
{{--    {!! $errors->first('teachers', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}

{{--<div class="form-group{{ $errors->has('teachers') ? ' has-error' : ''}}">--}}
{{--    {!! Form::label('teachers', 'Виберіть вчителя ', ['class' => 'control-label']) !!}--}}
{{--    {!! Form::select('teachers[]', $teachers,  isset($teachers) ? $teachers : [], ['class' => 'form-control', 'multiple' => true]) !!}--}}
{{--    --}}{{--school->teachers--}}
{{--    {!! $errors->first('teachers', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}

{{--@foreach(moderators as moderator)--}}

{{--    <div class="form-group{{ $errors->has('moderators') ? ' has-error' : ''}}">--}}
{{--        {!! Form::label('moderators', 'Виберіть вчителя ', ['class' => 'control-label']) !!}--}}
{{--        {!! Form::select('moderators[]', $moderators,  isset($moderators) ? $moderators : [], ['class' => 'form-control', 'multiple' => true]) !!}--}}
{{--        --}}{{--school->teachers--}}
{{--        {!! $errors->first('moderators', '<p class="help-block">:message</p>') !!}--}}
{{--    </div>--}}

{{--@endforeach--}}



<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control" rows="5" name="address" type="textarea" id="address" >{{ isset($school->address) ? $school->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contact') ? 'has-error' : ''}}">
    <label for="contact" class="control-label">{{ 'Contact' }}</label>
    <input class="form-control" name="contact" type="text" id="contact" value="{{ isset($school->contact) ? $school->contact : ''}}" >
    {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_work') ? 'has-error' : ''}}">
    <label for="time_work" class="control-label">{{ 'Time Work' }}</label>
    <input class="form-control" name="time_work" type="text" id="time_work" value="{{ isset($school->time_work) ? $school->time_work : ''}}" >
    {!! $errors->first('time_work', '<p class="help-block">:message</p>') !!}
</div>


{{--<div class="form-group{{ $errors->has('users_id') ? ' has-error' : ''}}">--}}
{{--    {!! Form::label('Add teachers', 'Role:roles->name ', ['class' => 'control-label']) !!}--}}
{{--    {!! Form::select('users_id[]', $users_id, isset($users_id) ? $users_id : [], ['class' => 'form-control', 'multiple' => true]) !!}--}}

{{--    <label for="Add_teach" class="control-label">{{ 'Add teach' }}</label>--}}
{{--    <input class="form-control" name="user_id" type="text" id="user_id">--}}

{{--</div>--}}




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
