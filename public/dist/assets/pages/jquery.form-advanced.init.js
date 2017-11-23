/**
 * Theme: Adminox Admin Template
 * Author: Coderthemes
 * Form Advanced
 */


jQuery(document).ready(function(){$(".select2").select2(),$(".select2-limiting").select2({maximumSelectionLength:2}),$(".selectpicker").selectpicker(),$(":file").filestyle({input:!1})}),$(".vertical-spin").TouchSpin({verticalbuttons:!0,verticalupclass:"mdi mdi-plus",verticaldownclass:"mdi mdi-minus"}),$("input[name='demo1']").TouchSpin({min:0,max:100,step:.1,decimals:2,boostat:5,maxboostedstep:10,postfix:"%"}),$("input[name='demo2']").TouchSpin({min:-1e9,max:1e9,stepinterval:50,maxboostedstep:1e7,prefix:"$"}),$("input[name='demo3']").TouchSpin(),$("input[name='demo3_21']").TouchSpin({initval:40}),$("input[name='demo3_22']").TouchSpin({initval:40}),$("input[name='demo5']").TouchSpin({prefix:"pre",postfix:"post"}),$("input[name='demo0']").TouchSpin({}),$("input#defaultconfig").maxlength(),$("input#thresholdconfig").maxlength({threshold:20}),$("input#moreoptions").maxlength({alwaysShow:!0,warningClass:"label label-success",limitReachedClass:"label label-danger"}),$("input#alloptions").maxlength({alwaysShow:!0,warningClass:"label label-success",limitReachedClass:"label label-danger",separator:" out of ",preText:"You typed ",postText:" chars available.",validate:!0}),$("textarea#textarea").maxlength({alwaysShow:!0}),$("input#placement").maxlength({alwaysShow:!0,placement:"top-left"})
