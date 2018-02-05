<?php
namespace Modules\Sonos\Thing;

use App\Models\Thing;
use App\Models\Room;
/**
 * Class CreateSonos
 */
class CreateSonos 
{
    /**
     * @var
     */
    private $data;
   
    /**
     * CreateSonos constructor.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Creates Thing
     */
    public function create(){
        $thingName = $this->data['thingname'];
        $thingType = 'Speaker';
        $binding = $this->data['binding'];
        $roomID = $this->data['room'];
        $json = json_decode($this->data['json']);
        $protocol = 'upnp';

        if(is_null($json->default_on) || is_null($json->default_off) || is_null($json->ip) ){
            return "Arguments missing";
        }
        
        $thing = new Thing;

        $thing->thing = $thingName;
        $thing->thingType = $thingType;
        $thing->binding = $binding;
        $thing->default_on = $json->default_on;
        $thing->default_off = $json->default_off;
        $thing->protocol = $protocol;
        $thing->ip = $json->ip;
        $thing->room_id = $roomID;
        $thing->state = 'OFF';
        
        $thing->save();

    }
}
