
/**
* Theme: Adminox Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function(e){"use strict"
var a=function(){}
a.prototype.createLineChart=function(e,a,r,t,i,o,s,y,b){Morris.Line({element:e,data:a,xkey:r,ykeys:t,labels:i,fillOpacity:o,pointFillColors:s,pointStrokeColors:y,behaveLikeLine:!0,gridLineColor:"#eef0f2",hideHover:"auto",lineWidth:"3px",pointSize:0,preUnits:"$",resize:!0,lineColors:b})},a.prototype.createAreaChart=function(e,a,r,t,i,o,s,y){Morris.Area({element:e,pointSize:0,lineWidth:0,data:t,xkey:i,ykeys:o,labels:s,hideHover:"auto",resize:!0,gridLineColor:"#eef0f2",lineColors:y})},a.prototype.createAreaChartDotted=function(e,a,r,t,i,o,s,y,b,n){Morris.Area({element:e,pointSize:3,lineWidth:1,data:t,xkey:i,ykeys:o,labels:s,hideHover:"auto",pointFillColors:y,pointStrokeColors:b,resize:!0,smooth:!1,gridLineColor:"#eef0f2",lineColors:n})},a.prototype.createBarChart=function(e,a,r,t,i,o){Morris.Bar({element:e,data:a,xkey:r,ykeys:t,labels:i,hideHover:"auto",resize:!0,gridLineColor:"#eeeeee",barSizeRatio:.4,xLabelAngle:35,barColors:o})},a.prototype.createStackedChart=function(e,a,r,t,i,o){Morris.Bar({element:e,data:a,xkey:r,ykeys:t,stacked:!0,labels:i,hideHover:"auto",resize:!0,gridLineColor:"#eeeeee",barColors:o})},a.prototype.createDonutChart=function(e,a,r){Morris.Donut({element:e,data:a,barSize:.4,resize:!0,colors:r})},a.prototype.init=function(){var e=[{y:"2008",a:50,b:0},{y:"2009",a:75,b:50},{y:"2010",a:30,b:80},{y:"2011",a:50,b:50},{y:"2012",a:75,b:10},{y:"2013",a:50,b:40},{y:"2014",a:75,b:50},{y:"2015",a:100,b:70}]
this.createLineChart("morris-line-example",e,"y",["a","b"],["Series A","Series B"],["0.1"],["#ffffff"],["#999999"],["#5553ce ","#f06292"])
var a=[{y:"2009",a:10,b:20},{y:"2010",a:75,b:65},{y:"2011",a:50,b:40},{y:"2012",a:75,b:65},{y:"2013",a:50,b:40},{y:"2014",a:75,b:65},{y:"2015",a:90,b:60}]
this.createAreaChart("morris-area-example",0,0,a,"y",["a","b"],["Series A","Series B"],["#5553ce","#bdbdbd"])
var r=[{y:"2009",a:10,b:20},{y:"2010",a:75,b:65},{y:"2011",a:50,b:40},{y:"2012",a:75,b:65},{y:"2013",a:50,b:40},{y:"2014",a:75,b:65},{y:"2015",a:90,b:60}]
this.createAreaChartDotted("morris-area-with-dotted",0,0,r,"y",["a","b"],["Series A","Series B"],["#ffffff"],["#999999"],["#297ef6","#bdbdbd"])
var t=[{y:"2009",a:100,b:90,c:40},{y:"2010",a:75,b:65,c:20},{y:"2011",a:50,b:40,c:50},{y:"2012",a:75,b:65,c:95},{y:"2013",a:50,b:40,c:22},{y:"2014",a:75,b:65,c:56},{y:"2015",a:100,b:90,c:60}]
this.createBarChart("morris-bar-example",t,"y",["a","b","c"],["Series A","Series B","Series C"],["#c086f3","#65acff","#7ed321"])
var i=[{y:"2005",a:45,b:180,c:100},{y:"2006",a:75,b:65,c:80},{y:"2007",a:100,b:90,c:56},{y:"2008",a:75,b:65,c:89},{y:"2009",a:100,b:90,c:120},{y:"2010",a:75,b:65,c:110},{y:"2011",a:50,b:40,c:85},{y:"2012",a:75,b:65,c:52},{y:"2013",a:50,b:40,c:77},{y:"2014",a:75,b:65,c:90},{y:"2015",a:100,b:90,c:130},{y:"2016",a:80,b:65,c:95}]
this.createStackedChart("morris-bar-stacked",i,"y",["a","b","c"],["Series A","Series B","Series C"],["#4489e4","#78c350","#ebeff2"])
var o=[{label:"Electricity",value:12},{label:"Financial",value:30},{label:"Markets",value:20}]
this.createDonutChart("morris-donut-example",o,["#297ef6","#353d4a","#f2f6f8"])},e.MorrisCharts=new a,e.MorrisCharts.Constructor=a}(window.jQuery),function(e){"use strict"
e.MorrisCharts.init()}(window.jQuery)
