
/**
* Theme: Adminox Admin Template
* Author: Coderthemes
* Nestable Component
*/

!function(t){"use strict"
var e=function(){}
e.prototype.updateOutput=function(e){var a=e.length?e:t(e.target),n=a.data("output")
window.JSON?n.val(window.JSON.stringify(a.nestable("serialize"))):n.val("JSON browser support required for this demo.")},e.prototype.init=function(){t("#nestable_list_1").nestable({group:1}).on("change",this.updateOutput),t("#nestable_list_2").nestable({group:1}).on("change",this.updateOutput),this.updateOutput(t("#nestable_list_1").data("output",t("#nestable_list_1_output"))),this.updateOutput(t("#nestable_list_2").data("output",t("#nestable_list_2_output"))),t("#nestable_list_menu").on("click",function(e){var a=t(e.target),n=a.data("action")
"expand-all"===n&&t(".dd").nestable("expandAll"),"collapse-all"===n&&t(".dd").nestable("collapseAll")}),t("#nestable_list_3").nestable()},t.Nestable=new e,t.Nestable.Constructor=e}(window.jQuery),function(t){"use strict"
t.Nestable.init()}(window.jQuery)
