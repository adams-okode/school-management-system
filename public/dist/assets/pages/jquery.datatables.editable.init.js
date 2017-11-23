/**
* Theme: Adminox Admin Template
* Author: Coderthemes
* Component: Editable
* 
*/

(function(t){"use strict"
var a={options:{addButton:"#addToTable",table:"#datatable-editable",dialog:{wrapper:"#dialog",cancelButton:"#dialogCancel",confirmButton:"#dialogConfirm"}},initialize:function(){this.setVars().build().events()},setVars:function(){return this.$table=t(this.options.table),this.$addButton=t(this.options.addButton),this.dialog={},this.dialog.$wrapper=t(this.options.dialog.wrapper),this.dialog.$cancel=t(this.options.dialog.cancelButton),this.dialog.$confirm=t(this.options.dialog.confirmButton),this},build:function(){return this.datatable=this.$table.DataTable({aoColumns:[null,null,null,{bSortable:!1}]}),window.dt=this.datatable,this},events:function(){var a=this
return this.$table.on("click","a.save-row",function(i){i.preventDefault(),a.rowSave(t(this).closest("tr"))}).on("click","a.cancel-row",function(i){i.preventDefault(),a.rowCancel(t(this).closest("tr"))}).on("click","a.edit-row",function(i){i.preventDefault(),a.rowEdit(t(this).closest("tr"))}).on("click","a.remove-row",function(i){i.preventDefault()
var n=t(this).closest("tr")
t.magnificPopup.open({items:{src:a.options.dialog.wrapper,type:"inline"},preloader:!1,modal:!0,callbacks:{change:function(){a.dialog.$confirm.on("click",function(i){i.preventDefault(),a.rowRemove(n),t.magnificPopup.close()})},close:function(){a.dialog.$confirm.off("click")}}})}),this.$addButton.on("click",function(t){t.preventDefault(),a.rowAdd()}),this.dialog.$cancel.on("click",function(a){a.preventDefault(),t.magnificPopup.close()}),this},rowAdd:function(){this.$addButton.attr({disabled:"disabled"})
var t,a,i
t='<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a> <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a> <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>',a=this.datatable.row.add(["","","",t]),i=this.datatable.row(a[0]).nodes().to$(),i.addClass("adding").find("td:last").addClass("actions"),this.rowEdit(i),this.datatable.order([0,"asc"]).draw()},rowCancel:function(t){var a,i
t.hasClass("adding")?this.rowRemove(t):(i=this.datatable.row(t.get(0)).data(),this.datatable.row(t.get(0)).data(i),a=t.find("td.actions"),a.get(0)&&this.rowSetActionsDefault(t),this.datatable.draw())},rowEdit:function(a){var i,n=this
i=this.datatable.row(a.get(0)).data(),a.children("td").each(function(o){var e=t(this)
e.hasClass("actions")?n.rowSetActionsEditing(a):e.html('<input type="text" class="form-control input-block" value="'+i[o]+'"/>')})},rowSave:function(a){var i,n=this,o=[]
a.hasClass("adding")&&(this.$addButton.removeAttr("disabled"),a.removeClass("adding")),o=a.find("td").map(function(){var i=t(this)
return i.hasClass("actions")?(n.rowSetActionsDefault(a),n.datatable.cell(this).data()):t.trim(i.find("input").val())}),this.datatable.row(a.get(0)).data(o),i=a.find("td.actions"),i.get(0)&&this.rowSetActionsDefault(a),this.datatable.draw()},rowRemove:function(t){t.hasClass("adding")&&this.$addButton.removeAttr("disabled"),this.datatable.row(t.get(0)).remove().draw()},rowSetActionsEditing:function(t){t.find(".on-editing").removeClass("hidden"),t.find(".on-default").addClass("hidden")},rowSetActionsDefault:function(t){t.find(".on-editing").addClass("hidden"),t.find(".on-default").removeClass("hidden")}}
t(function(){a.initialize()})}).apply(this,[jQuery])
