<div id='comments' style='padding-bottom:15px;'>
  @foreach($comments as $comment)
   {{ date('M d Y,  H:m:s', strtotime($comment['created_at'])) }}: {{ $comment['comment_text'] }} - {{ $comment['mod_name'] }} <br/>
  @endforeach
</div>
