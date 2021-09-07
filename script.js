let num = '';

const displayNum = (x) => {
    let input = x;
        num = num + input;
    document.getElementById('displayTwo').innerHTML = num;
    return num;
}

const switchPluMinus = () =>{
    let numToChange = document.getElementById('displayTwo').innerHTML;
    let interger = parseInt(numToChange, 10);
    if (interger > 0) {       
        document.getElementById('displayTwo').innerHTML = '-' + interger;
    } else if (interger < 0){
        document.getElementById('displayTwo').innerHTML = interger - interger - interger;
    }
}