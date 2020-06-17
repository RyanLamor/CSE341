var http = require('http');
var url = require("url");

function onRequest(req, res){
  const myURL = url.parse(req.url);
  var pathname = myURL.pathname;
  console.log("Request for " + pathname + " received.");

  if (pathname == "/home"){
    res.writeHead(200, {"Content-Type": "text/html"});
    res.write("<h1>Hello World</h1>");
    res.end();
  }
  else if (pathname == "/getData"){
    var jsonObj = {"Name":"Ryan Lamoreaux","Class":"CSE341"};
    res.writeHead(200, {"Content-Type": "text/html"});
    for(var attributename in jsonObj){
      res.write("<b>" + attributename+"</b>: "+ jsonObj[attributename] + "<br>");
    }
    res.end();
  }else {
    res.writeHead(404, {"Content-Type": "text/html"});
    res.write("<h1>Error 404 <br> Page Not Found</h1>");
    res.end();
  }
}

var server = http.createServer(onRequest);
server.listen("8888");
