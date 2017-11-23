/**
 * Theme: Adminox Admin Template
 * Author: Coderthemes
 * Typeahead
 */



$(document).ready(function(){function e(e,a){""===e?a(s.get("Detroit Lions","Green Bay Packers","Chicago Bears")):s.search(e,a)}var a=function(e){return function(a,n){var o
o=[],substrRegex=RegExp(a,"i"),$.each(e,function(e,a){substrRegex.test(a)&&o.push(a)}),n(o)}},n=["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
$("#the-basics").typeahead({hint:!0,highlight:!0,minLength:1},{name:"states",source:a(n)})
var n=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.whitespace,queryTokenizer:Bloodhound.tokenizers.whitespace,local:n})
$("#bloodhound").typeahead({hint:!0,highlight:!0,minLength:1},{name:"states",source:n})
var o=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.whitespace,queryTokenizer:Bloodhound.tokenizers.whitespace,prefetch:"../plugins/typeahead/data/countries.json"})
$("#prefetch").typeahead(null,{name:"countries",source:o})
var t=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.obj.whitespace("value"),queryTokenizer:Bloodhound.tokenizers.whitespace,prefetch:"../plugins/typeahead/data/post_1960.json",remote:{url:"../plugins/typeahead/data/%QUERY.json",wildcard:"%QUERY"}})
$("#remote").typeahead(null,{name:"best-pictures",display:"value",source:t})
var s=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.obj.whitespace("team"),queryTokenizer:Bloodhound.tokenizers.whitespace,identify:function(e){return e.team},prefetch:"../plugins/typeahead/data/nfl.json"})
$("#default-suggestions").typeahead({minLength:0,highlight:!0},{name:"nfl-teams",display:"team",source:e}),$("#custom-templates").typeahead(null,{name:"best-pictures",display:"value",source:t,templates:{empty:'<div class="typeahead-empty-message">\nunable to find any Best Picture winners that match the current query\n</div>',suggestion:Handlebars.compile("<div><strong>{{value}}</strong> – {{year}}</div>")}})
var i=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.obj.whitespace("team"),queryTokenizer:Bloodhound.tokenizers.whitespace,prefetch:"../plugins/typeahead/data/nba.json"}),r=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.obj.whitespace("team"),queryTokenizer:Bloodhound.tokenizers.whitespace,prefetch:"../plugins/typeahead/data/nhl.json"})
$("#multiple-datasets").typeahead({highlight:!0},{name:"nba-teams",display:"team",source:i,templates:{header:'<h5 class="league-name">NBA Teams</h5>'}},{name:"nhl-teams",display:"team",source:r,templates:{header:'<h5 class="league-name">NHL Teams</h5>'}})})
