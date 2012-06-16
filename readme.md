# Simple PHP class for getting links to songs in iTunes, Last.fm, Spotify and other music services


Available methods:

```
Class 'SongLinks'
	getItunesLink($song, $artist=null)
	getSpotifyLink($song, $artist=null)
	getSpotifyDirectLink($song, $artist=null)
	getLastfmLink($song, $artist=null, $apiKey)
	getMp3skullLink($song, $artist=null)
	getDilandauLink($song, $artist=null)
	getYoutubeSearchLink($song, $artist=null)
	getAmazonSearchLink($song, $artist=null)
```
View the `example.php` file for an example implementation.

### Collaborating
Feel free to request pulls to add new services and API implementations to the class, but note that the intention of the class is to provide a simple and fast way to get a link, so we'd like to keep everything in one file (the `SongLinks.php` file).

### Support
Questions? Feel free to email me at tom@tomttb.com or tweet me [@tschoffelen](http://www.twitter.com/tschoffelen).