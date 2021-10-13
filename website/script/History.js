//const url=`http://localhost/New%20Folder/website/TransferHistory.php`;

const url=`http://localhost/New%20Folder/webService/api/TransferHistory.php`;
const options={
    method:'GET',
    mode:'no-cors',
}

fetch(url, options).then(res=>res.json()).then(data=>{
    const history= data.data;
    console.log(history);
    let display="";
   

    history.forEach(h=>{
        display+=`
        <div class="transaction">
            <h1>Account no#: ${h.T_id}</h1>
            <h1>Sender: ${h.T_sender}</h1>
            <h1>Receiver: ${h.T_receiver}</h1>
            <h1>Amount: R${h.T_amount}</h1>
            <h1>Date: ${h.T_date}</h1>
        </div>`;
    });

    document.querySelector(".content").innerHTML= display;
}).catch(error=>console.error(error));