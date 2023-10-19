<!DOCTYPE html>
<html>
<body>

<h2>Create post</h2>
@if(Session::has('success'))
    <p>{{ Session::get('success') }}</p>
@endif

@if(Session::has('fail'))
    {{ Session::get('fail') }}
@endif

<form action="{{ route('insert.posts') }}" method="POST">
@csrf
  <label for="fname">Title:</label><br>
  <input type="text" name="title"><br>
  <label for="lname">Description:</label><br>
  <input type="text" name="description"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>
