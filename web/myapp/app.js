var express = require("express");
var app = express();
const bodyParser = require('body-parser');

app.use(express.static("public"));

app.set("views", "views")
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true })); 


//------Controller------//
app.post("/getRate", function(req, res) {
  console.log("Received a request for the home page");
  var name = getCurrentLoggedInUserAccount();
  var title = "Postal Rate Calculator";
  var select = req.body.mailType;
  var weight = req.body.weight;
  var rate = calculateRate(select, weight);

  var params = {username: name, welcome: title, rates: rate, weight: weight, select: select};

  // renderHomePage(name);
  res.render("getRate", params);
});

app.listen(5005, function() {
  console.log("The server is up and listening on port 5000");
});

//------View------//
// function renderHomePage(name) {
//   res.write("<h1>This is the home page</h1>");
//   res.write("<h2>Welcome " + name + "</h2>");
//   res.end();
// }


//------Model-------//
function getCurrentLoggedInUserAccount() {
  return "Christopher";
}

function calculateRate(select, weight){
  switch (select) {
    case "stamped":
      if (weight <= 1) {
       var rate = "$" + 0.55;
       return rate;
      }
     else if (weight <= 2) {
        var rate = "$" + 0.75;
        return rate;
      }
      else if (weight <= 3) {
       var rate = "$" + 0.95;
        return rate;
     }
     else if (weight <= 3.5) {
       var rate = "$" + 1.15;
        return rate;
     }
     else {
       var rate = "Overweight, additional charges will be applied beyond $1.15";
       return rate;
     }

  case "metered":
    if (weight <= 1) {
    var rate = "$" + 0.51;
    return rate;
  }
  else if (weight <= 2) {
    var rate = "$" + 0.71;
    return rate;
  }
  else if (weight <= 3) {
    var rate = "$" + 0.91;
    return rate;
  }
  else if (weight <= 3.5) {
    var rate = "$" + 1.11;
    return rate;
  }
  else {
    var rate = "Overweight, additional charges will be applied beyond $1.11";
    return rate;
  }

  case "flats":
    if (weight <= 1) {
      var rate = "$" + 1.00;
      return rate;
    }
    else if (weight <= 2) {
      var rate = "$" + 1.20;
      return rate;
    }
    else if (weight <= 3) {
      var rate = "$" + 1.40;
      return rate;
    }
    else if (weight <= 4) {
      var rate = "$" + 1.60;
      return rate;
    }
    else if (weight <= 5) {
      var rate = "$" + 1.80;
      return rate;
    }
    else if (weight <= 6) {
      var rate = "$" + 2.00;
      return rate;
    }
    else if (weight <= 7) {
      var rate = "$" + 2.20;
      return rate;
    }
    else if (weight <= 8) {
      var rate = "$" + 2.40;
      return rate;
    }
    else if (weight <= 9) {
      var rate = "$" + 2.60;
      return rate;
    }
    else if (weight <= 10) {
      var rate = "$" + 2.80;
      return rate;
    }
    else if (weight <= 11) {
      var rate = "$" + 3.00;
      return rate;
    }
    else if (weight <= 12) {
      var rate = "$" + 3.20;
      return rate;
    }
    else if (weight <= 13) {
      var rate = "$" + 3.40;
      return rate;
    }
    else {
      var rate = "Overweight, additional charges will be applied beyond $3.40";
      return rate;
    }

    case "retail":
      if (weight <= 3.3) {
        var rate = "$" + 0.192;
        return rate;
      }
      else {
        var rate = "Overweight, additional charges will be applied beyond $0.192";
        return rate;
      }
  }
}