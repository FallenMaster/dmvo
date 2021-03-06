@extends('master')

@section('title', $title)

@section('content')
   {!! $adminlink !!}

   <div class="">
      <a href="{{URL::to('/events')}}" class="smallbutton <?php if (Request::is('events')) {echo 'current';} ?>">Ближайшие</a>
      <a href="{{URL::to('/events/past')}}" class="smallbutton <?php if (Request::is('events/past')) {echo 'current';} ?>">Прошедшие</a>
      <a href="{{URL::to('/events/other')}}" class="smallbutton <?php if (Request::is('events/other')) {echo 'current';} ?>">Другие</a>
   </div>

   {!! Form::open(['url' => '/events/search' , 'id' => 'searchForm']) !!}
      {!! Form::text('eventTitle', $searchValue, ['style' => 'display: inline-block; width: calc(98% - 71px);', 'autofocus' => 'true']) !!}
      {!! Form::submit('Найти', ['style' => 'display: inline-block; margin-right: 0px;']) !!}
   {!! Form::close() !!}

   <ul class="old_events">
      @foreach ($events as $event)
         <li>
            <div><a href="{{URL::to('/')}}/events/{{$event->id}}">{{ $event->rus_date('j F', strtotime( $event->date_from ) ) }}<?php if ($event->date_from != $event->date_to) {echo ' - '.$event->rus_date('j F', strtotime($event->date_to) ); } if ($event->what_time) { echo ', '.$event->what_time; } ?></a></div>
            <a href="{{URL::to('/')}}/events/{{$event->id}}">{{ $event->title }}</a>
         </li>
      @endforeach
      @if(sizeof($events) == 0)
         По вашему запросу ничего не найдено
      @endif
   </ul>
   <script>document.getElementById('searchForm').onsubmit = function (event) { event.preventDefault(); var topic = document.querySelectorAll('input[name="eventTitle"]')[0]; window.location.href = this.action + '=' + encodeURIComponent(topic.value); };</script>
@endsection
