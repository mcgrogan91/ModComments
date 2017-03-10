<?php require_once(base_path().'/vendor/iamcal/lib_autolink/lib_autolink.php'); ?>
<div id='comments' style='padding-bottom:15px;'>
  @foreach($comments as $comment)
   {{ date('M d Y,  H:i:s', strtotime($comment['created_at'])) }}: {!! autolink(e($comment['comment_text']), 100) !!} - {{ $comment['mod_name'] }} <br/>
  @endforeach
</div>
<div>
    @if($profiles)
      <hr/>
      <p>Here are some comments from other profiles on this Ban Evasion Profile</p><br/>
      @foreach($profiles as $profile => $profileComments)
        <div>
          Profile ID: <a href = "/moderate/users/{{$profile}}">{{$profile}}</a><br/>
          <ul>
          @foreach($profileComments as $profileComment)
            <li style='padding-left:30px'>{{ date('M d Y,  H:i:s', strtotime($profileComment['created_at'])) }}: {!! autolink(e($profileComment['comment_text']), 100) !!} - {{ $profileComment['mod_name'] }} </li>
          @endforeach
          </ul>
        </div>
      @endforeach
    @endif
</div>
