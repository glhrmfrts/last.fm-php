last.fm-php
===========

A tiny, lazy php helper for dealing with the last.fm api. I created to scratch my own itch, but if it can help you, i'm glad.

## How to use it
It's pretty darn simple, just instantiate it and use it like the methods in the real api are:
```php
$lastfm = new LastFm($YOUR_API_KEY);

$cherTracks = $lastfm->artist->getTopTracks(array('artist' => 'Cher'));

$topHouseArtists = $lastfm->tag->getTopArtists(array('tag' => 'house'));
```

Danke!

