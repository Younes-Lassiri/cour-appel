function showDropdown(){
    let drop = document.getElementById('theDrop').style
    if(drop.display === 'none'){
        drop.display = 'block'
    }else{
        drop.display = 'none'
    }
}
function change(id) {
    const selectElements = document.getElementsByTagName('select');
    const label =document.getElementById('select')

    for (let i = 0; i < selectElements.length; i++) {
        const selectElement = selectElements[i];
        if(selectElement.value !== ''){
            label.classList.remove('input-label')
            label.classList.add('input-labelS')
        }
    }
}


function confirme() {
    const selectElements = document.getElementById('confirme1');
    const label =document.getElementById('confirme1L')

    if(selectElements.value !== ''){
        label.classList.remove('input-label')
        label.classList.add('input-labelS')
    }else{
        label.classList.remove('input-labelS')
        label.classList.add('input-label')
    }
}


function changee() {
    const selectElements = document.getElementById('allInputs3');
    const label =document.getElementById('issue3')

    if(selectElements.value !== ''){
        label.classList.remove('input-label')
        label.classList.add('input-labelS')
    }else{
        label.classList.remove('input-labelS')
        label.classList.add('input-label')
    }
}


function changeee() {
    const selectElements = document.getElementById('allInputs1');
    const label =document.getElementById('issue1')

    if(selectElements.value !== ''){
        label.classList.remove('input-label')
        label.classList.add('input-labelS')
    }else{
        label.classList.remove('input-labelS')
        label.classList.add('input-label')
    }
}


function changeeee() {
    const selectElements = document.getElementById('allInputs2');
    const label =document.getElementById('issue2')

    if(selectElements.value !== ''){
        label.classList.remove('input-label')
        label.classList.add('input-labelS')
    }else{
        label.classList.remove('input-labelS')
        label.classList.add('input-label')
    }
}







function dtwo() {
    const selectElements = document.getElementById('d2');
    const label =document.getElementById('selectD2')

    if(selectElements.value !== ''){
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }else{
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }
}


function dthree() {
    const selectElements = document.getElementById('d3');
    const label =document.getElementById('selectD3')

    if(selectElements.value !== ''){
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }else{
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }
}





function done() {
    const selectElements = document.getElementById('d1');
    const label =document.getElementById('selectD1')

    if(selectElements.value !== ''){
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }else{
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }
}



function dfour() {
    const selectElements = document.getElementById('d4');
    const label =document.getElementById('selectD4')

    if(selectElements.value !== ''){
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }else{
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }
}


function dfive() {
    const selectElements = document.getElementById('d5');
    const label =document.getElementById('selectD5')

    if(selectElements.value !== ''){
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }else{
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }
}

function dsix() {
    const selectElements = document.getElementById('d6');
    const label =document.getElementById('selectD6')

    if(selectElements.value !== ''){
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }else{
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }
}


