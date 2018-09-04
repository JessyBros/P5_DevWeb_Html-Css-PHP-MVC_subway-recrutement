var crudRestaurant = true;

function crud()
{
    if (crudRestaurant)
    {
        document.getElementById("crud").style.display = "block";
        crudRestaurant = false;
    }
    else
    {
        document.getElementById("crud").style.display = "none";
        crudRestaurant = true;
    }
}
