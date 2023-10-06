<h3>List Post</h3>
<a href="">Create posts</a>
<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Description</th>
  </tr>
  @foreach($posts as $post)
  <tr>
    @if ($post->id > 2)
    <td>{{ $post->id }}</td>
    <td>{{ $post->title }}</td>
    <td>{{ $post->description }}</td>
    @endif
  </tr>
  @endforeach

</table>
