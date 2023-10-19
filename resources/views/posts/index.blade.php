
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h3>List Post</h3>
<a href="{{ route('create.posts') }}">Create posts</a>

<table>
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Description</th>
    <th>Edit</th>
  </tr>
  @foreach($posts as $post)
  <tr>
    @if ($post->id > 2)
    <td>{{ $post->id }}</td>
    <td>
      <a href="{{ route('show.posts', $post->id) }}">
      {{ $post->title }}
      </a>
    </td>
    <td>{{ $post->description }}</td>
    <td><a href="{{ route('edit.posts', $post->id) }}">
      Edit
    </a></td>
    @endif
  </tr>
  @endforeach
</table>

</body>
</html>
