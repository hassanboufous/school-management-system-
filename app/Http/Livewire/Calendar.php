<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class Calendar extends Component
{
    public $events = '';

    public function getevent()
    {
       // $events = Event::select('id','title','start');
        $events = DB::table('events')->pluck('id', 'title', 'start');

        return  json_encode($events);
    }


    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        Event::create($input);
    }


    public function eventDrop($event, $oldEvent)
    {
      $eventdata = Event::findOrFail($event['id']);
      $eventdata->start = $event['start'];
      $eventdata->save();
    }


    public function render()
    {
        $events = DB::table('events')->pluck('id', 'title', 'start');

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}
