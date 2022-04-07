let openFile = function(event) {
    let input = event.target;
    let reader = new FileReader();
    reader.onload = () => {
        let dataURL = reader.result;
        let output = document.getElementById('output');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}

let openFile1 = function(event) {
    let input = event.target;
    let reader = new FileReader();
    reader.onload = () => {
        let dataURL = reader.result;
        let output = document.getElementById('output1');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}

let openFile2 = function(event) {
    let input = event.target;
    let reader = new FileReader();
    reader.onload = () => {
        let dataURL = reader.result;
        let output = document.getElementById('output2');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}

let openFile3 = function(event) {
    let input = event.target;
    let reader = new FileReader();
    reader.onload = () => {
        let dataURL = reader.result;
        let output = document.getElementById('output3');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}