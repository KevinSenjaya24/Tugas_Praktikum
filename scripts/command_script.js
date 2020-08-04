function updateValue(id) {
    window.location = "?menu=facu&cid=" + id;
}

function deleteValue(id){
    let confirmation = window.confirm("are you sure want to delete?");
    if (confirmation){
        window.location = "?menu=fac&cmd=del&cid=" + id;
    }
}

function updateValue2(id) {
    window.location = "?menu=actu&cid=" + id;
}

function deleteValue2(id){
    let confirmation = window.confirm("are you sure want to delete?");
    if (confirmation){
        window.location = "?menu=act&cmd=del&cid=" + id;
    }
}