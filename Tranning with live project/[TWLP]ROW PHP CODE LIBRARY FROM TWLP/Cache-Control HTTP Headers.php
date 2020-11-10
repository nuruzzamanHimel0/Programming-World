HTTP 1.1 introduced a new class of headers, Cache-Control response headers, to give Web publishers more control over their content, and to address the limitations of Expires. You can set four different types of HTTP headers which will have different effects on our caches and on web browsers. If you use more than one type, they are prioritized in the order listed below:

Useful Cache-Control response headers include:
max-age=[seconds] — specifies the maximum amount of time that a representation will be considered fresh. Similar toExpires, this directive is relative to the time of the request, rather than absolute. [seconds] is the number of seconds from the time of the request you wish the representation to be fresh for.
s-maxage=[seconds] — similar to max-age, except that it only applies to shared (e.g., proxy) caches.
public — marks authenticated responses as cacheable; normally, if HTTP authentication is required, responses are automatically private.
private — allows caches that are specific to one user (e.g., in a browser) to store the response; shared caches (e.g., in a proxy) may not.
no-cache — forces caches to submit the request to the origin server for validation before releasing a cached copy, every time. This is useful to assure that authentication is respected (in combination with public), or to maintain rigid freshness, without sacrificing all of the benefits of caching.
no-store — instructs caches not to keep a copy of the representation under any conditions.
must-revalidate — tells caches that they must obey any freshness information you give them about a representation. HTTP allows caches to serve stale representations under special conditions; by specifying this header, you’re telling the cache that you want it to strictly follow your rules.
proxy-revalidate — similar to must-revalidate, except that it only applies to proxy caches.
Using Example:
You can set the headers in PHP by using:
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
Note that the exact headers used will depend on your needs (and if you need to support HTTP 1.0 and/or HTTP 1.1)