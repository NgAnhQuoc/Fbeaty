function select() {
    var name1 = document.getElementById('inputState').value;
    if (name1 == 0) {
        document.getElementById('giamgia').disabled = false;
        document.getElementById('giamgia1').disabled = true;
    } else if (name1 == 1) {
        document.getElementById('giamgia').disabled = true;
        document.getElementById('giamgia1').disabled = false;
    } else {
        console.log('12321');
    }
}