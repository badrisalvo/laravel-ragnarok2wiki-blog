@extends('template_backend.home')
@section('judul', 'Comments')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif
  <table class="table table-striped table-hover table-sm table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Date</th>
        <th>Comment</th>
        <th>Post Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($comments as $index => $comment)
        <tr>
          <td>{{ $comments->firstItem() + $index }}</td>
          <td>{{ $comment->user->name }}</td>
          <td>{{ $comment->created_at->format('d M Y') }}</td>
          <td>{{ $comment->comment }}</td>
          <td>{{ $comment->post->judul }}</td>
          <td>
            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
            </form>
            <a href="{{ route('blog.isi', $comment->post->slug) }}" class="btn btn-info btn-sm">View Post</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $comments->links() }}
@endsection
