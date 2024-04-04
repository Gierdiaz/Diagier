@props(['errorMessages'])

@if($errorMessages)
<ul class="my-4">
  @foreach((array) $errorMessages as $message)
  <li>
    <span class="text-sm text-red-600 space-y-1"> {{$message}} </span>
  </li>
  @endforeach
</ul>
@endif