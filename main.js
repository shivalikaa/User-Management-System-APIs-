fetch('api_fetch.php').then((res)=>res.json())
.then(response => {
    console.log(response)
    let output='';
    for(let i in response){
        output+=`<tr>
        <td>${response[i].name}</td>
        <td>${response[i].login_details}</td>
        <td>${response[i].sex}</td>
        <td>${response[i].date_of_birth}</td>
        <td>${response[i].contact_information}</td>
        <td>${response[i].billing_addresses}</td>
        <td>${response[i].delivery_addresses}</td>
        <td>${response[i].payment_information}</td>
        <td>${response[i].order_information}</td>
        <td>${response[i].tags}</td>
        </tr>`;
    }
    document.querySelector('.tbody').innerHTML=output;
}).catch(error => console.log(error));

