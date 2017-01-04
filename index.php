<html>
<head>
<style>
body{
background-image: url("index1.jpg");
background-size: cover;
}
input{
color:black;
border-radius:100px;
}
div#teams{
background-color:lightblue;
}
label{
	font: 15px arial, sans-serif;
    font: italic bold 12px/30px Georgia, serif;
}
</style>



<script>
function placename(){
var p=document.getElementsByName("player")[0];
if(p.value==" ")
alert("enter valid name");
else{
//entering players
if (localStorage.clickcount) {
    localStorage.clickcount = Number(localStorage.clickcount) + 1;
} else {
    localStorage.clickcount = 1;
}
//alert(localStorage.clickcount);
var count=localStorage.clickcount;
localStorage.total=count;
var name=document.form.player.value;
localStorage.setItem("name_"+count,name);
p.value=" ";
var names="PLAYERS <BR> ";
for(i=1;i<=count;i++)
names=names.concat(i+".",localStorage.getItem("name_"+i),"<br>");
document.getElementById("names").innerHTML =names;
}
}
function generateteams(){
var p=document.getElementsByName("player")[0];
p.value=" ";
var n=localStorage.total;
if(n%2!=0){ alert("enter even number of players");}
else{
var r=0;
var table = document.getElementById("mytable");
var row = table.insertRow(r);
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3= row.insertCell(2);
cell1.innerHTML = "TEAM";
cell2.innerHTML = "PLAYER1";
cell3.innerHTML = "PLAYER2";
r++;
var ch=[];
for(i=1;i<=n;i++)
ch[i]=0;
var count=n;
while(count!=0){
//alert(count);
//first player
first=Math.floor((Math.random() * n) + 1);
while(ch[first]==1)
first=Math.floor((Math.random() * n) + 1);
ch[first]=1;
count--;
//second player
second=Math.floor((Math.random() * n) + 1);
while(ch[second]==1)
second=Math.floor((Math.random() * n) + 1);
ch[second]=1;
count--;
var name1=localStorage.getItem("name_"+first);
var name2=localStorage.getItem("name_"+second);
var row = table.insertRow(r);
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3= row.insertCell(2);
cell1.innerHTML = "team"+r;
cell2.innerHTML = name1;
cell3.innerHTML = name2;
r++;
//document.writeln(name1 +"    and  " + name2      +"<br>");
}
}
}
</script>
</head>
<body>
<div align="center" height="20px">

<h1 style="color:red">MVGR GLUG <img src="index.jpg"height="80px" > BADMINTON <br>CHAMPIONSHIP</h1>
</div>
<div style="background-color:white">
<b>NOTE:</b>
      <ul >
         <li><strong>Each participant shouldpay <mark>20</mark> rupees</strong></li>
         <li><strong>Any glug member can participate in the event<strong></li>
         <li><strong>The main purpose is to gather all gluggies to one platform and for some releif</strong></li>		 
      </ul>
</div>	  
<div align="center">
<form name="form" style="background-color:pink">
<b style="color:red">PARTICIPATE</b><br>
<label>ENTER PLAYERNAME:</label><input type="text" name="player" value=" ">
<input type="button" value="submit"onclick="placename()">
</form>

</div>

<div id="teams" align="center">
<table id="mytable" border="1">
</table>

<input type="button" value="generateteams" onclick="generateteams()">

</div >
<div style="background-color:white">
<p id="names" style="color:red" align="center">
</p>
</div>
</body>
</html>
