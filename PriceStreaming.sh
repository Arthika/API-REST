# Top of Book (TOB) Streaming request

curl -i --data '{"getPrice":{"user":"fedenice","password":"fedenice","customer":11,"security":["EUR_USD","EUR_GBP"],"interface":"Baxter_CNX"}}' http://certification.arthikatrading.com:81/cgi-bin/IHFTRestStreamer.cgi/getPrice --header 'Content-Type: application/json'

# Full Book Aggregated (FBA) Streaming request:

curl -i --data '{"getPrice":{"user":"fedenice","password":"fedenice","customer":11,"security":["EUR_USD"],"interface":"Baxter_CNX","granularity":"FBA","levels":3}}' http://certification.arthikatrading.com:81/cgi-bin/IHFTRestStreamer.cgi/getPrice --header 'Content-Type: application/json'
