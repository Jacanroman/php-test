const input = document.getElementById("search-input");
input.addEventListener("input",function(){
    // get the value of the input field and format it
    const searchValue = this.value.toLowerCase();
    // get all the rows in the table
    const rows = document.querySelectorAll("#table tbody tr");
    rows.forEach(row=>{
        // get all the cells in the current row
        const cells = row.querySelectorAll("td");
        // initialize a flag to check if the row contains the search value
        let containsValue = false;
        // loop through the cells and check if the cell contains the search value
        cells.forEach(cell=>{

            if(cell.textContent.toLowerCase().includes(searchValue))
            {
                containsValue = true;
            }

        });

        // if the row contains the search value, show it, otherwise hide it
        if(containsValue){ row.style.display = ""; }

        else { row.style.display = "none"; }

    })

});
