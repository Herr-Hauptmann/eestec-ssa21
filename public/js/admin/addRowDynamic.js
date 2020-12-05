

$("input[data-addrow]").click(function(event) {
    let tableRow = $(this).parents('tr');
    let tableBody = $(tableRow).parent();

    let clonedTableRow = $(tableRow.clone(true));
    
    clonedTableRow.find('select').toArray().forEach(select => $(select).prop('selectedIndex', 0));

    clonedTableRow.appendTo(tableBody);
});

$("input[data-removerow]").click(function(event) {
    let tableRow = $(this).parents('tr');
    if ($(tableRow).parent().children().length > 1)
    {
        tableRow.remove();
    }
});
