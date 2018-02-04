<?php


namespace Modules\Sonos\Thing;

use App\Things\Speaker\Speaker;
use Modules\Sonos\Binding\SonosBinding;


/**
 * Class Sonos
 * @package App\Things\Speaker
 */
class Sonos extends Speaker
{

    public function __construct($meta)
    {
        $this->thing = new SonosBinding($meta->ip);
        $this->channels = $this->getChannels($this);
    }


    public function play()
    {
        $this->thing->Play();
        // set status for frontend
        $this->setStatus('ON');
    }

    public function pause()
    {
        $this->thing->Pause();
        // Set status for frontend
        $this->setStatus('OFF');
    }

    public function on($lv_cmd = null)
    {
        $this->thing->Play();
        // set status for frontend
        $this->setStatus('ON');
    }

    public function off($lv_cmd = null)
    {
        $this->thing->Pause();
        // set status for frontend
        $this->setStatus('OFF');
    }


    public function output()
    {
        switch ($this->thing->GetTransportInfo()) {
            case
            'PLAYING':
                echo 1;
                break;
            case 'PAUSED_PLAYBACK':
                echo 0;
                break;
            case 'STOP':
                echo 0;
                break;
            default:
                echo 0;
                break;
        }
        return true;
    }

    public function discover()
    {
        // TODO: Implement discover() method.
    }

    public function onSuccess()
    {
        // TODO: Implement onSuccess() method.
    }

    /**
     * Next Track
     */
    public function next()
    {
        $this->thing->Next();
    }

    /**
     * Previous Track
     */
    public function previous()
    {
        $this->thing->Previous();
    }

    public function setVolume()
    {
        $this->thing->SetVolume($this->getInput());
    }

    public function getVolume()
    {
        echo $this->thing->GetVolume();
        return $this->thing->GetVolume();
    }

    /**
     * Mute On
     */
    public function muteOn()
    {
        $this->thing->SetMute(1);
    }

    /**
     * Mute Off
     */
    public function muteOff()
    {
        $this->thing->setMute(0);
    }

    /**
     * Return Mute State
     *
     * @return mixed
     */
    public function getMute()
    {
        return $this->thing->getMute();
    }
}