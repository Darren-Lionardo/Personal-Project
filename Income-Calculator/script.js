/*var n = 2;*/

function addPengeluaran(){
    let platform = document.getElementById('pengeluaran');
    platform.querySelector('button').remove();

    let name = document.createElement('input');
    let nameT = document.createAttribute('type');
    let nameN = document.createAttribute('name');
    nameT.value = 'text';
    nameN.value = 'name[]';
    name.setAttributeNode(nameT);
    name.setAttributeNode(nameN);

    let amount = document.createElement('input');
    let amountT = document.createAttribute('type');
    let amountN = document.createAttribute('name');
    amountT.value = 'number';
    amountN.value = 'amount[]';
    amount.setAttributeNode(amountT);
    amount.setAttributeNode(amountN);

    let plus = document.createElement('button');
    let plusT = document.createAttribute('type');
    let plusC = document.createAttribute('class');
    let plusF = document.createAttribute('onclick');
    plusT.value = 'button';
    plusC.value = 'btn-plus grey';
    plusF.value = 'addPengeluaran()';
    plus.setAttributeNode(plusT);
    plus.setAttributeNode(plusC);
    plus.setAttributeNode(plusF);
    plus.appendChild(document.createTextNode("+"));

    let enter = document.createElement('br');
    let space = document.createElement('span');
    space.appendChild(document.createTextNode(" : Rp. "));
    
    platform.appendChild(name);
    platform.appendChild(space);
    platform.appendChild(amount);
    platform.appendChild(enter);
    platform.appendChild(plus);
    /*let name = "<input type='text' name='name[]' id='spendingName'>&nbsp:&nbsp&nbspRp.&nbsp";
    let amount = "<input type='number' name='amount[" + n + "]' id='spendingAmount'><br>";
    let amount = "<input type='number' name='amount[]' id='spendingAmount'><br>";
    let add = "<button type='button' class='btn-plus grey' onclick='addPengeluaran()'>+</button>";
    let body = name + amount + add;
    platform.appendChild(body);*/
}