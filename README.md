# googleSearch
this file can get base urls from google search result per each page

HOWTO USE ? 

1 - upload search.php on your host or localhost
2- use it like this : 

http://DOMAIN/search.php?q=YOUR_SEARCH_QUERY&p=1

q is your search query and your keywords , p is page number and c is page counter.

EXAMPLE 

http://DOMAIN/search.php?q=free%20vpn&p=5&c=2

special char and space are accepted in q parameter
p and c can be only integer and possitive , p would be consider one if you enter a wrong value and c would be consider zero.
