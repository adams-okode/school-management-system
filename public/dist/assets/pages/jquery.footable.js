/**
* Theme: Adminox Admin Dashboard
* Author: Coderthemes
* Foo table
*/

$(window).on("load",function(){$("#demo-foo-row-toggler").footable(),$("#demo-foo-accordion").footable().on("footable_row_expanded",function(o){$("#demo-foo-accordion tbody tr.footable-detail-show").not(o.row).each(function(){$("#demo-foo-accordion").data("footable").toggleDetail(this)})}),$("#demo-foo-pagination").footable(),$("#demo-show-entries").change(function(o){o.preventDefault()
var t=$(this).val()
$("#demo-foo-pagination").data("page-size",t),$("#demo-foo-pagination").trigger("footable_initialized")})
var o=$("#demo-foo-filtering")
o.footable().on("footable_filtering",function(o){var t=$("#demo-foo-filter-status").find(":selected").val()
o.filter+=o.filter&&o.filter.length>0?" "+t:t,o.clear=!o.filter}),$("#demo-foo-filter-status").change(function(t){t.preventDefault(),o.trigger("footable_filter",{filter:$(this).val()})}),$("#demo-foo-search").on("input",function(t){t.preventDefault(),o.trigger("footable_filter",{filter:$(this).val()})})
var t=$("#demo-foo-addrow")
t.footable().on("click",".demo-delete-row",function(){var o=t.data("footable"),e=$(this).parents("tr:first")
o.removeRow(e)}),$("#demo-input-search2").on("input",function(o){o.preventDefault(),t.trigger("footable_filter",{filter:$(this).val()})}),$("#demo-btn-addrow").click(function(){var o=t.data("footable"),e='<tr><td style="text-align: center;"><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times"></button></td><td>Adam</td><td>Doe</td><td>Traffic Court Referee</td><td>22 Jun 1972</td><td><span class="label label-table label-success">Active</span></td></tr>'
o.appendRow(e)})})