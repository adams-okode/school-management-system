/**
Template Name: Adminox Dashboard
Author: CoderThemes
Email: coderthemes@gmail.com
File: Chartjs
*/


!function(r){"use strict"
var o=function(){}
o.prototype.respChart=function(o,e,a,t){function n(){o.attr("width",r(s).width())
switch(e){case"Line":new Chart(i,{type:"line",data:a,options:t})
break
case"Doughnut":new Chart(i,{type:"doughnut",data:a,options:t})
break
case"Pie":new Chart(i,{type:"pie",data:a,options:t})
break
case"Bar":new Chart(i,{type:"bar",data:a,options:t})
break
case"Radar":new Chart(i,{type:"radar",data:a,options:t})
break
case"PolarArea":new Chart(i,{data:a,type:"polarArea",options:t})}}var i=o.get(0).getContext("2d"),s=r(o).parent()
r(window).resize(n),n()},o.prototype.init=function(){var o={labels:["January","February","March","April","May","June","July","August","September"],datasets:[{label:"Sales Analytics",fill:!1,lineTension:.05,backgroundColor:"#fff",borderColor:"#297ef6",borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",pointBorderColor:"#297ef6",pointBackgroundColor:"#fff",pointBorderWidth:8,pointHoverRadius:6,pointHoverBackgroundColor:"#fff",pointHoverBorderColor:"#297ef6",pointHoverBorderWidth:3,pointRadius:1,pointHitRadius:10,data:[65,59,80,81,56,55,40,35,30]}]},e={scales:{yAxes:[{ticks:{max:100,min:20,stepSize:10}}]}}
this.respChart(r("#lineChart"),"Line",o,e)
var a={labels:["Desktops","Tablets","Mobiles","Mobiles","Tablets"],datasets:[{data:[80,50,100,121,77],backgroundColor:["#5553ce","#297ef6","#e52b4c","#ffa91c","#32c861"],hoverBackgroundColor:["#5553ce","#297ef6","#e52b4c","#ffa91c","#32c861"],hoverBorderColor:"#fff"}]}
this.respChart(r("#doughnut"),"Doughnut",a)
var t={labels:["Desktops","Tablets","Mobiles","Mobiles","Tablets"],datasets:[{data:[80,50,100,121,77],backgroundColor:["#5553ce","#297ef6","#e52b4c","#ffa91c","#32c861"],hoverBackgroundColor:["#5553ce","#297ef6","#e52b4c","#ffa91c","#32c861"],hoverBorderColor:"#fff"}]}
this.respChart(r("#pie"),"Pie",t)
var n={labels:["January","February","March","April","May","June","July"],datasets:[{label:"Sales Analytics",backgroundColor:"rgba(236, 103, 148, 0.3)",borderColor:"#ec6794",borderWidth:2,hoverBackgroundColor:"rgba(236, 103, 148, 0.6)",hoverBorderColor:"#ec6794",data:[65,59,80,81,56,55,40,20]}]}
this.respChart(r("#bar"),"Bar",n)
var i={labels:["Eating","Drinking","Sleeping","Designing","Coding","Cycling","Running"],datasets:[{label:"Desktops",backgroundColor:"rgba(179,181,198,0.2)",borderColor:"rgba(179,181,198,1)",pointBackgroundColor:"rgba(179,181,198,1)",pointBorderColor:"#fff",pointHoverBackgroundColor:"#fff",pointHoverBorderColor:"rgba(179,181,198,1)",data:[65,59,90,81,56,55,40]},{label:"Tablets",backgroundColor:"rgba(255,99,132,0.2)",borderColor:"rgba(255,99,132,1)",pointBackgroundColor:"rgba(255,99,132,1)",pointBorderColor:"#fff",pointHoverBackgroundColor:"#fff",pointHoverBorderColor:"rgba(255,99,132,1)",data:[28,48,40,19,96,27,100]}]}
this.respChart(r("#radar"),"Radar",i)
var s={datasets:[{data:[11,16,7,18],backgroundColor:["#297ef6","#45bbe0","#ebeff2","#1ea69a"],label:"My dataset",hoverBorderColor:"#fff"}],labels:["Series 1","Series 2","Series 3","Series 4"]}
this.respChart(r("#polarArea"),"PolarArea",s)},r.ChartJs=new o,r.ChartJs.Constructor=o}(window.jQuery),function(r){"use strict"
r.ChartJs.init()}(window.jQuery)
