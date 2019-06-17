<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ContactStatusChange implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event_array)
    {        
        $event_data = (isset($event_array['event_data']) && !empty($event_array['event_data'])) ? $event_array['event_data'] : NULL;
        if($event_data){            
            $this->data['status'] = 'success'; // success or error
            $this->data['event_data'] = $event_data;            
        }        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('contact');
    }
    public function broadcastAs()
    {
        return 'status_change';
    }
    public function broadcastWith()
    {
        return $this->data;
    }

}
