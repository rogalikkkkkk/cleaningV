function addDayFunc()
{
    let cont = document.getElementById('addingDay');
    var actualDisplay = getComputedStyle(addingDay).display;
    if (actualDisplay == 'none') {
        cont.style.display = 'block';
    } else {
        cont.innerText += '.';
    }
}