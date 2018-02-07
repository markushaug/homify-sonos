## homify-sonos - Sonos Plug-in for homify
Control you Sonos-Devices with homify

## Features
- Control you Sonos-Device over the upnp-interface

## Coming soon
- Discover function, to discover all Sonos-devices in your local network (upnp-broadcast)


## Installation

1. Navigate into your homify folder
3. Run ```composer require markushaug/homify-sonos``` 

## Usage

The following json is required for the plug-in, when you create a new thing:
- ```{"default_on":"PLAY", "default_off": "STOP", "ip":"10.10.3.1"}```

Homify's routing is fully dynamically. You can use the following URL to access your things:

- ```https://<server_ip>/thing/<thing_name>/<channel>```

## Channels
The following channels are available.

- ```play``` 
- ```pause``` 
- ```on``` 
- ```off``` 
- ```output``` -> Status like 'PLAYING' / 'PAUSED_PLAYBACK' / 'STOP' / .. 
- ```next``` 
- ```previous```
- ```setVolume```
- ```getVolume```
- ```muteOn```
- ```muteOff```
- ```getMute```


