const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get('id');
//const url =`http://localhost/New%20Folder/website/GetCustomerByID.php?userid=${id}`;

const url =`http://localhost/New%20Folder/webService/api/GetCustomerByID.php?userid=${id}`;

const senderName = document.querySelector("#sender");
const bal = document.querySelector("#balance");

fetch(url).then(res =>  res.json()).then(data => {
    const transfer = data.data;
    console.log(transfer);

    if(!transfer){
        const errString=`<p style="color:red"><strong>Data not found, please try again</strong></p>`;
        document.querySelector(".form-message").innerHTML=errString;
    }else{
        const errString=``;
        document.querySelector(".form-message").innerHTML= errString;
        bal.value =transfer.C_Balance;
        senderName.value = transfer.C_Name;
    }
 
}).catch(error =>console.error(error));


const btnUpdate = document.querySelector("#btn-update");
const amount = document.querySelector("#amount");
btnUpdate.addEventListener('click', (e) =>{
    e.preventDefault();
    console.log("sender Balance " +bal.value);
   if(amount.value > bal.value){
        const message = `<p Style="color:red">Insufficient amount to transfer</p>`;
        document.querySelector(".form-message").innerHTML = message;
    }else{
        //var name= document.querySelector("#receiver").value;
        var receiver= document.querySelector("#receiver");

    //        const urlReceiver =`http://localhost/New%20Folder/website/getUserByName.php?receiver=${receiver.value}`;

        const urlReceiver =`http://localhost/New%20Folder/wwebService/api/getUserByName.php?receiver=${receiver.value}`;
            let balReceiver =0;

        fetch(urlReceiver).then(res=>res.json()).then(data =>{
        const receiverData = data.data;
            if(!receiverData){
               
               const message = `<p Style="color:red">Something went wrong</p>`;
               document.querySelector(".form-message").innerHTML = message;
            }else{
                balReceiver = receiverData.C_Balance;
            
                const newbalReceiver = (parseInt(balReceiver)+ parseInt(amount.value));
                //post the data
                //   const updateurl = `http://localhost/New%20Folder/website/TransferAPI.php?to=${receiver.value}&newbalance=${newbalReceiver}`;

                const updateurl = `http://localhost/New%20Folder/webService/api/TransferAPI.php?to=${receiver.value}&newbalance=${newbalReceiver}`;
                fetch(updateurl).then(res=>res.json()).then(data =>{
                    if(data.Success =="true"){
                        const message = `<p style="color:green">Transfer successful</p>`;
                        document.querySelector(".form-message").innerHTML = message;
                    }else{
                        const message = `<p Style="color:red">Transfer unsuccessful</p>`;
                        document.querySelector(".form-message").innerHTML = message;
                    } }).catch(error => console.error(error));
            } }).catch(error => console.error(error));


        const newbalSender = (parseInt(bal.value)- parseInt(amount.value));
        
        //update the sender balance
        //        const senderurl = `http://localhost/New%20Folder/website/senderUpdate.php?from=${id}&newbalance=${newbalSender}`;

        const senderurl = `http://localhost/New%20Folder/webService/api/senderUpdate.php?from=${id}&newbalance=${newbalSender}`;
        fetch(senderurl).then(res=>res.json()).then(data =>{
            if(data.Success =="true"){
                const message = `<p style="color:green">Transfer successful</p>`;
                document.querySelector(".form-message").innerHTML = message;
            }else{
                const message = `<p Style="color:red">Transfer unsuccessful, sender problem</p>`;
                document.querySelector(".form-message").innerHTML = message;
            }
        }).catch(error => console.error(error));


        
        //transactions url updates
        //       const transurl = `http://localhost/New%20Folder/website/Transactions.php?to=${receiver.value}&from=${senderName.value}&newbalance=${amount.value}`;

       const transurl = `http://localhost/New%20Folder/webService/api/Transactions.php?to=${receiver.value}&from=${senderName.value}&newbalance=${amount.value}`;
        fetch(transurl).then(res=>res.json()).then(data =>{
            if(data.success =="true"){
                const message = `<p style="color:green">Transfer successful</p>`;
                document.querySelector(".form-message").innerHTML = message;
            }else{
                const message = `<p Style="color:red">Transfer unsuccessful</p>`;
                document.querySelector(".form-message").innerHTML = message;
            } }).catch(error => console.error(error));
    }
    
   
});