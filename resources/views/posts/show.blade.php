
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

<h3>Detail Post</h3>
<a href="{{ route('create.posts') }}">Create posts</a>

<table>
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Description</th>
  </tr>
  <tr>
    <td>{{ $post->id }}</td>
    <td>{{ $post->title }}</td>
    <td>{{ $post->description }}</td>
  </tr>
</table>

</body>
</html>
