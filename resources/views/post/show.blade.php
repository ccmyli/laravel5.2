<h1> {{{ $post->title }}}</h1>
<!-- @can('show-post',$post)
<a href="#">update</a>
@endcan -->
@can('update',$post)
<a href="#">update</a>
@endcan 