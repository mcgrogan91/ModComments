<?php require_once(base_path().'/vendor/iamcal/lib_autolink/lib_autolink.php'); ?>
<div id='comments' style='padding-bottom:15px;'>
  @foreach($comments as $comment)
   {{ date('M d Y,  H:i:s', strtotime($comment['created_at'])) }}: {!! autolink(e($comment['comment_text']), 100) !!} - {{ $comment['mod_name'] }} <br/>
  @endforeach
</div>
