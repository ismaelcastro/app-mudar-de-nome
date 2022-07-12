@php
    $type = $fields['type'];
    $key = $fields['key'];
    $label = $fields['label'];
    $class = $fields['class'];
    $class_parent = $fields['class_parent'] ?? 'col-sm-6';
    $info = (isset($fields['info']) ? $fields['info'] : '' );

    $thisValue = (isset($setting[$key]) ? $setting[$key] : null );
@endphp
<div class="{{$class_parent}}">
    <div class="form-group">    
        @if ($type == 'select')
            {{ Form::label($key, $label) }} 
            @php
                $list_field = $fields['option'];
            @endphp
            {{ Form::$type($key, $list_field,$thisValue,['class' => $errors->has($key) ?  "{$class} is-invalid" : $class]) }}
        @elseif($type == 'multiple')
            {{ Form::label($key, $label) }} 
            @php
                $list_field = $fields['option'];
                $thisValue = (!is_null($thisValue) ? explode(',',$thisValue) : $thisValue );
            @endphp
            {{ Form::select($key, $list_field,$thisValue,['class' => $errors->has($key) ?  "{$class} is-invalid" : $class, 'name' => $key.'[]', 'multiple' => 'multiple']) }}
        @elseif($type == 'title')
            <hr>
            <h4>{{$label}}</h4>
        @else
            {{ Form::label($key, $label) }} 
            {{ Form::$type($key, $thisValue, ['class' => $errors->has($key) ?  "{$class} is-invalid" : $class]) }}
        @endif
            

        @include('admin.partials._help_block',['field' => $key])
    </div>
</div>