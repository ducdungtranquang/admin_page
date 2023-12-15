const express = require("express");
const app = express();
const path = require("path");
// set the view engine to ejs
app.set("view engine", "ejs");

// use res.render to load up an ejs view file
app.use("/plugins", express.static("plugins"));
app.use("/dist", express.static("dist"));

// index page
app.get("/", function (req, res) {
  res.render("pages/index");
});

// about page
app.get("/about", function (req, res) {
  res.render("pages/about");
});

app.get("/iframe", function (req, res) {
    res.render("pages/iframe");
  });

app.listen(8080);
console.log("Server is listening on port 8080");
