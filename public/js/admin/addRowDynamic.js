

$("input[data-addrow]").click(function(event) {
    let tableRow = $(this).parents('tr');
    let tableBody = $(tableRow).parent();

    let clonedTableRow = $(tableRow.clone(true));
    
    clonedTableRow.find('select').toArray().forEach(function(select) {
        $(select).prop('selectedIndex', 0);
        $(select).removeClass('is-invalid');
        $(select).next().remove();
    });

    clonedTableRow.appendTo(tableBody);
});

$("input[data-removerow]").click(function(event) {
    let tableRow = $(this).parents('tr');
    if ($(tableRow).parent().children().length > 1)
    {
        tableRow.remove();
    }
});
