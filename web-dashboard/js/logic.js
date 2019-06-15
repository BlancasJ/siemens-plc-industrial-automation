src="http://code.jquery.com/jquery-latest.js";
var lenp;
var m0;
var m1;
var m2;
var m3;
var m4;
var s1;
var s2;
var s3;
var s4;
var s5;
var count;
var xp;
var yp;
var t;
///////////////////////////// Funciones /////////////////////////////////////////

function sred() {
  var x = document.getElementById("traffic1");
  x.className = "semaforo rojo";
}

function sorange(){
  var x = document.getElementById("traffic1");
  x.className = "semaforo naranja";
}

function sgreen(){
  var x = document.getElementById("traffic1");
  x.className = "semaforo verde";
}

function on(y){
  var x = document.getElementById(y);
  x.className = "squareGreen";
}

function off(y){
  var x = document.getElementById(y);
  x.className = "squares";
}

function runConveyor(){
  var x = document.getElementById("stopPack");
  x.className = "package";
  var y = document.getElementById("stopGear");
  y.className = "gear";
  var z = document.getElementById("stopGearR");
  z.className = "gear right";
  var a = document.getElementById("breakStop");
  a.className = "TheseAreTheBreaks";
  var a = document.getElementById("breakStopA");
  a.className = "TheseAreTheBreaks_Again";
}

function stopConveyor(){
  var x = document.getElementById("stopPack");
  x.className = "packageStop";
  var y = document.getElementById("stopGear");
  y.className = "gear StopGears";
  var z = document.getElementById("stopGearR");
  z.className = "gear right StopGears";
  var a = document.getElementById("breakStop");
  a.className = "TheseAreTheBreaksStop";
  var a = document.getElementById("breakStopA");
  a.className = "TheseAreTheBreaks_AgainStop";
}
////////////////////////// Get from the server /////////////////////////////////
function getData(){
  var ajax = new XMLHttpRequest();
  ajax.open("GET", "../php/data.php", true);
  ajax.send();

  ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var data = JSON.parse(this.responseText);
          console.log(data);
          var html = "";
          var len = (data.length)-1;
          if(lenp<len){
              m0 = data[len].memory0;
              m1 = data[len].mamory1;
              m2 = data[len].mamory2;
              m3 = data[len].memory3;
              m4 = data[len].memory4;
              s1 = data[len].sensor1;
              s2 = data[len].sensor2;
              s3 = data[len].sensor3;
              s4 = data[len].sensor4;
              s5 = data[len].sensor5;
              count = data[len].counter;
              xp = data[len].xpost;
              yp = data[len].ypost;
              t = data[len].reading_time;

              html += "<tr>";
                  html += "<td>" + m0 + "</td>";
                  html += "<td>" + m1 + "</td>";
                  html += "<td>" + m2 + "</td>";
                  html += "<td>" + m3 + "</td>";
                  html += "<td>" + m4 + "</td>";
                  html += "<td>" + s1 + "</td>";
                  html += "<td>" + s2 + "</td>";
                  html += "<td>" + s3 + "</td>";
                  html += "<td>" + s4 + "</td>";
                  html += "<td>" + s5 + "</td>";
                  html += "<td>" + count + "</td>";
                  html += "<td>" + xp + "</td>";
                  html += "<td>" + yp + "</td>";
                  html += "<td>" + t + "</td>";
              html += "</tr>";
              document.getElementById("data").innerHTML += html;
              //
          }
          lenp = len;
      }
  };
}

function loop(){
  switch(s1){
    case '1': on("sensor1");
      break;
    case '0': off("sensor1");
      break;
    default:
      break;
  }
  switch(s2){
    case '1': on("sensor2");
      break;
    case '0': off("sensor2");
      break;
    default:
      break;
  }
  switch(s3){
    case '1': on("sensor3");
      break;
    case '0': off("sensor3");
      break;
    default:
      break;
  }
  switch(s4){
    case '1': on("sensor4");
      break;
    case '0': off("sensor4");
      break;
    default:
      break;
  }
  switch(s5){
    case '1': on("sensor5");
      break;
    case '0': off("sensor5");
      break;
    default:
      break;
  }
  if((m1==1 && m2==0)||(m3==1 && m4==0)){
    sgreen();
    runConveyor();
  }
  if((m0==1 && m1==0)||(m2==1 && m3==0)||(s1==1 && m0==0)){
    sorange();
  }
  if(s1==0 && m0==0){
    sred();
    stopConveyor();
  }
}
setInterval(getData,1000);
setInterval(loop,1000);
