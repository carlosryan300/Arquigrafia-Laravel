@extends('layouts.default')

@section('head')

<title>Arquigrafia - Badges de {{ $user->name }}</title>
<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/checkbox.css" />
<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/jquery.fancybox.css" />
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/photo.js"></script>
<script type='text/javascript'>
jQuery(document).ready(function()
{
   jQuery('#toggle').hide();
   jQuery('#toggle1').hide();
   jQuery('a#toggler').click(function()
  {
      jQuery('#toggle').toggle(300);
      return false;
   });
    jQuery('a#toggler1').click(function()
  {
      jQuery('#toggle1').toggle(300);
      return false;
   });
});
</script>
@stop

@section('content')
	<div id='badges_page'>
    <?php if (Auth::check()) {
      $user = Auth::user();
    ?>
    <a href="#" id="toggler"><h2 class="badges">Badges earned <img src="./img/arrow.png" alt="" > : </h2></a>
      <div id="toggle" style="display:none;">
        @if ($user->badges == null)
            <p id="no-badges">no badges</p>
        @endif
        <ul class="badges-list">
          @foreach($user->badges as $badge)
            <li id="badge_description"> <?php $badge->render(); ?></li>
          @endforeach
        </ul>
      </div>

    <a href="#" id="toggler1"><h2 class="badges">Remaining badges <img src="./img/arrow.png" alt="" > : </h2></a>
    <div id="toggle1" style="display:none;">
      <?php $badges_available = Badge::WhereNotRelatedToUser($user->id)->get();?>
      <?php if (!isset($badges_available)){ ?>
        <p id="no-badges">no badges available </p>

      <?php }
      else { ?>
        <ul class="badges-list">
          @foreach($badges_available as $badge)
            <li id="badge_description"><?php print $badge->render();?></li>
          @endforeach
        </ul>
      <?php } ?>
    </div>
  	<?php } ?>   
  </div>
@stop