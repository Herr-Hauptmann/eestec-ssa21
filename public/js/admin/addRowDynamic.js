

$("input[data-addrow]").click(function(event) {
    let tableRow = $(this).parents('tr');
    let tableBody = $(tableRow).parent();
    
    tableRow.clone(true, true).appendTo(tableBody);
});
