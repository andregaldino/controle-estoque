@if ($errors->has())
<p style="color:red;" class="text-center">
  @foreach ($errors->all() as $error)
    {!! $error !!}<br />		
  @endforeach
</p>
@endif